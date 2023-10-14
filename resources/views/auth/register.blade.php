@extends('layouts.app')

@section('content')
    <div class="site-container center-h">
        <div class="card">
            <h4 class="card-title">Inscription</h4>
            <hr class="hr-fade">
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-row">
                        <label for="nom" class="form-label">Nom : </label>
                        <div class="form-input">
                            <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom"
                                value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                            @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <label for="prenom" class="form-label">Prénom : </label>
                        <div class="form-input">
                            <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror"
                                name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom">

                            @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <label for="email" class="form-label">E-mail : </label>
                        <div class="form-input">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <label for="password" class="form-label">Mot de passe :</label>
                        <div class="form-input">
                            <input id="mdp" type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <label for="password-confirm" class="form-label">Confirmer :</label>
                        <div class="form-input">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn-primary large"><span class="iconify"
                                data-icon="icons8:add-user"></span>
                            S'INSCRIRE
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
