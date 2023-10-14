<?php

namespace App\Http\Controllers;

use App\Models\Marche;
use Illuminate\Http\Request;

class EditMarcheController extends Controller
{

    public function index(Request $request)
    {
        $marche = Marche::get();
        if ($request->has("titre1") && $request->has("para1") && $request->has("titre2") && $request->has("para2") && $request->has("titre3") && $request->has("para3") && $request->has("date1") && $request->has("date2") && $request->has("date3")) {
            $marche[0]->forceDelete();
            $titre1 = $request->titre1;
            $titre2 = $request->titre2;
            $titre3 = $request->titre3;
            $texte1 = $request->para1;
            $texte2 = $request->para2;
            $texte3 = $request->para3;
            $date1 = $request->date1;
            $date2 = $request->date2;
            $date3 = $request->date3;

            $newContent = new Marche();
            $newContent->titre1 = $titre1;
            $newContent->titre2 = $titre2;
            $newContent->titre3 = $titre3;
            $newContent->para1 = $texte1;
            $newContent->para2 = $texte2;
            $newContent->para3 = $texte3;
            $newContent->date1 = $date1;
            $newContent->date2 = $date2;
            $newContent->date3 = $date3;


            $newContent->file_path = "/public/frontend/img/logo.png";

            $newContent->save();
            return view('EditMarche.index', [
                "marche" => $newContent
            ]);
        }
        return view('EditMarche.index', [
            "marche" => $marche[0]
        ]);
    }
}
