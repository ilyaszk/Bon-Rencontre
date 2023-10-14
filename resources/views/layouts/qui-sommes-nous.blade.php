<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('frontend/css/comp/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/pages/quisommesnous.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/pages/footer.css') }}" rel="stylesheet">
    <title>Bon Rencontre</title>
</head>

<body>
    @include('layouts.inc.frontNavBar')

    <div class="qsn-container">

        <div class="qsn-par1">
            @yield('qsn')
        </div>

        <section class="qsn-par234">
            <div class="qsn-par23">
                @yield('nos-valeurs-nos-objectifs')
            </div>

            <div class="qsn-par4img">
                @yield('nos-locaux')
                <div class="qsn-img">
                    @yield('image-demo')
                </div>
            </div>
        </section>


    </div>
    @include('layouts.inc.footer')

    <!-- Scripts -->
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js" defer></script>
    <script src="{{ asset('frontend/js/mainMenu.js') }} " defer></script>
    <script src="{{ asset('frontend/js/footer.js') }}" defer></script>
</body>

</html>
