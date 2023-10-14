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
    <link href="{{ asset('frontend/css/pages/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/cards.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/pages/panier.css') }}" rel="stylesheet">


    <title>Bon Rencontre</title>

</head>

<body>
    @include('layouts.inc.frontNavBar')
    <div class="site-container col center-v">
        <H2>Commande effectuée</H2>
        <p>Nous vous avons envoyé un mail de confirmation. <br> Vous trouverez votre bon de
            commande dans votre espace client.</p>

        <h4>Merci pour votre confiance!</h4>
        <br>
        <br>
        <br>

    </div>
    @include('layouts.inc.footer')
    <!-- Scripts -->
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="{{ asset('frontend/js/mainMenu.js') }}" defer></script>
    <script src="{{ asset('frontend/js/footer.js') }}" defer></script>

</body>

</html>
