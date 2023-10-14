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
    <link href="{{ asset('frontend/css/comp/buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/pages/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/pages/vendeur.css') }}" rel="stylesheet">


</head>

<body>
    @include('layouts.inc.frontNavBar')
    <div class="pageVendeur">
        @if (!is_null($vendeur->file_path))
            <div class="banniere"> <img src="{{ $vendeur->file_path }}" alt="Banniere"></div>
        @endif

        <div class="info-vendeur">
            <div class="infos-textuels">
                <h2>{{ $vendeur->nom_entreprise }}</h2>
                <div class="tel"><span class="iconify" data-icon="carbon:phone-voice"
                        style="color: #aeaeae;" data-height="40"></span>
                    <p>{{ $vendeur->telephone }}</p>
                </div>
                <div class="mel"><span class="iconify" data-icon="fluent:mail-48-regular"
                        style="color: #aeaeae;" data-height="40"></span>
                    <p>{{ $vendeur->email_commercial }}</p>
                </div>
                <div class="adresse"><span class="iconify" data-icon="iconoir:home-alt"
                        style="color: #aeaeae;" data-height="40"></span>
                    <p>{{ $vendeur->numeroRue . ' ' . $vendeur->rue . ',' }}<br>{{ $vendeur->region . ' ' . $vendeur->ville }}
                    </p>
                </div>
            </div>
            <div class="reseaux-sociaux">
                @if (!is_null($vendeur->lien_insta))
                    <a href="{{ $vendeur->lien_insta }}" class="textLink"><span class="iconify"
                            data-icon="akar-icons:instagram-fill" style="color: #aeaeae;" data-height="40"></span></a>
                @endif
                @if (!is_null($vendeur->lien_fb))
                    <a href="{{ $vendeur->lien_fb }}" class="textLink"><span class="iconify"
                            data-icon="iconoir:facebook" style="color: #aeaeae;" data-height="40"></span></a>
                @endif
                @if (!is_null($vendeur->lien_twitter))
                    <a href="{{ $vendeur->lien_twitter }}" class="textLink"><span class="iconify"
                            data-icon="eva:twitter-outline" style="color: #aeaeae;" data-height="40"></span></a>
                @endif




            </div>
        </div>
        @if (!is_null($vendeur->description))
            <p class="description">{{ $vendeur->description }}
            </p>
        @endif

        <div class="articles">
            <a class="btn-primary" href=" {{ url('/nos-produits?productors=' . $vendeur->id) }}">Les produits
                de
                {{ $vendeur->nom_entreprise }}</a>
        </div>

    </div>






    @include('layouts.inc.footer')
    <!-- Scripts -->
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="{{ asset('frontend/js/mainMenu.js') }}"></script>
    <script src="{{ asset('frontend/js/footer.js') }}" defer></script>


</body>

</html>
