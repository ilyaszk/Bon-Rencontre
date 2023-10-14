@extends('layouts.parametres')

@section('changeId')
<h3>Changer d'identifiant</h3>


<form class="param-component" method="POST" action="{{ url('identifiant') }}">
    @csrf

    <p class="idp">Identifiant </p>
    <input id="new_identifiant" class="input-email-id" type="text" name="new_identifiant" placeholder="UserName">
    <button class="btn-primary" type="submit">
        Enregistrer
    </button>
</form>


@endsection

@section('changeEmail')
<h3>Modifier E-Mail</h3>

<form class="param-component" method="POST" action="{{ url('email') }}">
    @csrf
    <p class="emailp">E-Mail </p>
    <input id="email" class="input-email-id" type="email" name="email" placeholder="abcde@xyz.com">
    <button class="btn-primary" type="submit">
        Enregistrer
    </button>
</form>
@endsection

@section('changePassword')
<h3>Modifier le mot de passe</h3>
<div class="param-component-password">

    <form method="POST" action="{{ url('password') }}">
        @csrf
        <div class="password-component-form">
            <div class="mdp">
                <label for="password" class="oldpasswrd">Ancien mot de passe : </label>
                <input id="password" type="password" class="input" name="current_password" autocomplete="current-password">
            </div>

            <div class="mdp">
                <label for="password">Nouveau mot de passe : </label>
                <input id="new_password" type="password" class="input" name="new_password" autocomplete="current-password">
            </div>

            <div class="mdp">
                <label for="password" class="confirmation">Confirmer : </label>
                <input id="new_confirm_password" type="password" class="input" name="new_confirm_password" autocomplete="current-password">
            </div>
        </div>
        <div class="password-button">
            <button type="submit" class="btn-primary">
                Enregistrer
            </button>
        </div>

        @foreach ($errors->all() as $error)

        <p class="text-danger">{{ $error }}</p>

        @endforeach
    </form>

</div>
@endsection

@section('newsletter-switch')
<h3 class="lasth">Newsletter</h3>
<div class="last-section">
    <div class="switch-component">
        <form class="switchform" method="POST" action="{{ url('newsletter') }}">
            @csrf
            <label class="switch">
                <input type="checkbox" name="news-or-nothing" value="yes" <?php if (empty($visiteur[0])) {
                                                                                echo '';
                                                                            } else {
                                                                                echo 'checked="checked"';
                                                                            } ?>>
                <span class="slider round"></span>
            </label>
            <p class="newsletter-text">Abonnement à la newsletter</p>
            <button type="submit" class="btn-primary">
                Valider
            </button>
        </form>
    </div>
</div>


@endsection