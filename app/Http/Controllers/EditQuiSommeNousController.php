<?php

namespace App\Http\Controllers;

use App\Models\QuiSommeNous;
use Illuminate\Http\Request;

class EditQuiSommeNousController extends Controller
{

    public function index(Request $request)
    {
        $quisommenous = QuiSommeNous::get();
        if ($request->has("titre1") && $request->has("para1") && $request->has("titre2") && $request->has("para2") && $request->has("titre3") && $request->has("para3") && $request->has("titre4") && $request->has("para4")) {
            $quisommenous[0]->forceDelete();
            $titre1 = $request->titre1;
            $titre2 = $request->titre2;
            $titre3 = $request->titre3;
            $titre4 = $request->titre4;
            $texte1 = $request->para1;
            $texte2 = $request->para2;
            $texte3 = $request->para3;
            $texte4 = $request->para4;

            $newContent = new QuiSommeNous();
            $newContent->titre1 = $titre1;
            $newContent->titre2 = $titre2;
            $newContent->titre3 = $titre3;
            $newContent->titre4 = $titre4;
            $newContent->para1 = $texte1;
            $newContent->para2 = $texte2;
            $newContent->para3 = $texte3;
            $newContent->para4 = $texte4;


            $newContent->file_path1 = "/public/frontend/img/logo.png";
            $newContent->file_path2 = "/public/frontend/img/logo.png";

            $newContent->save();
            return view('EditQuiSommeNous.index', [
                "quisommenous" => $newContent
            ]);
        }
        return view('EditQuiSommeNous.index', [
            "quisommenous" => $quisommenous[0]
        ]);
    }
}
