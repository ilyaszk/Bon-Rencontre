<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Marche;
use App\Models\Produits;
use Illuminate\Http\Request;
use App\Models\Categorie_produits;
use Illuminate\Support\Facades\File;

class ModifierProduitController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('reference')) {
            $produit = Produits::where('reference', $request->get('reference'))->get();
            if (!$produit->isEmpty()) {
                $produit = $produit[0];
                $images = $produit->images;
                foreach ($images as $image) {
                    $image->file_path = str_replace("public/", "", $image->file_path);
                }
            }
        }
        return view('layouts.modifierProduit', [
            'categories' => Categorie_produits::get(),
            'produit' => $produit,
            'images' => $images,
        ]);
    }

    public function modifier(Request $request)
    {

        if ($request->has('titre') && $request->has('desc') && $request->has('prix') && $request->has('idProduit')) {
            $titre = $request->get('titre');
            $desc = $request->get('desc');
            $prix = $request->get('prix');
            //modifier produit
            $objet = Produits::find($request->get('idProduit'));
            $objet->nom = $titre;
            $objet->desc_produit = $desc;
            $objet->prix = $prix;
            $objet->en_stock = ($request->has('stock'));

            $images = [];
            $i = 1;
            //changer les images
            if (!is_null($request->file('filesToUpload'))) {
                if (!is_null($objet)) {
                    foreach ($objet->images as $image) {

                        File::delete(str_replace("public/", "", $image->file_path)); //On doit enlever le public
                        $image->forceDelete();
                    }
                }
                foreach ($request->file('filesToUpload') as $file) {
                    if ($file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'jpeg' || $file->getClientOriginalExtension() == 'png') {
                        $random = $this->random_string();
                        $image = new Images();
                        $image->id = Images::max('id') + $i;
                        $image->alt = "Image du produit";
                        $nomFichier = $random . '.' . $file->getClientOriginalExtension();
                        $image->file_path = "public/frontend/img/produits_img/" . $nomFichier;
                        array_push($images, $image);
                        $destinationPath = "frontend/img/produits_img/";
                        $file->move($destinationPath, $nomFichier);
                        $i++;
                    }
                }
            }





            if ($request->has('categorie') && is_numeric($request->get('categorie'))) {
                $categorie = Categorie_produits::find($request->get('categorie'));
            } else {
                $categorie = $objet->categorie;
            }

            //sauvegarder les modifications
            $objet->categorie()->associate($categorie);




            $objet->save();
            $objet->images()->saveMany($images);
        }

        return redirect()->route('espace-pro-produit');
    }

    function random_string()
    {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
        for ($i = 0; $i < 32; $i++) {
            $string .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $string;
    }
}
