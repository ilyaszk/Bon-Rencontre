@extends('layouts.politique-confidentialite')

@section('titre-description')
    <h1>Politique de confidentialité</h1>
    <p class="large">Notre Politique de confidentialité vous permettra de comprendre quelles données à caractère
        personnel nous collectons et ce que nous en faisons.
        Nous vous indiquerons également les droits dont vous disposez et la manière dont vous pouvez les exercer.</p>
@endsection

@section('qui-sommes-nous')
    <h3>Qui sommes-nous ?</h3>
    <p class="medium">L’adresse de notre site web est : <a class="textLink"
            href="http://127.0.0.1:8000">http://127.0.0.1:8000</a></p>
    <p class="small">Pour plus d'informations, consulter la page <a class="textLink"
            href="http://127.0.0.1:8000/qui-sommes-nous">Qui
            sommes-nous ?</a></p>
    <h4>Responsables de la publication</h4>
    <p class="normal">Jean Dupond - jean.dupond@contact.com <br>
        Claude Dupont - claude.dupont@contact.com</p>
    <h4>Hébergeur</h4>
    <p class="normal">nom de l'hébergeur - adresse de l'hébergeur - <a class="textLink" href="">lien vers le
            site web de
            l'hébergeur</a></p>
@endsection

@section('donnees-collectees')
    <h3>Données personnelles collectées</h3>

    <h4>Formulaires</h4>
    <p class="normal">Les données personnelles collectées lors de la soumission d’une demande via nos formulaires
        sont les suivantes : <br>
    <ul class="pc-ul">
        <li>Nom</li>
        <li>Prénom</li>
        <li>numéro de téléphone</li>
        <li>adresse mail</li>
    </ul> <br>
    Nous collectons ses données dans le seul et unique but de pouvoir vous contacter, suite à une demande de votre part.
    </p>

    <h4>Compte Utilisateur</h4>
    <p class="normal">Pour les utilisateurs et utilisatrices qui s’enregistrent sur notre site, nous stockons les
        données personnelles indiquées dans leur profil. Tous les utilisateur/ices peuvent voir, modifier ou supprimer leurs
        informations personnelles à tout moment (à l’exception de leur nom d’utilisateur/ice). <br>
        Les gestionnaires du site peuvent aussi voir et modifier ces informations.</p>
    <h4>Utilisation de vos données personnelles</h4>
    <p class="normal">Les informations recueillies sont enregistrées dans un fichier informatisé. Les données
        collectées seront communiquées
        aux personnes participant au projet BonRencontre tels que les fournisseurs. Nous ne communiquons jamais vos données
        personnelles à des tiers.<br>
        Ces données seront conservées pendant 1 an.</p>

    <h4>Les droits que vous possédez sur vos données</h4>
    <p class="normal">Vous pouvez accéder aux données vous concernant, les rectifier, demander leur effacement ou
        exercer votre droit à la limitation du traitement de vos données.<br>
        Pour exercer ces droits ou pour toute question sur le traitement de vos données dans ce dispositif, vous pouvez nous
        contacter via <a href="http://127.0.0.1:8000/contact" class="textLink">le formulaire de contact</a>. <br>
        Cela ne prend pas en compte les données stockées à des fins administratives, légales ou pour des raisons de
        sécurité.</p>

    <h4>Cookies</h4>
    <h5>Compte utilisateur</h5>
    <p class="large">Un cookie est un petit fichier informatique qui permet d’analyser le comportement des usagers
        lors de la visite d’un site internet ou de l’utilisation d’un logiciel ou d’une application mobile.</p>
    <p class="normal">Si vous possédez un compte sur notre site et que vous vous connectez, un cookie temporaire
        sera créé afin de déterminer si votre navigateur accepte les cookies. Il ne contient pas de données personnelles et
        sera supprimé automatiquement à la fermeture de votre navigateur. <br>
        Lorsque vous vous connecterez, nous mettrons en place un certain nombre de cookies pour enregistrer vos informations
        de connexion. La durée de vie d’un cookie de connexion est de deux jours.
        Si vous cochez « <span class="p-normal-bold">rester connecter</span> », votre cookie de connexion sera conservé
        pendant deux semaines. Si vous vous déconnectez de votre compte, le cookie de connexion sera effacé.</p>
@endsection

@section('engagements')
    <h3>Engagements</h3>
    <p class="normal">BonRencontre s’engage à ce que la collecte et le traitement éventuels des données soient
        conformes au Règlement Général sur la Protection des Données (RGPD) et à la loi Informatique et Libertés. <br>
        Ainsi, nous nous engageons à n’utiliser les données personnelles reçues qu’en conformité avec les finalités propres
        à leur transmission. <br>
        BonRencontre s’engage également à mettre en place toutes les mesures organisationnelles et techniques permettant de
        respecter la législation, ainsi qu’à assurer un niveau de sécurité adapté aux finalités du traitement et à la nature
        de ces données. <br></p>
@endsection

@section('comment-exercer-vos-droits')
    <h3>Comment exercer vos droits ?</h3>
    <p class="normal">Lorsque vous acceptez de nous transmettre vos données, vous bénéficiez d’un droit d’accès, de
        rectification, d’opposition et de suppression au traitement desdites données.
        Vous pouvez exercer vos droits à la limitation du traitement, à l’effacement de vos données et leur portabilité
        depuis le 25 mai 2018. <br>
        BonRencontre s’engage à faire le nécessaire dans les meilleurs délais après réception de votre demande et vous
        transmettre le cas échéant une notification de son action. <br>
        En cas d’inscription à notre Newsletter, vous avez la possibilité de vous désabonner à tous moment grâce au lien
        accessible au sein de chacune de nos Newsletters.</p>
@endsection

@section('modification')
    <h3>Modification de cette politique</h3>
    <p class="normal">BonRencontre se réserve le droit de modifier et mettre à jour à tout moment sa politique de
        confidentialité conformément au droit en vigueur.</p>
@endsection
