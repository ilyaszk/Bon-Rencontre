<?php
namespace App\Http\Controllers;

use App\Models\Marche;
use Illuminate\Http\Request;

class MarcheController extends Controller
{

    public function index()
    {
        $marche = Marche::get();


        return view('marche.index', ["marche" => $marche[0] ]);
    }
}
