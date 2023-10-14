<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditEspaceProMaPageController extends Controller
{

    public function index(Request $request)
    {

        $vendeur = Auth::user();
        $infos = $vendeur->infoCommerciale;

        return view('edit-espace-pro-ma-page.index', [
            'vendeur' => $infos,
        ]);
    }

    public function post(Request $request)
    {
        if ($request->has("nom_entreprise") && $request->has("telephone") && $request->has("email_commercial") && $request->has("numRue") && $request->has("rue") && $request->has("region") && $request->has("ville")) {
            $vendeur = Auth::user();
            $infos = $vendeur->infoCommerciale;
            $infos->nom_entreprise = $request->get("nom_entreprise");
            $infos->telephone = $request->get("telephone");
            $infos->email_commercial = $request->get("email_commercial");
            $infos->numeroRue = $request->get("numRue");
            $infos->rue = $request->get("rue");
            $infos->region = $request->get("region");
            $infos->ville = $request->get("ville");
            $infos->description = $request->get("description");


            $infos->save();

            return view('edit-espace-pro-ma-page.index', [
                'vendeur' => $infos,
            ]);
        }
        echo ($request->get("nom_entreprise"));
        echo ($request->get("telephone"));
        echo ($request->get("email_commercial"));
        echo ($request->get("numRue"));
        echo ($request->get("rue"));
        echo ($request->get("region"));
        echo ($request->get("ville"));
        echo ($request->get("description"));
    }
}
