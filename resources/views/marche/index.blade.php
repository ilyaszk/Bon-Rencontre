@extends('layouts.marche')

@section('content1')

    <div class="site-container col center-h">
        <div class="paragraphe1">
            <img class="photo"
                src="{{ asset('frontend/img/placeholders/marche-la-rochelle-tourisme-agence-les-conteurs-38.jpg') }}">


            <div class="marchehebdo">
                <h2>{{ $marche->titre1 }}</h2>
                <p>{{ $marche->para1 }} </p>
                @foreach (explode('|', $marche->date1) as $item)
                    <h5>{{ $item }}</h5>
                @endforeach

            </div>
        </div>

        <div class="boxtexte">
            <div class="marchemensu">
                <h2>{{ $marche->titre2 }}</h2>
                <p>{{ $marche->para2 }} </p>
                @foreach (explode('|', $marche->date2) as $item)
                    <h5>{{ $item }}</h5>
                @endforeach
            </div>

            <div class="marchenoel">
                <h2>{{ $marche->titre3 }}</h2>
                <p>{{ $marche->para3 }} </p>
                @foreach (explode('|', $marche->date3) as $item)
                    <h5>{{ $item }}</h5>
                @endforeach
            </div>
        </div>
        <div class="plan">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d702.3736918056641!2d5.40425682925969!3d45.23778694305416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc1fcdc1bb69955a7!2zNDXCsDE0JzE2LjAiTiA1wrAyNCcxNy4zIkU!5e0!3m2!1sfr!2sfr!4v1639065898562!5m2!1sfr!2sfr"
                width="1000" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
@endsection
