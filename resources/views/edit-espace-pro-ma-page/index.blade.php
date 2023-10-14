@extends('layouts.edit-espace-pro-ma-page')
@section('zoneEdition')
    <div class="section1">
        <h2>Zone d'édition</h2>
        <h3>nom de l'entreprise : </h3>
        <input type="text" name="nom_entreprise" value="{{ $vendeur->nom_entreprise }}" required>
        <h3>téléphone : </h3>
        <input placeholder="+33" type="tel" name="telephone" value="{{ $vendeur->telephone }}" required>
        <h3>email commercial : </h3>
        <input placeholder="exemple@gmail.com" type="email" name="email_commercial"
            value="{{ $vendeur->email_commercial }}" required>
        <h3>adresse : </h3>
        <input placeholder="n° de rue" name="numRue" value="{{ $vendeur->numeroRue }}" required>
        <input placeholder="rue" type="text" name="rue" value="{{ $vendeur->rue }}" required>
        <input placeholder="région" type="text" name="region" value="{{ $vendeur->region }}" required>
        <input placeholder="ville" type="text" name="ville" value="{{ $vendeur->ville }}" required>
        <h3>description : </h3>
        <textarea name="description">{{ $vendeur->description ?? '' }}</textarea>
    </div>
@endsection

@section('scripts')
    <!-- Scripts -->
    <script src="{{ asset('frontend/js/mainMenu.js') }}" defer></script>
    <script src="{{ asset('frontend/js/popup.js.js') }}" defer></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
@endsection
