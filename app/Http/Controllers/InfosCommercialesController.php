<?php

namespace App\Http\Controllers;

use App\Models\TypeCommerce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InfosCommercialesController extends Controller
{
    function index()
    {
        $type = TypeCommerce::all();
        $selectedId = 2;
        return view('seller.index', compact('type', 'selectedId'));
    }

    function add(Request $request)
    {
        $type = TypeCommerce::all();
        $selectedId = 2;
        $userId = Auth::user()->id;

        $request->validate([
            'nom_entreprise' => 'required',
            'siret' => 'required',
            // 'adresse' => 'required',
            'email_commercial' => 'required|email',
            'telephone' => 'required',
            'type_commerce' => 'required'
        ]);

        $query = DB::table('infos_commerciales')->insert([
            'nom_entreprise' => $request->input('nom_entreprise'),
            'siret' => $request->input('siret'),
            'numeroRue' => $request->input('numeroRue'),
            'rue' => $request->input('rue'),
            'ville' => $request->input('ville'),
            'region' => $request->input('region'),
            'longitude' => $request->input('longitude'),
            'latitude' => $request->input('latitude'),
            'email_commercial' => $request->input('email_commercial'),
            'telephone' => $request->input('telephone'),
            'type_commerce' => $request->input('type_commerce'),
            'user_id' => $userId,
        ]);

        if ($query) {
            return view('seller.index', compact('type', 'selectedId'));
        }
    }
}

// => App\Models\InfosCommerciales {#4480
//     id: 1,
//     nom_entreprise: "Au petit bonheur",
//     siret: 32067376700010,
//     adresse: "5 chemin de notre dame",
//     ville: "Eybens", => A enlever
//     code_postal: 38320, => A enlever
//     email_commercial: "vendeur1@gmail.com",
//     telephone: "0685456925",
//     en_vedette: true,
//     type_commerce: "Aucun",
//     is_complete: false, => A enlever
//     created_at: "2021-12-10 20:44:01",
//     updated_at: "2021-12-10 20:44:01",
//     user_id: 3,
//   }
