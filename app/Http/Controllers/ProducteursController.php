<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfosCommerciales;

class ProducteursController extends Controller
{
    public function index()
    {
        $infos = InfosCommerciales::get();
        $tab = array([]);
        foreach ($infos as $item) {
            $tab[] = array(
                'nom_entreprise' => $item['nom_entreprise'],
                'latitude' => $item['latitude'],
                'longitude' => $item['longitude'],
                'rue' => $item['rue'],
                'numeroRue' => $item['numeroRue'],
                'telephone' => $item['telephone'],
                'email_commercial' => $item['email_commercial'],
                'ville' => $item['ville']
            );
        }


        return view('producteurs.index', ["infos" => $infos, "tab" => $tab]);
    }
}
