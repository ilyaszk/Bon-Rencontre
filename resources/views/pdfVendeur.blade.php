<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
    .titre {
        text-align: center;
    }

    .center {
        text-align: center;
    }

    .left {
        text-align: left;
    }

    .right {
        text-align: right;
    }

    .qr {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .table {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    table {
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #999;
        padding: 1rem 2rem;
    }

</style>

<body>
    <h3 class="titre">Bon de commande</h3>
    <h4 class="left">Commande n° : {{ $numCommande }}</h4>
    <h4 class="left">Date : {{ $date }}</h4>
    <p class="right">Nom du client : {{ $nom }}</p>

    <div class="table">
        <table class="left">
            <thead>
                <tr>
                    <th>Réference</th>
                    <th>Nom du produit</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commandes as $commande)
                    <tr>
                        <td>{{ $commande['reference'] }}</td>
                        <td>{{ $commande['nomProduit'] }}</td>
                        <td>{{ $commande['quantite'] }}</td>
                        <td>{{ $commande['prix'] }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td>Total : </td>
                    <td>{{ $total }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <p class="left">N'oubliez pas d'aller sur votre espace professionnel quand vous aurez livré la commande au
        point de retrait pour avertir le client.</p>
    <p>Merci,<br>
        L'équipe Bon Rencontre.
    </p>

</body>

</html>
