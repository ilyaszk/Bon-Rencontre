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
    <link href="{{ asset('frontend/css/pages/historiqueCommande.css') }}" rel="stylesheet">




    <title>Bon Rencontre</title>

</head>

<body>
    @include('layouts.inc.frontNavBar')
    <div class="navigation-state-container">
        <div class="navigation-state">
            <ul>
                <li {{ $current_page == 1 ? 'class=active' : '' }}><a
                        href="{{ url('/historiqueCommandes?page=en-cours') }}">En cours</a></li>
                <li {{ $current_page == 2 ? 'class=active' : '' }}><a
                        href="{{ url('/historiqueCommandes?page=pret') }}">Prête à collecter</a></li>
                <li {{ $current_page == 3 ? 'class=active' : '' }}><a
                        href="{{ url('/historiqueCommandes?page=termine') }}">Terminée</a></li>
            </ul>
        </div>
        <div class="commandes">
            @foreach ($commandes as $commande)
                <div class="commande">
                    <table>
                        <tr>
                            <th><label for="etat-checkbox" class="">Prête ?</label></th>
                            <th>Référence</th>
                            <th>Nom du client</th>
                            <th>Date de la commande</th>
                            <th>Total</th>
                        </tr>
                        <tr>
                            <td class="etat">
                                @if ($current_page == 3)
                                    <p>Terminée</p>
                                @else
                                    
                                    <form action="/historiqueCommandes" method="post">
                                        @csrf
                                        <input type="checkbox" id="etat-checkbox" name="etat-checkbox"
                                            {{ $current_page == 2 ? 'checked' : '' }} onchange="this.form.submit()">
                                        <input type="hidden" name="commandeId" id="commandeId"
                                            value="{{ $commande->id }}">
                                        <input type="hidden" name="pageNum" id="pageNum" value="{{ $current_page }}">
                                    </form>

                                @endif

                                <!-- Si page = 2 ( commande préparée ) alors mettre etat en ok-->

                            </td>

                            <td>{{ $commande->id }}</td>
                            <td>{{ $commande->commande->user->nom }} - {{ $commande->commande->user->prenom }}
                            </td>
                            <td>{{ $commande->created_at }}</td>
                            <td>{{ $commande->prix_total }}€</td>


                        </tr>
                        <tr>
                        <th></th>
                        <th>Référence</th>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        </tr>
                        
                        @foreach (DB::table('ligne_commande')->where('sous_commande_id','=',$commande->id)->get(); as $ligneCommande)
                        @php
                           $produit =  App\Models\Produits::find($ligneCommande->produit_id);     
                        @endphp
                        <p></p>
                        <tr>
                            <td></td>
                            <td>{{$ligneCommande->id}}</td>
                            <td><a href="{{url('/pageProduit?ref='.$produit->reference)}}">{{$produit->nom}}</a></td>
                            <td>{{$ligneCommande->quantite}}</td>
                            <td>{{$ligneCommande->quantite * $produit->prix}}€</td>  
                        </tr>
                        
                        @endforeach
                        
                    </table>
                </div>
            @endforeach


        </div>
    </div>





    @include('layouts.inc.footer')

    <!-- Scripts -->
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="{{ asset('frontend/js/mainMenu.js') }}" defer></script>
    <script src="{{ asset('frontend/js/footer.js') }}" defer></script>

</body>

</html>
