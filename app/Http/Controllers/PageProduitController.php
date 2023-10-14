<?php

namespace App\Http\Controllers;

use App\Models\Produits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PageProduitController extends Controller
{
    public function get(Request $request)
    {

        $prix = array();
        $ajouterBool = true;

        if ($request->has('ref')) {



            $produit = Produits::limit(1)->where('reference', '=', $request->get('ref'))->get();
            $images = array();



            if ($produit->count() > 0) { //ok
                if (isset($produit[0]->images->first()->file_path)) {
                    $contains_images = true;
                    foreach ($produit[0]->images as $prod) {
                        $prod->file_path = str_replace("public/", "", $prod->file_path);
                    }
                } else {
                    $contains_images = false;
                }
                $prix = explode(".", strval($produit[0]->prix));
            } else { //Erreur pas de produit
                //page erreur

            }

            if ($request->submit == "addPanier") {
                if (!$request->session()->has('produits')) {
                    $request->session()->put("produits", collect());
                }
                foreach ($request->session()->get('produits') as $key => $value) {
                    if ($value['ref'] == $request->get('ref')) {
                        $ajouterBool = false;
                        $produitAModif = $value;
                        $produitAModif['quantité']++;
                        $request->session()->get("produits")->forget($key);
                        $request->session()->get("produits")->push($produitAModif);
                    }
                }
                if (count($produit[0]->images) == 0) {
                    $img = collect([]);
                    $img->file_path = "/frontend/img/placeholders/no_image.jpg";
                    $img->alt = "pas d'image";
                } else {
                    $img =  $produit[0]->images->first();
                }

                if ($ajouterBool == true) {
                    $request->session()->get("produits")->push([
                        "ref" => $request->get('ref'),
                        "img" => $img,
                        "nomProduit" => $produit[0]->nom,
                        "prix" => $produit[0]->prix,
                        "quantité" => 1
                    ]);
                }
            }
        }


        return view('layouts.pageProduit', [
            'contains_images' => $contains_images,
            'produit' => $produit[0],
            'main_image' => $produit[0]->images->first(),
            'small_images' =>  $produit[0]->images,
            'euros' =>  $prix[0],
            'centimes' => (isset($prix[1]) ? (strlen($prix[1]) == 2 ? $prix[1] : $prix[1] . '0') : '00'),

        ]);
    }
}
