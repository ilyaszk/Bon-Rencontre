<?php

namespace App\Http\Controllers;

use App\Models\InfosCommerciales;
use App\Models\Produits;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $nbProduits = Produits::get()->count();
        $nbProducteurs = InfosCommerciales::get()->count();
        $nbClients = User::get()->count();

        return view('dashboard.index', [
            'nbProduits' => $nbProduits,
            'nbProducteurs' => $nbProducteurs,
            'nbClients' => $nbClients - $nbProducteurs,

        ]);
    }
}
