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
    <link href="{{ asset('frontend/css/pages/politique-confidentialite.css') }}" rel="stylesheet">

    <title>Bon Rencontre - Politique de confidentialité</title>

</head>

<body>
    @include('layouts.inc.frontNavBar')

    {{-- // Vous pouvez choisir de mettre la classe row ou col pour choisir
    //l'orientation du contenu de la page --}}
    <div class="site-container col">

        @yield('titre-description')
        @yield('qui-sommes-nous')
        @yield('donnees-collectees')
        @yield('engagements')
        @yield('comments-exercer-vos-droits')
        @yield('modification')
    </div>

    <!-- Scripts -->
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="{{ asset('frontend/js/mainMenu.js') }}" defer></script>
</body>

</html>
