@component('mail::message')

    <h1>Des produits sont prêts !</h1>
    @component('mail::table')
        | Reference | Nom du produit | Quantite | Prix
        | :------------- |:-------------:| :--------:|:----------:
        @foreach ($commande as $item)
            | {{ $item['ref'] }} | {{ $item['nom'] }} | {{ $item['quantite'] }} | {{ $item['prix_u'] * $item['quantite'] }}
        @endforeach
        Merci,
        L'équipe Bon Rencontre
    @endcomponent
@endcomponent
