<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Visiteurs;
use App\Mail\NewsletterMail;
use Illuminate\Http\Request;
use App\Mail\NewsletterMarkdown;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('newsletter.create');
    }

    public function inscription(Request $request)
    {
        // dd($request->input('email'));
        $email = $request->input('email');

        // ON INSERT LE MAIL DANS LA TABLE D'INSCRITS A LA NEWSLETTER
        DB::table('visiteurs')->updateOrInsert(
            [
                'email' => $email,
            ],
            [
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now(),
            ]
        );

        // ON REDIRIGE VERS UNE PAGE DE SUCCES
        return redirect('/newsletter/succes-inscription');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }

    public function view(Request $request)
    {
        // dd($request->input('body'));
        $body = $request->input('body');

        return view('newsletter.view', ['body' => $body]);
    }

    public function send(Request $request)
    {
        // ON RECUPERE LES MAILS SOUS FORME DE TABLEAU
        $emails = Visiteurs::pluck('email')->toArray();

        // BODY
        $style = '<style>.image {overflow: hidden;}img{margin: 1rem;max-width: 100%;}</style>';
        $body = $request->input('body');
        $formatedBody = $style . $body;
        // dd($formatedBody);

        // INSERTION DU BODY DANS LA TABLE NEWSLETTER
        DB::table('newsletters')->insert([
            'body' => $formatedBody,
        ]);

        // TABLEAU DE DONNEES A ENVOYER
        $subject = 'Test newsletter';
        $siteName = 'Bon-Rencontre';

        $data = array(
            'body' => $formatedBody,
            'subject' => $subject,
            'website_name' => $siteName,
        );

        // POUR CHAQUE INSCRIT A LA NEWSLETTER ON ENVOIE UN MAIL
        // ET ON INSERT DANS LA TABLE ABONNEMENTS LES CLES ETRANGERES
        foreach ($emails as $value) {
            Mail::to($value)->send(new NewsletterMarkdown($data));
        }
        // PAGE DE SUCCES
        return redirect('/newsletter/success');
    }
}
