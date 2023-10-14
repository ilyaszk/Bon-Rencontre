<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Produits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CommandeController extends Controller
{
    public function get(Request $request)
    {

        if ($request->has('idCommande')) {

            $commande = Commande::find($request->get('idCommande'));
        }
        $qrcode = QrCode::format('svg')
            ->size(200)
            ->generate(url("/qr-code/{$request->get('idCommande')}"));

        // ENREGISTRER LE QR CODE DANS LE DOSSIER PUBLIC/QRCODES
        $output_file = '/img/qr-code/qr-' . time() . '.svg';
        Storage::disk('local')->put($output_file, $qrcode);

        return view('commande.index', [
            'commande' => $commande,
            'qrcodedata' => $qrcode,
        ]);
    }
}
