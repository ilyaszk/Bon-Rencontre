@extends('layouts.app')

@section('content')
    <div class="site-container center-h">
        <div class="card">
            <h4 class="card-title">Connexion</h4>
            <hr class="hr-fade">
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-row">
                        <label for="email" class="form-label">Adresse mail :</label>
                        <div class="form-input">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                Rester connecté
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <div class="forgot">
                                <a href="{{ route('password.request') }}" class="text-link">Mot de passe oublié
                                    ?</a>
                            </div>
                        @endif
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn-primary large"><span class="iconify"
                                data-icon="ic:baseline-login"></span>
                            SE CONNECTER
                        </button>
                    </div>

            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
