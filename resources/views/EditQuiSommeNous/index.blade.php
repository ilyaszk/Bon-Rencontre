@extends('layouts.EditQuiSommeNous')
@section('text1')
    <div class="section1">
        <h2>Zone de texte n°1</h2>
        <h3>titre : </h3>
        <input type="text" name="titre1" value="{{ $quisommenous->titre1 }}">
        <h3>texte : </h3>
        <textarea name="para1">{{ $quisommenous->para1 }}</textarea>
    </div>
@endsection

@section('text2')
    <div class="section1">
        <h2>Zone de texte n°2</h2>
        <h3>titre : </h3>
        <input type="text" name="titre2" value="{{ $quisommenous->titre2 }}">
        <h3>texte : </h3>
        <textarea name=" para2">{{ $quisommenous->para2 }}</textarea>
    </div>
@endsection

@section('text3')
    <div class="section1">
        <h2>Zone de texte n°3</h2>
        <h3>titre : </h3>
        <input type="text" name="titre3" value="{{ $quisommenous->titre3 }}">
        <h3>texte : </h3>
        <textarea name="para3">{{ $quisommenous->para3 }}</textarea>
    </div>
@endsection
@section('text4')
    <div class="section1">
        <h2>Zone de texte n°4</h2>
        <h3>titre : </h3>
        <input type="text" name="titre4" value="{{ $quisommenous->titre4 }}">
        <h3>texte : </h3>
        <textarea name="para4">{{ $quisommenous->para4 }}</textarea>
    </div>
@endsection

@section('scripts')
    <!-- Scripts -->
    <script src="{{ asset('admin/js/sidebar.js') }}" defer></script>
    <script src="{{ asset('frontend/js/popup.js.js') }}" defer></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
@endsection
