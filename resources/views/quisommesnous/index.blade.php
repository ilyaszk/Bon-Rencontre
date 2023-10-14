@extends('layouts.qui-sommes-nous')


@section('qsn')
    <h1 class="qsn-h1">{{ $QuiSommeNous->titre1 }}</h1>
    <p class="medium">{{ $QuiSommeNous->para1 }}</p>
@endsection

@section('nos-valeurs-nos-objectifs')
    <h2 class="qsn-h2">{{ $QuiSommeNous->titre2 }}</h2>
    <p class="normal">{{ $QuiSommeNous->para2 }}</p>

    <h2 class="qsn-h2">{{ $QuiSommeNous->titre3 }}</h2>
    <p class="normal">{{ $QuiSommeNous->para3 }}</p>
@endsection

@section('nos-locaux')
    <h2 class="qsn-h2">{{ $QuiSommeNous->titre4 }}</h2>
    <p class="normal">{{ $QuiSommeNous->para4 }}</p>
@endsection

@section('image-demo')
    <img src={{ asset('/frontend/img/images-qui-somme-nous.jpeg') }} alt="image qui somme nous" width="100%">

@endsection
