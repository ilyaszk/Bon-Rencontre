@php
$no_image = ['file_path' => 'frontend/img/placeholders/no_image.jpg', 'alt' => 'pas d\image'];
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    {{-- Styles --}}
    <link href="{{ asset('frontend/css/comp/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/pages/pageProduit.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/article.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/pages/footer.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/comp/popUp.css') }}">



    <title>Bon Rencontre - VOTREPAGE</title>

</head>

<body>
    @include('layouts.inc.frontNavBar')

    <div class="site-container center">

        <div class="conteneur">
            <div class="images">


                <section class="photos">
                    <img id="expandedImg" style="width:100%"
                        src="{{ asset($contains_images ? $main_image->file_path : $no_image['file_path']) }}">

                </section>

                <section class="autresPhotos">
                    @if ($contains_images)
                        @foreach ($small_images as $item)
                            <div class="column">
                                <img src="{{ asset($item->file_path) }}" alt="{{ $item->alt }}"
                                    onclick="change(this);">
                            </div>
                        @endforeach
                    @else
                        <div class="column">
                            <img src="{{ asset($no_image['file_path']) }}" alt="{{ $no_image['alt'] }}"
                                onclick="change(this);">
                        </div>
                    @endif



                </section>
            </div>
            <div id="popUp">
                <h2>Produit ajouté avec succes</h2>
                <span class="iconify" data-icon="clarity:success-standard-line"
                    style="font-size: 80px; color:green;"></span>
                <div class="row-btn">
                    <a class="btn-primary" id="continuer">Continuer mes achats</a>
                    <a class="btn-primary" href="/panier">Voir mon panier</a>
                </div>
            </div>

            <article class="description">
                <h1>{{ $produit->nom }}</h1>
                <h5>Ref: {{ $produit->reference }}</h5>
                <a class="producteur"
                    href="{{ url('/vendeur?id=' . $produit->info_commerciale->id) }}">{{ $produit->info_commerciale->nom_entreprise }}</a>
                <p> {{ $produit->desc_produit }}</p>
                <h4 class={{ $produit->en_stock == true ? 'stock' : 'no_stock' }}>
                    {{ $produit->en_stock == true ? 'En stock' : 'Rupture de stock' }}</h4>
                <section class="details">
                    <div>
                        <div class="prix">
                            <h1><span class="price-integer">{{ $euros }}</span><span
                                    class="price-float">{{ $centimes }}</span><span
                                    class="price-money">€</span></h1>

                        </div>
                        <iframe name="votar" style="display:none;"></iframe>
                        <form action="" method="post" target="votar" class="ajout">
                            @csrf
                            <input type="hidden" name="ref" value={{ $produit->reference }} id="ref">
                            <input type="hidden" name="submit" value="addPanier" id="submit">
                            <button type="submit" class="article-secondary-button btn-primary"
                                onclick="return clickButton();"> <span class="iconify"
                                    data-icon="fe:add-cart"></span>
                                Ajouter au panier</button>
                        </form>

                    </div>
                </section>
            </article>

        </div>

    </div>
    @include('layouts.inc.footer')

    <!-- Scripts -->
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="{{ asset('frontend/js/mainMenu.js') }}" defer></script>
    <script src="{{ asset('frontend/js/popUp.js') }}" defer></script>
    <script src="{{ asset('frontend/js/pageProduit.js') }}" defer></script>
    <script src="{{ asset('frontend/js/footer.js') }}" defer></script>

</body>

</html>
