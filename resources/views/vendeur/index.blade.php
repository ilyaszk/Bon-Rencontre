@extends('layouts.vendeur')
@section('article-card')
    <figure class="article-card">
        <a href="#">
            <div class="article-card-container-inside">

                <img src="{{ asset('frontend/img/placeholders/no_image.jpg') }}" alt="image">
                <div>
                    <div>
                        <p class="article-nom-art">nom</p>
                        <p class="article-ref-art">Réf : 10</p>
                        <div class="article-prod-button-container">
                            <a class="article-prod-art" href="#gopanier">Nom du producteur</a>
                            <a href="#" class="article-secondary-button">
                                <span class="iconify" data-icon="fe:add-cart"></span>
                                <h3>Ajouter au panier<h3>
                            </a>
                        </div>
                    </div>
                    <h1 class="article-card-price"><span class="price-integer">10</span><span
                            class="price-float">20</span><span class="price-money">€</span></h1>
                </div>
            </div>
        </a>

    </figure>
@endsection
