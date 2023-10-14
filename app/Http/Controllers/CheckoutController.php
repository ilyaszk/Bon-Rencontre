<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Commande;
use App\Models\Produits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CheckoutController extends Controller
{
    public function get(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $total = $request->input('total');

        $intent = $stripe->paymentIntents->create(
            [
                'amount' => $total * 100,
                'currency' => 'eur',
                'automatic_payment_methods' => ['enabled' => true],
            ]
        );

        return view('layouts.checkout', [
            'intent' => $intent,
            'total' => $total,
        ]);
    }
}
