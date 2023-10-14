<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HistoriqueCommandesClientController extends Controller
{
    public function get(Request $request)
    {
        $commandes = Commande::where('user_id', Auth::user()->id)->get();

        return view('historiqueCommandesClients.index', [
            'commandes' => $commandes,
        ]);
    }
}
