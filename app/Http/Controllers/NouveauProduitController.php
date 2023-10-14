<?php

namespace App\Http\Controllers;

use Produit;
use App\Models\Images;
use App\Models\Produits;
use App\Models\Reductions;
use Illuminate\Http\Request;
use App\Models\InfosCommerciales;
use App\Models\Categorie_produits;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NouveauProduitController extends Controller
{
    public function index(Request $request)
    {


        return view('ajouterProduit.index', [
            'categories' => Categorie_produits::get(),
        ]);
    }
    public function showUploadFile(Request $request)
    {
        if ($request->has('titre') && $request->has('desc') && $request->has('prix')) {

            $titre = $request->get('titre');
            $desc = $request->get('desc');
            $prix = $request->get('prix');
            $objet = new Produits();
            $objet->nom = $titre;
            $objet->desc_produit = $desc;
            $objet->prix = $prix;
            do {
                $nvlRef = random_int(0, 9999999999999);
            } while (!is_null(Produits::find($nvlRef)));
            $objet->reference = $nvlRef;
            $objet->id = Produits::max('id') + 1;
            $objet->en_stock = $request->has('stock');
            $objet->en_vedette = false;
            $images = [];
            $i = 1;
            if (!is_null($request->file('filesToUpload'))) {
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
                $categorie = Categorie_produits::find(1);
            }
            $user = Auth::user();
            $infoCom = $user->infoCommerciale;


            $objet->categorie()->associate($categorie);
            $objet->info_commerciale()->associate($infoCom);




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
