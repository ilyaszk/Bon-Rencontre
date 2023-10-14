<?php

namespace App\Http\Controllers;

use App\Models\InfosCommerciales;
use App\Models\Produits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PanierController extends Controller
{
    public function index(Request $request)
    {
        if (!empty($request->get('ref'))) {
            $ref = $request->get('ref');
        } else {
            $ref = 0;
        }
        if (!$request->session()->has('produits')) {
            $request->session()->put("produits", collect());
        }

        if ($request->session()->has('produits')) {
            $produits = $request->session()->get("produits");
        }

        if ($request->submit == "deletePanier") {
            foreach ($produits as $key => $value) {
                if ($value['ref'] == $ref) {
                    $produits->forget($key);
                }
            }
        }

        if (!empty($request->get('quantite')) && !empty($request->get('refQuant'))) {
            $quantite = $request->get('quantite');
            $refQuant = $request->get('refQuant');

            foreach ($produits as $key => $value) {
                if ($value['ref'] == $refQuant) {
                    $produitAModif = $value;
                    $produitAModif['quantité'] = $quantite;
                    $request->session()->get("produits")->forget($key);
                    $request->session()->get("produits")->push($produitAModif);
                }
            }
        } else {
            $quantite = 1;
        }

        $total = 0;

        foreach ($produits as $key => $value) {
            $total += ($value['prix'] * $value['quantité']);
            //$value['producteur'] = InfosCommerciales::find(Produits::where('reference', $value['ref'])->get()[0]->infocom_id)->nom_entreprise;
        }

        return view('panier.index', [
            "produits" => $produits,
            "quantite" => $quantite,
            "total" => $total
        ]);
    }
}
