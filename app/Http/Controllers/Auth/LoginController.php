<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function authenticated()
    {
        $nom = Auth::user()->nom;
        $prenom = Auth::user()->prenom;
        session()->put('nom', $nom);
        session()->put('prenom', $prenom);
        session()->forget('admin');
        session()->forget('client');
        session()->forget('vendeur');

        if (Auth::user()->role_as == '1') { // Connexion en tant qu'administrateur
            session()->put('admin', true);
            return redirect('dashboard')->with('status', 'Bienvenue sur le back-office');
        } elseif (Auth::user()->role_as == '0') { //Connexion en tant que client
            session()->put('client', true);
            return redirect('/')->with('status', 'Connecté avec succès');
        } elseif (Auth::user()->role_as = '2') { // Connexion en tant que vendeur
            session()->put('vendeur', true);
            return redirect('/espace-pro')->with('status', 'Connecté avec succès');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
