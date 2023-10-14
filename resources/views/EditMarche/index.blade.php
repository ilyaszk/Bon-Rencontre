@extends('layouts.EditMarche')
@section('text1')
    <div class="section1">
        <h2>Zone de texte n°1</h2>
        <h3>titre : </h3>
        <input type="text" name="titre1" value="{{ $marche->titre1 }}">
        <h3>texte : </h3>
        <textarea name="para1">{{ $marche->para1 }}</textarea>
        <h3>horaire :</h3>
        <p>utiliser le symbole '|' pour rentrer plusieur dates</p>
        <input type="text" name="date1" value="{{ $marche->date1 }}">
    </div>
@endsection

@section('text2')
    <div class="section1">
        <h2>Zone de texte n°2</h2>
        <h3>titre : </h3>
        <input type="text" name="titre2" value="{{ $marche->titre2 }}">
        <h3>texte : </h3>
        <textarea name=" para2">{{ $marche->para2 }}</textarea>
        <h3>horaire : </h3>
        <p>utiliser le symbole '|' pour rentrer plusieur dates</p>
        <input type="text" name="date2" value="{{ $marche->date2 }}">
    </div>
@endsection

@section('text3')
    <div class="section1">
        <h2>Zone de texte n°3</h2>
        <h3>titre : </h3>
        <input type="text" name="titre3" value="{{ $marche->titre3 }}">
        <h3>texte : </h3>
        <textarea name="para3">{{ $marche->para3 }}</textarea>
        <h3>horaire :</h3>
        <p>utiliser le symbole '|' pour rentrer plusieur dates</p>
        <input type="text" name="date3" value="{{ $marche->date3 }}">

    </div>
@endsection


@section('scripts')
    <!-- Scripts -->
    <script src="{{ asset('admin/js/sidebar.js') }}" defer></script>
    <script src="{{ asset('frontend/js/popup.js.js') }}" defer></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
@endsection
