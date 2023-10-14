<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    public function html_email(Request $request)
    {


        if ($request->envoi == "true") {
            $request->session()->flush();

            $data = array(
                'email' => $request->email,
                'name' => $request->fullName,
                'msg' => $request->msg,
                'numero' => $request->numero
            );

            Mail::send('layouts.mail-formulaire-contact', $data, function ($message) {
                $message->to('bonrencontretest@gmail.com', 'Tutorials Point')->subject('Formulaire de contact');
                $message->from('bonrencontretest@gmail.com', 'BonRencontre');
            });
        }
        //var_dump($info);
        return view("contact.index");
    }
}
