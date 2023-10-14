<?php

namespace App\Http\Controllers;

use App\Models\Produits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EspaceProProduitsController extends Controller
{
    public function index()
    {
        $produits = Produits::where('infocom_id', Auth::user()->infoCommerciale->id)->paginate(10);
        foreach ($produits as $key => $value) {

            if (count($value->images) == 0) {

                $value->file_path = "/frontend/img/placeholders/no_image.jpg";
                $value->alt = "pas d'image";
            } else {
                $image = $value->images->first();
                $value->alt = $image->alt;
                $value->file_path = str_replace("public/", "", $image->file_path); //pb avec faker

            }
        }

        return view('espace-pro-produits.index', [
            'produits' => $produits,
        ]);
    }

    public function action(Request $request)
    {
        if ($request->has('action') && $request->has('idProduit')) {
            switch ($request->get('action')) {
                case 'Supprimer':
                    echo '3';
                    $this->supprimer($request->get('idProduit'));
                    break;
                case 'Modifier':

                    return redirect()->route('modifierProduits', ['reference' => Produits::find($request->get('idProduit'))->reference]);
                    break;
                default:
            }
        }
        return redirect()->route('espace-pro-produit');
    }

    private function supprimer(string $id)
    {
        $produit = Produits::find($id);
        if (!is_null($produit)) {
            foreach ($produit->images as $image) {

                File::delete(str_replace("public/", "", $image->file_path)); //On doit enlever le public
                $image->forceDelete();
            }

            $produit->forceDelete();
        }
    }
}
