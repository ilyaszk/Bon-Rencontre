<?php

namespace App\Http\Controllers;

use App\Models\FaqBloc;
use App\Models\FaqCategorie;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {

        $categories = FaqCategorie::get();

        return view('faq.index', [
            'categories' => $categories
        ]);
    }
}
