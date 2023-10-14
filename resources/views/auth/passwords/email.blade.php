@extends('layouts.app')

@section('content')
    <div class="site-container center-h">
        <div class="card">
            <h4 class="card-title">Réinitialiser le mot de passe</h4>
            <hr class="hr-fade">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-body">
                <form method="POST" action="{{ route('password.email') }}">
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

                    <div class="card-footer">
                        <button type="submit" class="btn-primary large"><span class="iconify"
                                data-icon="ic:baseline-login"></span>
                            REINITIALISER
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection
