<!DOCTYPE html>
<html lang="fr" dir='ltr'>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    {{-- Styles --}}
    <link href="{{ asset('frontend/css/comp/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/comp/article.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/pages/ajouterProduit.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/comp/buttonProduit.css') }}">
    <link href="{{ asset('frontend/css/comp/buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/pages/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/pagination.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/comp/popUp.css') }}">




</head>

<body>

    @include('layouts.inc.frontNavBar')

    <div class='page-container'>
        @if (isset($produit))
            <h2 class="titre">Modifier un produit</h2>

            <form method="post" action="/modifierProduits" enctype="multipart/form-data">
                @csrf
                <div class="page">

                    <div class="affichage-images">
                        <h3 class="images">Nouvelles images:</h3>
                        <p>Les anciennes images seront écrasés</p>
                        <input name="filesToUpload[]" id="filesToUpload" type="file" multiple="" onchange="preview()" />
                        <label for="filesToUpload">
                            <span class="iconify add" data-icon="akar-icons:plus" data-width="75"
                                data-height="75"></span>
                        </label>

                        <div id="previews" class="previews">

                        </div>
                        <div class="actual-images">
                            <h3 class="images">Images actuelles:</h3>
                            @foreach ($images as $image)
                                <img src="{{ $image->file_path }}" alt="{{ $image->alt }}">
                            @endforeach
                        </div>
                    </div>

                    <div class="formulaires">


                        <div class="formulaire">
                            <input type="text" name="titre" id="titre" placeholder="titre du produit" required
                                value="{{ $produit->nom }}">
                            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Description du produit"
                                required>{{ $produit->desc_produit }}</textarea>
                            <div class="prixEtStock">
                                <div class='EnStock'>
                                    <div class="text-stock">
                                        <p>En stock</p>
                                    </div>

                                    <input class="checkboxBox" type="checkbox" name="stock" id="stock"
                                        {{ $produit->en_stock ? 'checked' : '' }}>
                                </div>

                                <input type="number" name="prix" min="0" max="1000" id="prix" step="0.01" required
                                    value="{{ $produit->prix }}">

                            </div>
                            <select name=" categorie" id="categorie">
                                <option value="all">Catégorie</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $produit->categorie->id ? 'selected' : '' }}>
                                        {{ $item->nom }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="idProduit" id='idProduit' value="{{ $produit->id }}">
                        </div>
                        <div class="button-container"><input type="submit"></div>

                    </div>

                </div>
            </form>
        @else
            <h2>Le produit n'existe pas</h2>
        @endif

    </div>
    @include('layouts.inc.footer')
    <!-- Scripts -->
    <script>
        var input = document.getElementById('filesToUpload');
        var list = document.getElementById('fileList');

        //empty list for now...
        while (list.hasChildNodes()) {
            list.removeChild(ul.firstChild);
        }

        //for every file...
        for (var x = 0; x < input.files.length; x++) {
            //add to list
            var li = document.createElement('li');
            li.innerHTML = 'File ' + (x + 1) + ':  ' + input.files[x].name;
            list.append(li);
        }

        function preview() {
            const preview = document.getElementById('previews');
            preview.innerHTML = "";
            for (let i = 0; i < event.target.files.length; i++) {
                preview.innerHTML +=
                    '<img src=' + URL.createObjectURL(event.target.files[i]) + ' alt="image du produit">';
            }

        }
    </script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="{{ asset('frontend/js/mainMenu.js') }}"></script>
    <script src="{{ asset('frontend/js/popUp.js') }}" defer></script>
    <script src="{{ asset('frontend/js/footer.js') }}" defer></script>


</body>

</html>
