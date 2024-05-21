@include('shared.html')

@include('shared.head', ['pageTitle' => 'Dodaj rekordzistę'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">
        <h1>Dodaj rekordzistę</h1>
        <form method="POST" action="{{ route('record_holders.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Imię</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Nazwisko</label>
                <input type="text" class="form-control" id="surname" name="surname" required>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Kraj</label>
                <input type="text" class="form-control" id="country" name="country" required>
            </div>
            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>
        <div class="mt-3">
            <a href="{{ route('record_holders.index') }}" class="btn btn-secondary">Powróć do listy rekordzistów</a>
        </div>
    </div>

    @include('shared.footer')
</body>
</html>