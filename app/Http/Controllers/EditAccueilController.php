<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Accueil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EditAccueilController extends Controller
{

    public function index(Request $request)
    {
        $accueil = Accueil::get()[0];
        if ($request->has("description") && $request->has("filesToUpload")) {
            $texte = $request->description;
            $accueil->description = $texte;
            if (!is_null($request->file('filesToUpload'))) {

                $file = $request->file('filesToUpload');
                if ($file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'jpeg' || $file->getClientOriginalExtension() == 'png') {

                    $nomFichier = 'banniere.' . $file->getClientOriginalExtension();
                    $accueil->file_path = "frontend/img/banniere." . $file->getClientOriginalExtension();
                    $destinationPath = "frontend/img/";
                    File::delete(str_replace("public/", "", $accueil->file_path)); //On doit enlever le public
                    $file->move($destinationPath, $nomFichier);
                }
            }

            $accueil->save();
            return view('EditAccueil.index', [
                "accueil" => $accueil
            ]);
        }
        return view('EditAccueil.index', [
            "accueil" => $accueil
        ]);
    }
}
