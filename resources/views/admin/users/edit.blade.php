@extends('layouts.edituser')

@section('edit')
    <div class="site-container center-h">
        <div class="card top">
            <h4 class="card-title">Modifier</h4>
            <hr class="hr-fade">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                    @csrf
                    @method('PATCH')

                    <div class="form-row">
                        <label for="nom" class="form-label">Nom : </label>
                        <div class="form-input">
                            <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom"
                                value="{{ $user->nom }}" required autocomplete="nom" autofocus>

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
                                name="prenom" value="{{ $user->prenom }}" required autocomplete="prenom">

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
                                name="email" value="{{ $user->email }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="radio-group">
                        <input id="client" type="radio" name="result" value="0" @if ($user->role_as == 0)
                        checked
                        @endif>
                        <label for="client">Client</label>
                    </div>

                    <div class="radio-group">
                        <input id="admin" type="radio" name="result" value="1" @if ($user->role_as == 1)
                        checked
                        @endif>
                        <label for="admin">Administrateur</label>
                    </div>

                    <div class="radio-group">
                        <input id="vendeur" type="radio" name="result" value="2" @if ($user->role_as == 2)
                        checked
                        @endif>
                        <label for="vendeur">Vendeur</label>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn-primary large"><span class="iconify"
                                data-icon="icons8:add-user"></span>
                            MODIFIER
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Scripts -->
    <script src="{{ asset('admin/js/sidebar.js') }}" defer></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
@endsection
