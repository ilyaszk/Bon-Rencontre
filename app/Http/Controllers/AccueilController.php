<?php

namespace App\Http\Controllers;

use App\Models\Accueil;
use App\Models\Produits;
use App\Models\Categorie_produits;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index(Request $request)
    {
        $produitsBDD = Produits::where('en_vedette', 't')->limit(4)->get();
        $produit = Produits::limit(1)->where('reference', '=', $request->get('ref'))->get();
        $categories = Categorie_produits::get();
        $ajouterBool = true;

        foreach ($produitsBDD as $key => $value) {

            if (count($value->images) == 0) {

                $value->file_path = "/frontend/img/placeholders/no_image.jpg";
                $value->alt = "pas d'image";
            } else {
                $image = $value->images->first();
                $value->image = $image;
                $value->file_path = str_replace("public/", "", $image->file_path); //pb avec faker 

            }

            $prix = explode(".", strval($value['prix']));
            $value->prixDisplayEuros = $prix[0];
            $value->prixDisplayCentimes = isset($prix[1]) ? (strlen($prix[1]) == 2 ? $prix[1] : $prix[1] . '0') : '00'; // ajout des 0 manquants

        }
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

        $accueil = Accueil::get();


        return view('accueil.index', [
            'produitsBDD' => $produitsBDD,
            'categories' => $categories,
            'accueil' => $accueil[0]
        ]);
    }
}
