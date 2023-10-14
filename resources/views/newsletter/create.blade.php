<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/decoupled-document/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script async charset="utf-8" src="//cdn.embedly.com/widgets/platform.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('frontend/css/comp/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/comp/buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/newsletter.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/admin.css') }}" rel="stylesheet">
</head>

<body>

    @include('layouts.inc.sidebar')

    <section class="home-section">
        <div class="home-content">
            <a href="{{ url('/') }}"><span class="iconify" data-icon="bi:arrow-left-circle"></span>Retour
                au site</a>
        </div>

        <div class="admin-content">
            <div class="admin-container">
                <h3>Démarrez une nouvelle campagne!</h3>
                <p>Le contenu de la newsletter sera envoyé à tous les inscrits du site.</p>
                <p>En cliquant sur "suivant" vous pourrez prévisualiser le contenu de la newsletter avant envoi.</p>

                <div class="toolbar" id="toolbar-container"></div>

                <form action="{{ route('newsletter.view') }}" id="update-form" method="post"
                    enctype="multipart/form-data" class="editor-border">
                    @csrf
                    <div id="editor"></div>
                    <input type="hidden" id="body" name="body" value="" />
                </form>
                <div class="btn-container">
                    <button class="btn-primary" id="btnSubmit">SUIVANT</button>
                </div>

            </div>
        </div>
    </section>

    <script>
        DecoupledEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '{{ route('newsletter.upload') . '?_token=' . csrf_token() }}'
                }
            }, {
                alignment: {
                    options: ['right', 'right']
                }
            })
            .then(editor => {

                const toolbarContainer = document.querySelector('#toolbar-container');

                toolbarContainer.appendChild(editor.ui.view.toolbar.element);

                editor.editing.view.change(writer => {
                    writer.setStyle('height', '400px', editor.editing.view.document.getRoot());
                });

                document.querySelector('#btnSubmit').addEventListener('click', (e) => {
                    e.preventDefault();
                    const editorData = editor.getData();
                    console.log(editorData);
                    // ...
                    document.getElementById("body").value = editorData;

                    var form = document.getElementById("update-form");
                    form.submit();
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    <!-- Scripts -->
    <script src="{{ asset('admin/js/sidebar.js') }}" defer></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
</body>

</html>
