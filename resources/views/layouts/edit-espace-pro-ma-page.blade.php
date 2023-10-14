<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('frontend/css/comp/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/cards.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/pages/editqsn.css') }}" rel="stylesheet">

</head>

<body>

    @include('layouts.inc.frontNavBar')

    <section class="home-section">

        <div class="admin-content">
            <div class="admin-container">
                <h3>Edition de la page "Espace pro - Ma page"</h3>
                <form action="/edit-espace-pro-ma-page" method="post">
                    @csrf
                    @yield('zoneEdition')

                    <div class="row-btn"> <button type="submit" class="btn-primary">Sauvegarder les
                            modifications</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @yield('scripts')
</body>

</html>
