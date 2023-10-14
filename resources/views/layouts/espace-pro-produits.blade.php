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
    <link href="{{ asset('frontend/css/comp/pagination.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/pages/espace-pro-produits.css') }}" rel="stylesheet">




    <title>Bon Rencontre</title>

</head>

<body>
    @include('layouts.inc.frontNavBar')
    <div class="page">
        <h1 class="titre">Vos Produits</h1>
        <div class="button-container"><a href="{{ url('/ajouterProduit') }}"
                class="btn-primary btn-nouveau-produit"><span>Nouveau produit</span></a>
        </div>

        <div class="header">
            <div><span>Reference</span></div>
            <div><span>Image</span></div>
            <div><span>Nom</span></div>
            <div><span>Stock</span></div>
            <div><span>Action</span></div>
        </div>
        <hr>
        <!-- Infos flexibles :  -->
        <div class="grille">

            @foreach ($produits as $produit)
                <div><span>{{ $produit->reference }}</span></div>
                <div><img class="product-img" src="{{ asset($produit->file_path) }}" alt="{{ $produit->alt }}">
                </div>

                <div><span>{{ $produit->nom }}</span></div>
                <div><span
                        class="{{ $produit->en_stock ? 'en_stock' : 'pas_en_stock' }}">{{ $produit->en_stock ? 'Oui' : 'Non' }}</span>
                </div>
                <form class="action" action="" method="post">
                    @csrf
                    <input name="action" type="submit" class="btn-secondary" value="Modifier">
                    <input name="action" type="submit" class="btn-secondary" value="Supprimer">
                    <input name="idProduit" id="idProduit" name="idProduit" type="hidden" value="{{ $produit->id }}">

                </form>

            @endforeach

        </div>
        <div class="pagination-container">{{ $produits->links('pagination::bootstrap-4') }}</div>




    </div>

    @include('layouts.inc.footer')

    <!-- Scripts -->
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="{{ asset('frontend/js/mainMenu.js') }}" defer></script>
    <script src="{{ asset('frontend/js/footer.js') }}" defer></script>

</body>

</html>
