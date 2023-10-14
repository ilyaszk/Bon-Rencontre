<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypeCommerceController extends Controller
{
    public function getValues()
    {
        $enum = TypeCommerce::findOrFail(1);
        $type = TypeCommerce::all();

        return view('seller.index', compact('enum', 'type'));
    }
}
