@extends('layouts.EditAccueil')
@section('text1')
    <div class="section1">
        <h2>Zone de texte n°1</h2>
        <h3>Description : </h3>
        <textarea name="description">{{ $accueil->description }}</textarea>
        <h2>Bannière :</h2>
        <input name="filesToUpload" id="filesToUpload" type="file" onchange="preview()" accept="image/*" />
        <label for="filesToUpload">
        </label>
        <div id="previews" class="previews">
        </div>
    </div>
@endsection


@section('scripts')
    <!-- Scripts -->
    <script>
        var input = document.getElementById('filesToUpload');

        //empty list for now...


        function preview() {
            const preview = document.getElementById('previews');
            preview.innerHTML = "";
            for (let i = 0; i < event.target.files.length; i++) {
                preview.innerHTML +=
                    '<img src=' + URL.createObjectURL(event.target.files[i]) + ' alt="image du produit">';
            }

        }
    </script>
    <script src="{{ asset('admin/js/sidebar.js') }}" defer></script>
    <script src="{{ asset('frontend/js/popup.js.js') }}" defer></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
@endsection
