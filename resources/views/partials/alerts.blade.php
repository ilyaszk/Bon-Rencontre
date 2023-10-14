@if (session('success'))
    <div class="alert-container">
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    </div>
@endif
