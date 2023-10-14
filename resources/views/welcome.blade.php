<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    {{-- Styles --}}
    <link href="{{ asset('frontend/css/comp/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/pages/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/pages/accueil.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/comp/article.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/comp/buttonProduit.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/comp/popUp.css') }}">

    <title>Bon Rencontre</title>

</head>

<body>

    @include('layouts.inc.frontNavBar')

    <div class="site-container center-h">

        <div class="contenu">

            @yield('header-bienvenue')
            @yield('produits')
            @yield('services')
            @yield('popUpPanier')

        </div>

    </div>

    @include('layouts.inc.footer')

    <!-- Scripts -->
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="{{ asset('frontend/js/mainMenu.js') }}" defer></script>
    <script src="{{ asset('frontend/js/footer.js') }}" defer></script>
    <script src="{{ asset('frontend/js/popUp.js') }}" defer></script>
    <script async defer src="https://87mzb2ww.twic.pics/?v1"></script>

</body>

</html>
