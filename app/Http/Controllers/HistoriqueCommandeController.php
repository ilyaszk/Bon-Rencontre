<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Produits;
use App\Models\SousCommande;
use Illuminate\Http\Request;
use App\Mail\CommandeMarkdown;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HistoriqueCommandeController extends Controller
{
    public function get(Request $request)
    {
        $page = '';
        if ($request->has('page')) {
            $page = $request->get('page');
        }
        //pour chaque type de commande (fini, pas fini, collecte ...)
        switch ($page) {
            case 'en-cours':
                $commandes = SousCommande::where('infocom_id', Auth::user()->infoCommerciale->id)->where('commande_prete', false)->where('commande_recup', false)->get();
                $current_page = 1;
                break;
            case 'pret':
                $commandes = SousCommande::where('infocom_id', Auth::user()->infoCommerciale->id)->where('commande_prete', true)->where('commande_recup', false)->get();
                $current_page = 2;
                break;
            case 'termine':
                $commandes = SousCommande::where('infocom_id', Auth::user()->infoCommerciale->id)->where('commande_recup', true)->get();
                $current_page = 3;
                break;
            default:
                $commandes = SousCommande::where('infocom_id', Auth::user()->infoCommerciale->id)->where('commande_prete', false)->get();
                $current_page = 1;
        }

        return view('historiqueCommandes.index', [
            'current_page' => $current_page,
            'commandes' => $commandes,
        ]);
    }

    public function change(Request $request)
    {
        if ($request->has('commandeId')) {
            $id = $request->get('commandeId');
            $commande = SousCommande::find($id);
            $commande->commande_prete = $request->has('etat-checkbox');
            if ($commande->commande_prete) {
                $data = [];
                $lignes = DB::table('ligne_commande')->where('sous_commande_id', '=', $commande->id)->get();
                foreach ($lignes as $ligne) {
                    $produit = Produits::find($ligne->produit_id);
                    $data[] = [
                        'ref' => $produit->reference,
                        'quantite' => $ligne->quantite,
                        'nom' => $produit->nom,
                        'prix_u' => $produit->prix,
                    ];
                }
                Mail::to($commande->commande->user->email)->send(new CommandeMarkdown($data));
            }
            $commande->save();
            //rediriger sur la bonne page
            switch ($request->get('pageNum')) {
                case 1:
                    $current_page = 'en-cours';
                    break;
                case 2:
                    $current_page = 'pret';
                    break;
                case 3:
                    $current_page = 'termine';
                    break;
                default:
                    $current_page = 'en-cours';
            }
            return redirect()->route('historique-commande-vendeur', ['page' => $current_page]);
        }
    }
}
