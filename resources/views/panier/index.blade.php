@extends('layouts.panier')

@section('card-produit-panier')
    <div class="panier">
        @if ($produits->count() != 0)

            @foreach ($produits as $item)

                <div class="card-produit-panier">

                    <div class="info-produit">
                        <img src={{ $item['img']->file_path }} alt="" height="100" width="120" />
                        <div>
                            <h5 class="article-nom-art">{{ $item['nomProduit'] }}</h5>
                            <p class="article-ref-art">Réf : {{ $ref = $item['ref'] }}</p>

                        </div>
                    </div>
                    <div class="option">
                        <h3 class="article-card-price">
                            <span class="price-integer">{{ $item['prix'] * $item['quantité'] }}</span><span
                                class="price-money">€</span>
                        </h3>
                        <form action="{{ url('/panier') }}" method="post" class="number-input">
                            @csrf
                            <button
                                onclick="this.parentNode.querySelector('input[type=number]').stepDown(); this.form.submit()"></button>
                            <input class="quantity" min="0" max="9" name="quantite" value={{ $item['quantité'] }}
                                type="number">
                            <input type="hidden" name="refQuant" value={{ $ref }}>
                            <button
                                onclick="this.parentNode.querySelector('input[type=number]').stepUp() ;this.form.submit()"
                                class="plus"></button>
                        </form>
                        <a href="{{ url('/panier' . '?submit=deletePanier' . '&ref=' . $ref) }}"
                            class="btn-secondary2 caption">supprimer </a>

                    </div>


                </div>

            @endforeach



        @else
            <h3>Votre panier est vide !!! </h3>
        @endif


    </div>
@endsection

@section('recap-panier')
    <div class="recap-panier">
        <h2>Récapitulatif</h2>
        <div class="recap">
            @foreach ($produits as $item)

                <p>{{ $item['nomProduit'] }}&emsp; x{{ $item['quantité'] }}&emsp;&emsp;<span
                        class="price-integer">{{ $item['prix'] * $item['quantité'] }}</span><span
                        class="price-money">€</span></p>

            @endforeach
        </div>
        <div>
            <h4>Total : </h4>
            <h3 class="article-card-price">
                <span class="price-integer">{{ $total }}</span>
                <span class="price-money">€</span>
            </h3>
        </div>
        <div>
            @if (Auth::check())
                <form action="/checkout" method="post">
                    @csrf
                    <input type="hidden" id="total" name="total" value="{{ $total }}">
                    <button class="valider btn-secondary2 caption" type="submit" @if ($produits->count() == 0)
                        disabled
            @endif>Valider mon
            panier</button>
            </form>
        @else
            <div class="alert">Vous devez être connecté pour finaliser la commande</div>
            <a href="{{ route('login') }}" class="btn-secondary2 caption">Connexion</a>
            @endif

        </div>
    </div>
@endsection
