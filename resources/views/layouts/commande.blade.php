<!DOCTYPE html>
<html lang="fr" dir='ltr'>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    {{-- Styles --}}
    <link href="{{ asset('frontend/css/comp/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/comp/article.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/pages/nosProduits.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/comp/buttonProduit.css') }}">
    <link href="{{ asset('frontend/css/comp/buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/pages/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/pages/commande.css') }}" rel="stylesheet">





</head>

<body>
    @include('layouts.inc.frontNavBar')
    <div class="page">
        <h1 class="titre">Résumé de votre commande</h1>
        <div class="commande">
            <div class="articles">
                @yield('titres')
                @yield('space')
                @foreach ($commande->sous_commandes as $sous_commande)
                    @foreach (DB::table('ligne_commande')->where('sous_commande_id', '=', $sous_commande->id)->get()
    as $ligneCommande)

                        @php
                            $produit = App\Models\Produits::find($ligneCommande->produit_id);
                        @endphp
                        <div>
                            <span>{{ $produit->nom }}</span>
                            <span>{{ $produit->prix }}€</span>
                            <span>{{ $ligneCommande->quantite }}</span>
                            <span>{{ $ligneCommande->quantite * $produit->prix }}€</span>
                            <span>@if ($sous_commande->commande_recup) Récupérée @else @if ($sous_commande->commande_prete) <span class="iconify" data-icon="el:ok" data-width="20" data-height="20"></span> @else <span class="iconify" data-icon="dashicons:no-alt" data-width="30" data-height="30"></span>@endif @endif</span>
                        </div>
                    @endforeach
                @endforeach
                @yield('space')

                @yield('total')

            </div>
            <div class="infos-commande">
                <p class="num-commande">N° de commande : {{ $commande->id }}</p>
                <div class="nom">
                    <p class="titre-nom">Nom et prénom :</p>
                    <div><span>{{ $commande->User->nom }}</span> <span>{{ $commande->User->prenom }}</span></div>
                </div>
                <div class=infos-recup>
                    <p class="titre-adresses">Adresses de retrait</p>
                    <p class="adresses">
                        Bar/Restaurant
                    </p>
                    <div class="date">
                        <p class="titre-date">Horaires d'ouvertures</p>
                        <p>Lundi : 10h - 20h</p>
                        <p>Mardi : 10h - 20h</p>
                        <p>Mercredi : 10h - 20h</p>
                        <p>Jeudi : 10h - 20h</p>

                        </p>
                    </div>


                    {!! $qrcodedata !!}

                </div>
            </div>
        </div>



        @include('layouts.inc.footer')
        <!-- Scripts -->
        <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
        <script src="{{ asset('frontend/js/mainMenu.js') }}"></script>
        <script src="{{ asset('frontend/js/footer.js') }}" defer></script>


</body>

</html>
