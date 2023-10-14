<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Visiteurs;
use PhpParser\Node\Expr\Assign;

class ParametresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $emailClient = User::find(auth()->user()->id)->email;
        $visiteur = Visiteurs::where('email', $emailClient)->get();
        return view('parametres.index', compact('visiteur'));
    }

    public function storePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'min:8', new MatchOldPassword],
            'new_password' => ['required', 'min:8'],
            'new_confirm_password' => ['required', 'same:new_password', 'min:8'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return redirect('/parametres/succes-update');
    }

    public function storeEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);

        User::find(auth()->user()->id)->update(['email' => $request->email]);

        return redirect('/parametres/succes-update');
    }

    public function storeNewsletterValue(Request $request)
    {
        $emailClient = User::find(auth()->user()->id)->email;
        if ($request['news-or-nothing'] == 'yes') {
            $visiteur = Visiteurs::where('email', $emailClient)->get();
            if (empty($visiteur[0])) {
                $visiteur = new Visiteurs();
                $visiteur->email = $emailClient;
                $visiteur->id = Visiteurs::max('id') + 1;
                $visiteur->save();
                return redirect('/parametres/succes-update');
            } else {
                return redirect('/parametres/succes-update');
            }
        } else {
            $visiteur = Visiteurs::where('email', $emailClient)->get();
            if (empty($visiteur[0])) {
                return redirect('/parametres/succes-update');
            } else {
                $idVisiteur = $visiteur[0]->id;
                Visiteurs::find($idVisiteur)->delete();
                return redirect('/parametres/succes-update');
            }
        }
    }
}
