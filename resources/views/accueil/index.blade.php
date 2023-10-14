@extends('welcome')

@section('header-bienvenue')
    <h1>Bienvenue</h1>
    <p>{{ $accueil->description }}</p>
    <div class="container-img"><img class="object-fit-cover" src="{{ asset($accueil->file_path) }}"
            alt="bannier d'introduction au site" /></div>

@endsection

@section('popUpPanier')
    <div id="popUp">
        <h2>Produit ajouté avec succes</h2>
        <span class="iconify" data-icon="clarity:success-standard-line" style="font-size: 80px; color:green;"></span>
        <div class="row-btn">
            <a class="btn-primary" id="continuer">Continuer mes achats</a>
            <a class="btn-primary" href="/panier">Voir mon panier</a>
        </div>
    </div>
@endsection

@section('produits')


    <h2>Nos produits phares</h2>
    <article class="produits">
        @foreach ($produitsBDD as $produit)


            <figure class="article-card">
                <a href="{{ url('/pageProduit' . '?ref=' . $produit->reference) }}">
                    <div class="article-card-container-inside">

                        <img src="{{ asset($produit->file_path) }}" alt="Image manquante">
                        <div>
                            <div>
                                <p class="article-nom-art">{{ $produit->nom }}</p>
                                <p class="article-ref-art">Réf : {{ $produit->reference }}</p>

                                <div class="article-prod-button-container ">
                                    <a class="article-prod-art"
                                        href="{{ url('/vendeur?id=' . $produit->info_commerciale->id) }}">{{ $produit->info_commerciale->nom_entreprise }}</a>
                                    <iframe name="votar" style="display:none;"></iframe>
                                    <form action="" method="post" target="votar">
                                        @csrf
                                        <input type="hidden" name="ref" value={{ $produit->reference }} id="ref">
                                        <input type="hidden" name="submit" value="addPanier" id="submit">
                                        <button type="submit" class="article-secondary-button btn-secondary2 ajout"
                                            onclick="return clickButton();"> <span class="iconify"
                                                data-icon="fe:add-cart"></span>
                                            Ajouter au panier</button>
                                    </form>

                                </div>

                            </div>
                            <h1 class="article-card-price"><span
                                    class="price-integer">{{ $produit->prixDisplayEuros }}</span><span
                                    class="price-float">{{ $produit->prixDisplayCentimes }}</span><span
                                    class="price-money">€</span></h1>
                        </div>
                    </div>
                </a>

            </figure>

        @endforeach
    </article>
@endsection

@section('services')
    <article class="services">
        <div>
            <span class="iconify" data-icon="carbon:delivery"></span>
            <h4>Commande<br>facile et rapide</h4>
        </div>
        <div><span class="iconify" data-icon="icon-park-outline:delivery"></span>
            <h4>Retrait gratuit<br>chez nos vendeurs</h4>
        </div>
        <div>
            <span class="iconify" data-icon="ri:coins-line"></span>
            <h4>Nos produits<br> au même prix que<br> chez le vendeur</h4>
        </div>
        <div><span class="iconify" data-icon="ps:padlock"></span>
            <h4>Paiement <br>sécurisé en ligne</h4>
        </div>
    </article>
@endsection
