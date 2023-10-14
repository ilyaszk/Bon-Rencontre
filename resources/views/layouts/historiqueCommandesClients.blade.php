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
    <link href="{{ asset('frontend/css/pages/historiqueCommandesClients.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



</head>

<body>
    @include('layouts.inc.frontNavBar')
    <div class="page">
        <h1>Mes commandes</h1>
        <div class="commandes-container">
            @if ($commandes->count() == 0)
                <h2>Vous n'avez pas de commandes</h2>
            @else
                <table class="commandes">
                    <tr>

                        <th>Commande n°</th>
                        <th>Date de la commande</th>
                        <th>Montant total</th>
                        <th>Status</th>
                        <th></th>

                    </tr>

                    <!-- Lien -->
                    <form action="{{ route('commande-client') }}" id="update-form" method="post">
                        @csrf
                        @foreach ($commandes as $commande)
                            <tr id="cliquable" }}>
                                <td>{{ $commande->id }}</td>
                                <td>{{ $commande->created_at }}</td>
                                <td>{{ $commande->prix_total }}€</td>
                                <td>En cours</td>
                            </tr>
                            <input type="hidden" name="idCommande" id="idCommande" value="{{ $commande->id }}">
                        @endforeach
                    </form>

                    <div class="mobile-container">
                        <div class="commandes-mobile">
                            <div class="commande-mobile">
                                <div class="info">
                                    <div>Commande n°</div>
                                    <div>XXXX</div>
                                </div>
                                <div class="info">
                                    <div>Date de la commande</div>
                                    <div>11/11/2021</div>
                                </div>
                                <div class="info">
                                    <div>Montant Total</div>
                                    <div>32,23€</div>
                                </div>
                                <div class="info">
                                    <div>Status</div>
                                    <div>En cours</div>
                                </div>

                            </div>
                        </div>
                    </div>



                </table>
            @endif

        </div>

    </div>

    @include('layouts.inc.footer')
    <!-- Scripts -->
    <script>
        document.querySelector('#cliquable').addEventListener('click', (e) => {
            e.preventDefault();
            var form = document.getElementById("update-form");
            form.submit();
        });
    </script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="{{ asset('frontend/js/mainMenu.js') }}"></script>
    <script src="{{ asset('frontend/js/footer.js') }}" defer></script>


</body>

</html>
