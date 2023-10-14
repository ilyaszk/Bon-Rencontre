@extends('layouts.seller')

@section('menu')
    <div class="site-container col center-v">
        <h1 class="qsn-h1">Espace professionnel</h1>
        <div class="sellerCards-container">
            <a href="{{ url('/edit-espace-pro-ma-page') }}" class="seller-link">
                <div class="seller-card">
                    <span class="iconify" data-icon="fluent:document-page-bottom-left-24-regular"></span>
                    <hr class="    hr-fade">
                    <h3 class="seller-title">Gérer ma page</h3>
                </div>
            </a>

            <a href="{{ url('/parametres') }}" class="seller-link">
                <div class="seller-card">
                    <span class="iconify" data-icon="icomoon-free:profile"></span>
                    <hr class="    hr-fade">
                    <h3 class="seller-title">Mon profil</h3>
                </div>
            </a>

            <a href="{{ url('/espace-pro-produit') }}" class="seller-link">
                <div class="seller-card">
                    <span class="iconify" data-icon="gridicons:product-external"></span>
                    <hr class="      hr-fade">
                    <h3 class="seller-title">Produits</h3>
                </div>
            </a>

            <a href="{{ url('/historiqueCommandes') }}" class="seller-link">
                <div class="seller-card">
                    <span class="iconify" data-icon="ic:baseline-history-edu"></span>
                    <hr class="        hr-fade">
                    <h3 class="seller-title">Commandes</h3>
                </div>
            </a>
        </div>
    </div>
@endsection

@section('form')
    <div class="site-container center-h">
        <div class="card">
            <h4 class="card-title">Informations complémentaires</h4>
            <hr class="hr-fade">
            <div class="card-body">
                <form method="POST" action="addinfos">
                    @csrf

                    {{-- Nom de l'entreprise --}}
                    <div class="form-row">
                        <label for="nom_entreprise" class="form-label">Nom de l'entreprise : </label>
                        <div class="form-input">
                            <input id="nom_entreprise" type="text"
                                class="form-control @error('nom_entreprise') is-invalid @enderror" name="nom_entreprise"
                                value="{{ old('nom_entreprise') }}" required autocomplete="nom_entreprise" autofocus>

                            @error('nom_entreprise')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Numéro de Siret --}}
                    <div class="form-row">
                        <label for="siret" class="form-label">Siret : </label>
                        <div class="form-input">
                            <input id="siret" type="number" class="form-control @error('siret') is-invalid @enderror"
                                name="siret" value="{{ old('siret') }}" required autocomplete="siret" autofocus>

                            @error('siret')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Adresse --}}
                    <div class="form-row">
                        <label for="searchTextField" class="form-label">Adresse : </label>
                        <div class="form-input">
                            <input id="searchTextField" class="form-control" size="50" autocomplete="off" />
                            <input type="hidden" name="latitude" id="latitude" value="0" />
                            <input type="hidden" name="longitude" id="longitude" value="0" />
                            <input type="hidden" name="numeroRue" id="numeroRue" value="0" />
                            <input type="hidden" name="rue" id="rue" value="0" />
                            <input type="hidden" name="ville" id="ville" value="0" />
                            <input type="hidden" name="region" id="region" value="0" />

                            @error('adresse')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Email professionnel --}}
                    <div class="form-row">
                        <label for="email_commercial" class="form-label">Email professionnel : </label>
                        <div class="form-input">
                            <input id="email_commercial" type="email"
                                class="form-control @error('email_commercial') is-invalid @enderror" name="email_commercial"
                                value="{{ old('email_commercial') }}" required autocomplete="email_commercial" autofocus>

                            @error('email_commercial')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Téléphone --}}
                    <div class="form-row">
                        <label for="telephone" class="form-label">Téléphone : </label>
                        <div class="form-input">
                            <input id="telephone" type="tel" class="form-control @error('telephone') is-invalid @enderror"
                                name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone"
                                autofocus>

                            @error('telephone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Type de commerce --}}
                    <div class="form-row">
                        <label for="type_commerce" class="form-label">Type de commerce : </label>
                        <div class="form-input">
                            <select id="type_commerce" class="select-control @error('type_commerce') is-invalid @enderror"
                                name="type_commerce" value="{{ old('type_commerce') }}" autofocus>

                                @foreach ($type as $value)
                                    <option value="{{ $value->type_commerce }}"
                                        {{ $value->id == $selectedId ? 'selected' : '' }}>
                                        {{ $value->type_commerce }}
                                    </option>
                                @endforeach

                                @error('type_commerce')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn-primary large"><span class="iconify"
                                data-icon="icons8:add-user"></span>
                            ENREGISTRER
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGhBDK3esoJbmd0pDiN2vAT4L2Tt84ZhM&sensor=false&libraries=places">
    </script>

    <script>
        var input = document.getElementById('searchTextField');
        var options = {
            componentRestrictions: {
                geocode: []
            }
        };

        var autocomplete = new google.maps.places.Autocomplete(input, options);

        google.maps.event.addListener(autocomplete, 'place_changed', function() {

            var place = autocomplete.getPlace();
            var lat = place.geometry.location.lat();
            var long = place.geometry.location.lng();
            let numeroRue = place.address_components[0].long_name;
            let rue = place.address_components[1].long_name;
            let ville = place.address_components[2].long_name;
            let region = place.address_components[3].long_name;

            $('#numeroRue').val(numeroRue);
            $('#rue').val(rue);
            $('#ville').val(ville);
            $('#region').val(region);
            $('#latitude').val(lat);
            $('#longitude').val(long);

        });
    </script>
@endsection

@section('content')
    <div class="site-container col center-v">
        <h1 class="qsn-h1">Contenu</h1>
        <p class="medium">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam, mollitia officia!
            Distinctio,
            itaque! Modi pariatur
            quo explicabo expedita dicta, debitis quae nemo consequatur quidem dolorum laborum adipisci quos, commodi
            molestiae!
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam veniam id numquam ad reiciendis, recusandae
            aperiam
            asperiores voluptatem iusto deserunt optio saepe sunt temporibus, neque quis ea a ex eos. Lorem ipsum dolor sit
            amet
            consectetur adipisicing elit. Alias aperiam ipsa quis tempora mollitia, accusamus corporis aut iusto quisquam
            quidem
            eveniet ipsam rem exercitationem perspiciatis. Vel dolor vitae eum velit? Lorem ipsum dolor sit amet consectetur
            adipisicing elit. Quam qui suscipit magnam consequuntur, voluptas, commodi impedit, rerum alias quaerat
            exercitationem quia tempora. Deleniti vitae nemo, itaque libero nostrum neque harum.</p>
    </div>
@endsection
