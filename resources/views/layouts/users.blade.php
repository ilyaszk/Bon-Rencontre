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
    <link href="{{ asset('frontend/css/comp/buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/alerts.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/pagination.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/admin.css') }}" rel="stylesheet">
</head>

<body>

    @include('layouts.inc.sidebar')

    <section class="home-section">
        <div class="home-content">
            <a href="{{ url('/') }}"><span class="iconify" data-icon="bi:arrow-left-circle"></span>Retour
                au site</a>
        </div>

        <div class="admin-content">
            <div class="admin-container">
                @yield('users')
            </div>
        </div>
    </section>

    @yield('scripts')
</body>

</html>
