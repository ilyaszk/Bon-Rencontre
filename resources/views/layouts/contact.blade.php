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
    <link href="{{ asset('frontend/css/pages/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/pages/contact.css') }}" rel="stylesheet">



    <title>Bon Rencontre</title>

</head>

<body>
    @include('layouts.inc.frontNavBar')

    <div class="site-container">

        <div class="information">
            @yield('adresseMairie')

            @yield('telephoneMairie')

            @yield('mailMairie')

            @yield('horaireMairie')

        </div>
        <div class="formulaire">

            <form action="{{ url('/contact') }}" method="post">
                @csrf
                <div class="text_Area">

                    @yield('fullName')

                    <div class="numEmail">

                        @yield('numero')

                        @yield('email')

                    </div>

                    @yield('text')

                </div>

                <div class="contact-btn-container">
                    @yield('bouton')
                </div>


            </form>

        </div>

    </div>
    @include('layouts.inc.footer')

    <!-- Scripts -->
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="{{ asset('frontend/js/mainMenu.js') }}" defer></script>
    <script src="{{ asset('frontend/js/footer.js') }}" defer></script>
    <script type="text/javascript">
        //script du pop up de confirmation de l'envoi du mail issu du formulaire de contact
        function popUpConfirmationEnvoi() {
            alert("Votre demande a bien été envoyée");
        }
    </script>

</body>

</html>
