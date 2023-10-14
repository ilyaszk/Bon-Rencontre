<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfosCommerciales;

class VendeurController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('id')) {
            $vendeur = InfosCommerciales::find($request->get('id'));
            $produits = $vendeur->produits;
        }
        return view('vendeur.index', [
            'vendeur' => $vendeur,
            'produits' => $produits,

        ]);
    }
}
