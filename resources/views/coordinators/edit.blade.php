@include('shared.html')

@include('shared.head', ['pageTitle' => 'Edytuj koordynatora'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">
        <h1>Edytuj koordynatora</h1>
        <form method="POST" action="{{ route('coordinators.update', $coordinator->coordinator_id) }}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label">Imię</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $coordinator->name }}" required>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Nazwisko</label>
                <input type="text" class="form-control" id="surname" name="surname" value="{{ $coordinator->surname }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
        </form>
        <div class="mt-3">
            <a href="{{ route('coordinators.index') }}" class="btn btn-secondary">Powróć do listy koordynatorów</a>
        </div>
    </div>

    @include('shared.footer')
</body>
</html>
