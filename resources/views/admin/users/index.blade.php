@extends('layouts.users')

@section('users')
    <h3>Gestion des utilisateurs</h3>
    @include('partials.alerts')
    <table class="table">
        <thead>
            <tr>
                <th>#Id</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th>{{ $user->id }}</th>
                    <td>{{ $user->nom }}</td>
                    <td>{{ $user->prenom }}</td>
                    <td>{{ $user->email }}</td>
                    @switch($user->role_as)
                        @case(0)
                            <td>Client</td>
                        @break

                        @case(1)
                            <td>Administrateur</th>
                        @break

                        @case(2)
                            <td>Vendeur</td>
                        @break

                        @default
                            <td>Inconnu</td>
                    @endswitch
                    <td class="admin-action">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn-secondary2">Modifier</a>

                        {{-- GESTION DE LA SUPPRESSION --}}
                        <form id="delete-user-form-{{ $user->id }}"
                            action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none">
                            @csrf
                            @method("DELETE")
                        </form>
                        <a href="#" class="btn-secondary delete"
                            data-confirm="Etes-vous sûr de vouloir supprimer cet utilisateur?">Supprimer</a>
                        {{-- FIN DE GESTION DE SUPPRESSION --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pages">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
@endsection

@section('scripts')
    <!-- Scripts -->
    <script src="{{ asset('admin/js/sidebar.js') }}" defer></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script>
        var deleteLinks = document.querySelectorAll('.delete');

        for (var i = 0; i < deleteLinks.length; i++) {
            deleteLinks[i].addEventListener('click', function(event) {
                event.preventDefault();

                var choice = confirm(this.getAttribute('data-confirm'));

                if (choice) {
                    window.location.href = this.getAttribute('href');
                    document.getElementById('delete-user-form-{{ $user->id }}').submit();
                }
            });
        }
    </script>
@endsection
