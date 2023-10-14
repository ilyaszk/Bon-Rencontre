<?php

namespace App\Http\Controllers;

use App\Models\Produits;
use Illuminate\Http\Request;
use App\Support\UserCollection;
use App\Models\InfosCommerciales;
use App\Models\Categorie_produits;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Collection;


class NosProduitsController extends Controller
{



    public function index(Request $request)
    {
        // //Trie prix croissant  etc...
        // if ($request->session()->has('trie') && ($request->sort != NULL)) {

        //     $trie = $request->sort;
        //     $request->session()->put('trie', $request->sort);
        // } else if ($request->session()->has('trie') && $request->sort == NULL) {
        //     $trie = $request->session()->get('trie');
        // } else {
        //     $trie = $request->sort;
        //     $request->session()->put('trie', $trie);
        // }



        //Filtre categorie legume etc...

        if ($request->session()->has('categorie') && $request->categorie != NULL) {
            $categ = $request->categorie;
            $request->session()->put('categorie', $request->categorie);
        } else if ($request->session()->has('categorie') && $request->categorie == NULL) {
            $categ = $request->session()->get('categorie');
        } else {
            $categ = $request->categorie;
            $request->session()->put('categorie', $categ);
        }



        if ($request->session()->has('productors') && $request->productors != NULL) {
            $producteurs = $request->productors;
            $request->session()->put('productors', $request->productors);
        } else if ($request->session()->has('productors') && $request->productors == NULL) {
            $producteurs = $request->session()->get('productors');
        } else {
            $producteurs = $request->productors;
            $request->session()->put('productors', $request->productors);
        }




        // switch ($trie) {
        //     case 'croissant':
        //         $produitsBDD = Produits::orderBy('prix', 'asc')->paginate(8)->onEachSide(1);

        //         break;
        //     case 'decroissant':
        //         $produitsBDD = Produits::orderBy('prix', 'desc')->paginate(8)->onEachSide(1);
        //         break;
        //     case 'nouveauté':
        //         $produitsBDD = Produits::orderBy('updated_at', 'asc')->paginate(8)->onEachSide(1);
        //         break;

        //     default:
        switch ($categ) {
            case 'all':
                switch ($producteurs) {
                    case 'all':
                        $produitsBDD = Produits::paginate(8)->onEachSide(1);
                        break;
                    default:
                        $produitsBDD = Produits::where('infocom_id', $producteurs)->paginate(8)->onEachSide(1);
                        break;
                }
                break;
            default:
                $produitsBDD = Produits::where('categories_id', '=', $categ)->paginate(8)->onEachSide(1);
                break;
        }
        //         break;
        // }


        if (!$request->session()->has('productors') && !$request->session()->has('categorie')) {
            $produitsBDD = Produits::paginate(8)->onEachSide(1);
        }





        // if ($producteurs != null && $producteurs != 'all') {
        //     $produitsBDD = Produits::where('infocom_id', $producteurs)->paginate(8)->onEachSide(1);
        // }



























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
            $value->vendeur = $value->info_commerciale;
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

        $producteurs = InfosCommerciales::get();
        return view('nosProduits.index', [
            'produitsBDD' => $produitsBDD,
            'categories' => $categories,
            // 'trie' => $trie,
            'producteurs' => $producteurs,
        ]);
    }
}
