<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QrcodeController extends Controller
{
    public function index($id)
    {
        // ON RECUPERE LA COMMANDE
        $commandeColumn = DB::table('commandes')->where('id', $id)->get();
        $commande = $commandeColumn[0];
        $clientId = $commande->user_id;

        // ON RECUPERE LE NOM DU CLIENT
        $userColumn = DB::table('users')->where('id', $clientId)->get();
        $user = $userColumn[0];
        $nomClient = $user->prenom . ' ' . $user->nom;

        // ON RECUPERE LES SOUS COMMANDES
        $sousCommandes = DB::table('sous_commandes')->where('commande_id', $id)->get();

        // POUR CHAQUE SOUS COMMANDE ON ENREGISTRE LES LIGNES DE COMMANDE DANS UN TABLEAU AVEC LES VENDEURS COMME CLEES
        $data = array();
        $i = 0;

        foreach ($sousCommandes as $value) {
            $sousCommandesId = $value->id;

            $infocomId = $value->infocom_id;
            $infocomColumn = DB::table('infos_commerciales')->where('id', $infocomId)->get();
            $infocom = $infocomColumn[0];
            $nomVendeur = $infocom->nom_entreprise;

            $lignesCommandes = DB::table('ligne_commande')->where('sous_commande_id', $sousCommandesId)->get();

            $isDone = $value->commande_recup;

            foreach ($lignesCommandes as $key => $ligne) {
                $produitId = $ligne->produit_id;
                $produitColumn = DB::table('produits')->where('id', $produitId)->get();
                $produit = $produitColumn[0];

                $data[$i]['nomVendeur'] = $nomVendeur;
                $data[$i]['reference'] = $produit->reference;
                $data[$i]['nom'] = $produit->nom;
                $data[$i]['prix'] = $produit->prix;
                $data[$i]['quantite'] = $ligne->quantite;
                $data[$i]['sous_commande_id'] = $sousCommandesId;
                $data[$i]['isDone'] = $isDone;
                $i = $i + 1;
            }
        }
        $dataByName = self::group_by('nomVendeur', $data);
        // dd($dataByName);

        return view('qrcode.index', [
            'data' => $dataByName,
            'nom' => $nomClient,
            'commandeId' => $id,
        ]);
    }

    public function close($id)
    {
        $sousCommandeColumn = DB::table('sous_commandes')->where('id', $id)->get();
        $sousCommande = $sousCommandeColumn[0];
        $commandeId = $sousCommande->commande_id;

        DB::table('sous_commandes')->where('id', $id)->update(['commande_recup' => true]);

        return redirect("/qr-code/$commandeId");
    }

    /**
     * Function that groups an array of associative arrays by some key.
     *
     * @param {String} $key Property to sort by.
     * @param {Array} $data Array that stores multiple associative arrays.
     */
    static function group_by($key, $data)
    {
        $result = array();

        foreach ($data as $val) {
            if (array_key_exists($key, $val)) {
                $result[$val[$key]][] = $val;
            } else {
                $result[""][] = $val;
            }
        }

        return $result;
    }
}
