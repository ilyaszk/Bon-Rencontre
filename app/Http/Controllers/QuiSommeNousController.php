<?php

namespace App\Http\Controllers;

use App\Models\QuiSommeNous;
use Illuminate\Http\Request;

class QuiSommeNousController extends Controller
{

    public function index()
    {
        $QuiSommeNous = QuiSommeNous::get();


        return view('quisommesnous.index', ["QuiSommeNous" => $QuiSommeNous[0]]);
    }
}
