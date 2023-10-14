@component('mail::message')

{!! $data['nom'] !!}

Commande n° {!! $data['numCommande'] !!} pour un total de {!! $data['total'] !!} €

Merci pour votre achat! Vous trouverez votre bon de commande en pièce jointe.

Nous vous contacterons quand votre commande sera disponible.
N'oubliez pas de venir avec votre bon de commande! 

Merci,<br>
L'équipe Bon Rencontre
@endcomponent