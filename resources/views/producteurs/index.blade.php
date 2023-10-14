@extends('layouts.producteurs')
{{-- @foreach ($tab as $item => $value)
    <input type="hidden" name="tab" id="tab" value={{ $value['nom_entreprise'] }}>
@endforeach --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    window.initMap = function() {
        // The location of Uluru
        const bonrencontre = {
            lat: 45.23764859138511,
            lng: 5.404989577034103
        };


        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: bonrencontre,
        });




        let tab = @json($tab);
        console.log(tab);
        tab.forEach(element => {
            console.log(element['latitude'])
            let nom1 = '<h3>' + element['nom_entreprise'] + '</h3>' + element['ville'] + '<br>' + element[
                    'numeroRue'] + " " + element['rue'] + '<br>' + element['email_commercial'] + '<br>' +
                element['telephone'];
            let lat = parseFloat(element['latitude']);
            let long = parseFloat(element['longitude']);

            let coord = {
                lat: lat,
                lng: long
            };



            let marker = new google.maps.Marker({
                position: coord,
                map: map,
            });

            let infowindow = new google.maps.InfoWindow({
                content: nom1,
            });

            marker.addListener("click", () => {
                infowindow.open({
                    anchor: marker,
                    map,
                    shouldFocus: false,
                });
            });
        });




    }

    /*  let tab = document.getElementById("tab").value;

     for (let index = 1; index < tab.length; index++) {
         console.log(tab[index]);

     } */
</script>


@section('map')



    <div>
        <h3>Carte des producteurs</h3>
        <!--The div element for the map -->
        <div id="map"> </div>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGhBDK3esoJbmd0pDiN2vAT4L2Tt84ZhM&callback=initMap"
                async>
        </script>

        <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    </div>



@endsection
