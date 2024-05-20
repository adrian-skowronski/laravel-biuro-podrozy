@include('shared.html')

@include('shared.head', ['pageTitle' => 'Wycieczki - lista - admin'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">
        <div class="row mb-1">
            <h1>Lista wycieczek i skoczni</h1>
        </div>
        <div class="row mb-2">
            <a href="{{ route('trips_hills.create') }}">Dodaj nowe połączenia</a>
        </div>
        <div class="row">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Wycieczka</th>
                        <th scope="col">Skocznia</th>
                        <th scope="col">Akcje</th>
                    </tr>
                </thead>
                <tbody>
@forelse ($trips_hills as $trip_hill)
    <tr>
        <th scope="row">{{ $trip_hill->id }}</th>
        <td>{{ $trip_hill->trip->title }}</td>
        <td>{{ $trip_hill->hill->name }}</td>
        <td>
        <a href="{{ route('trips_hills.edit', $trip_hill->id) }}">Edycja</a>
        <form method="POST" action="{{ route('trips_hills.destroy', $trip_hill->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń</button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <th scope="row" colspan="4">Brak połączeń wycieczek i skoczni.</th>
    </tr>
@endforelse


                </tbody>
            </table>
            <div class="container mt-3">
                <div class="row">
                    <div class="col text-center">
                        <a href="{{ route('admin') }}" class="btn btn-secondary">Powróć do panelu admina</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('shared.footer')
</body>

</html>
