@component('mail::message')

Vous avez une nouvelle commande de la part de {!! $data['nom'] !!}

Commande n° {!! $data['numCommande'] !!} pour un total de {!! $data['total'] !!} €

Vous trouverez le bon de commande en pièce jointe. 

Merci,<br>
L'équipe Bon Rencontre
@endcomponent