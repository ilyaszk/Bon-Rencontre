<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script async charset="utf-8" src="//cdn.embedly.com/widgets/platform.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('frontend/css/comp/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/cards.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/sidebar.css') }}" rel="stylesheet">
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
                <style>
                    .image {
                        overflow: hidden;
                    }

                    img {
                        margin: 1rem;
                        max-width: 100%;
                    }

                </style>
                <h3>Aperçu</h3>
                <p>Prévisualisation avant envoi.</p>
                <p>Attention! Cette action est définitive et la newsletter sera envoyée à tous les utilisateurs qui ont
                    consenti à celle-ci.</p>
                <br>
                <div class="newsletter-card">
                    {!! $body !!}
                </div>



                <form action="{{ route('newsletter.send') }}" method="post">
                    @csrf
                    <input type="hidden" name="body" value="{{ $body }}">
                    <div class="btn-container">
                        <button class="btn-primary" id="btnSubmit">ENVOYER</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="{{ asset('admin/js/sidebar.js') }}" defer></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
</body>

</html>
