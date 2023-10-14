<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Retrait Bon Rencontre</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/pages/qrcode.css') }}">
</head>

<body>
    <h3 class="center">Retrait</h3>
    <p>Client : {{ $nom }} </p>
    <p>Commande n° : {{ $commandeId }} </p>
    @foreach ($data as $key => $vendeur)
        <h3 class="center">{{ $key }}</h3>
        <table>
            <thead>
                <tr>
                    <th>Réference</th>
                    <th>Produit</th>
                    <th>quantité</th>
                    <th>prix</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendeur as $produit)
                    <tr>
                        <td>{{ $produit['reference'] }}</td>
                        <td>{{ $produit['nom'] }}</td>
                        <td>{{ $produit['quantite'] }}</td>
                        <td>{{ $produit['prix'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form id="validate-order-form-{{ $vendeur[0]['sous_commande_id'] }}"
            action="{{ route('qrcode.close', $vendeur[0]['sous_commande_id']) }}" method="POST"
            style="display: none">
            @csrf
        </form>
        @if ($vendeur[0]['isDone'] == false)
            <a href="#" class="btn-secondary validate"
                data-form-id="validate-order-form-{{ $vendeur[0]['sous_commande_id'] }}"
                data-confirm="Etes-vous sûr de vouloir valider cette commande?">VALIDER LA COMMANDE</a>
        @else
            <div class="alert">
                Commande validée
            </div>
        @endif
    @endforeach

    <script>
        const validateLinks = document.querySelectorAll('.validate');

        for (let i = 0; i < validateLinks.length; i++) {
            validateLinks[i].addEventListener('click', function(event) {
                event.preventDefault();

                let choice = confirm(this.getAttribute('data-confirm'));

                if (choice) {
                    let dataForm = document.getElementById(validateLinks[i].getAttribute('data-form-id'));

                    window.location.href = this.getAttribute('href');
                    document.getElementById(validateLinks[i].getAttribute('data-form-id'))
                        .submit();
                }
            });
        }
    </script>
</body>

</html>
