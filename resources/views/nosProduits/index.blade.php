@extends('layouts.nosProduits')


@section('filtre-categorie')
    <p>Filtres:</p><button class="filtres-button">Filtres</button>
    <select name="categorie" id="categorie-select" onchange="this.form.submit()">
        <!--boucle php a faire -->
        <option value="">Catégories</option>
        <option value="all">Voir tout</option>
        @foreach ($categories as $item)
            <option value="{{ $item->id }}">{{ $item->nom }}</option>
        @endforeach
    </select>
@endsection
@section('filtre-producteur')
    <select name="productors" id="productors-select" onchange="this.form.submit()">
        <!--boucle php a faire -->
        <option value="">Producteur</option>
        <option value="all">Voir tout</option>
        @foreach ($producteurs as $item)
            <option value="{{ $item->id }}">{{ $item->nom_entreprise }}</option>
        @endforeach


    </select>
@endsection
@section('trie')

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
@section('article-card')
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
                                    href="{{ url('/vendeur?id=' . $produit->vendeur->id) }}">{{ $produit->vendeur->nom_entreprise }}</a>
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


@endsection
