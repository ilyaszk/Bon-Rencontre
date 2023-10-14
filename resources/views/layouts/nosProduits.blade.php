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
    <link href="{{ asset('frontend/css/comp/pagination.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/comp/popUp.css') }}">




</head>

<body>
    @include('layouts.inc.frontNavBar')
    <section class="boutique">
        <form class="boutique-filtres" action="" method="GET">
            <div class="boutique-filtres-categories-producteurs">

                @yield('filtre-categorie')
                @yield('filtre-producteur')
            </div>
            @yield('trie')
        </form>
        <div class="boutiques-cards">

            @yield('article-card')



        </div>
        </div>
        <div class="pages">
            {{ $produitsBDD->links('pagination::bootstrap-4') }}
        </div>
    </section>
    @yield('popUpPanier')

    @include('layouts.inc.footer')
    <!-- Scripts -->
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="{{ asset('frontend/js/mainMenu.js') }}"></script>
    <script src="{{ asset('frontend/js/popUp.js') }}" defer></script>
    <script src="{{ asset('frontend/js/footer.js') }}" defer></script>


</body>

</html>
