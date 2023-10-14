<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Mail\NewOrder;
use App\Mail\OrderShipped;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class FinalizePaymentController extends Controller
{
    public function index(Request $request)
    {

        $total = $request->input('total');

        // ID DE L'UTILISATEUR COURANT
        $userId = Auth::id();

        // INSERTION D'UNE NOUVELLE COMMANDE
        DB::table('commandes')->updateOrInsert(
            [
                'prix_total' => $total,
                'user_id' => $userId,

            ],
            [
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ]
        );

        // ON RECUPERE TOUTES LES COMMANDES DU CLIENT
        $commande = DB::table('commandes')->where('user_id', '=', $userId)->get();
        // dd($commande);

        // ON RECUPERE L'ID DE LA DERNIERE COMMANDE PASSEE PAR LE CLIENT
        $idCommande = $commande->last()->id;

        // ON GENERE UN TABLEAU DE PRODUITS TRIES PAR PRODUCTEURS POUR LES SOUS COMMANDES
        if (session()->has('produits')) {
            $produits = session()->get('produits');
            $produitsParVendeur = array();

            foreach ($produits as $key => $value) {
                $produit = DB::table('produits')->where('reference', '=', $value['ref'])->get();
                $infoComId = $produit[0]->infocom_id;

                $produitsParVendeur[$infoComId][] = $value['prix'];
            }
        }

        // ON CALCULE LE PRIX TOTAL DE CHAQUE SOUS COMMANDE
        $prixTotalParVendeur = array();
        foreach ($produitsParVendeur as $key => $value) {
            $prixTotalParVendeur[$key] = array_sum($value);
        }

        // INSERTION DES SOUS COMMANDES
        foreach ($prixTotalParVendeur as $key => $value) {
            DB::table('sous_commandes')->insert(
                [
                    'prix_total' => $value,
                    'commande_prete' => false,
                    'commande_id' => $idCommande,
                    'infocom_id' => $key,
                    "created_at" =>  Carbon::now(),
                    "updated_at" => Carbon::now(),
                ]
            );
        }

        // INSERTION DES LIGNES DE COMMANDE
        foreach ($produits as $key => $value) {
            $produit = DB::table('produits')->where('reference', '=', $value['ref'])->get();
            $infoComId = $produit[0]->infocom_id;
            $produitId = $produit[0]->id;

            $sousCommande = DB::table('sous_commandes')->where('infocom_id', '=', $infoComId)->where('commande_id', '=', $idCommande)->get();
            $souscommandeId = $sousCommande[0]->id;

            DB::table('ligne_commande')->insert(
                [
                    'quantite' => $value['quantité'],
                    'produit_id' => $produitId,
                    'sous_commande_id' => $souscommandeId,
                    "created_at" =>  Carbon::now(),
                    "updated_at" => Carbon::now(),
                ]
            );
        }

        session()->forget('produits');

        // GENERER UN QR CODE
        $qrcode = QrCode::format('svg')
            ->size(200)
            ->generate(url("/qr-code/{$idCommande}"));

        // ENREGISTRER LE QR CODE DANS LE DOSSIER PUBLIC/QRCODES
        $output_file = '/img/qr-code/qr-' . time() . '.svg';
        Storage::disk('local')->put($output_file, $qrcode);

        // ENREGISTRER LE QR CODE DANS LA BDD
        DB::table('qrcodes')->updateOrInsert(
            [
                'file_path' => $output_file,
                'commande_id' => $idCommande,
                'user_id' => $userId,
            ],
            [
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ]
        );

        // NOM COMPLET DU CLIENT
        $nom = Auth::user()->prenom . " " . Auth::user()->nom;

        // DATE DE COMMANDE
        $dateCommande = $commande->last()->created_at;

        // TRANSFORMER LE QRCODE SVG EN BASE64 POUR POUVOIR ETRE IMPORTE DANS LE PDF
        $qrcode64 = '<img src="data:image/svg+xml;base64,' . base64_encode($qrcode) . '"  width="100" height="100" />';

        // TRANSFORMER UNE COMMANDE EN BON DE COMMANDE PDF
        $pdfData = [
            'nom' => $nom,
            'qrcode' => $qrcode64,
            'numCommande' => $idCommande,
            'date' => $dateCommande,
            'total' => $total,
            'produits' => $produits
        ];

        $pdf = PDF::loadView('myPDF', $pdfData)->setPaper('a4');

        // ENREGISTRER LE PDF DANS LE LOCAL STORAGE
        $output_pdf = '/pdf/pdf-' . time() . '.pdf';
        Storage::disk('local')->put($output_pdf, $pdf->output());

        // ENVOYER UN MAIL DE CONFIRMATION AU CLIENT AVEC LE BON DE COMMANDE EN PJ
        $userMail = Auth::user()->email;

        Mail::to($userMail)
            ->send(new OrderShipped($pdfData, $pdf->output()));

        // ENVOYER MAIL CONFIRMATION AUX VENDEURS CONCERNES
        foreach ($produitsParVendeur as $key => $value) {
            $commandes = array();

            $vendeursIds = DB::table('infos_commerciales')->where('id', $key)->get();
            $vendeur = $vendeursIds[0];
            $vendeurId = $vendeur->id;

            $mailvendeur = $vendeur->email_commercial;

            $sousCommandes = DB::table('sous_commandes')->where('commande_id', $idCommande)->where('infocom_id', $vendeurId)->get();
            $sousCommande = $sousCommandes[0];

            $lignesCommandes = DB::table('ligne_commande')->where('sous_commande_id', $sousCommande->id)->get();

            $i = 0;
            foreach ($lignesCommandes as $ligne) {

                $produits = DB::table('produits')->where('id', $ligne->produit_id)->get();
                $produit = $produits[0];
                $prix = $produit->prix;
                $reference = $produit->reference;
                $nomProduit = $produit->nom;

                $commandes[$i]['quantite'] = $ligne->quantite;
                $commandes[$i]['prix'] = $prix;
                $commandes[$i]['reference'] = $reference;
                $commandes[$i]['nomProduit'] = $nomProduit;

                $i++;
            }

            $prixTotalDeVente = $prixTotalParVendeur[$key];

            $pdfDataVendeur = [
                'nom' => $nom,
                'numCommande' => $idCommande,
                'date' => $dateCommande,
                'total' => $prixTotalDeVente,
                'commandes' => $commandes,
            ];

            $pdfVendeur = PDF::loadView('pdfVendeur', $pdfDataVendeur)->setPaper('a4');

            Mail::to($mailvendeur)
                ->send(new NewOrder($pdfDataVendeur, $pdfVendeur->output()));
        }

        return view('layouts.paymentSuccess');
    }
}
