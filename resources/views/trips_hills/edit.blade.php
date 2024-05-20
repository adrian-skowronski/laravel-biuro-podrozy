@include('shared.html')

@include('shared.head', ['pageTitle' => 'Edytuj połączenie'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">
        <div class="row mb-1">
            <h1>Edytuj połączenie</h1>
        </div>
        <div class="row">
            <form method="POST" action="{{ route('trips_hills.update', $trip_hill->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="trip_id">Wybierz wycieczkę:</label>
                    <select class="form-control" id="trip_id" name="trip_id">
                        @foreach ($trips as $trip)
                            <option value="{{ $trip->id }}" {{ $trip->id == $trip_hill->trip_id ? 'selected' : '' }}>{{ $trip->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="hill_id">Wybierz skocznię:</label>
                    <select class="form-control" id="hill_id" name="hill_id">
                        @foreach ($hills as $hill)
                            <option value="{{ $hill->id }}" {{ $hill->id == $trip_hill->hill_id ? 'selected' : '' }}>{{ $hill->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
            </form>
        </div>
        <div class="container mt-3">
            <div class="row">
                <div class="col text-center">
                    <br>
                    <a href="{{ route('trips_hills.index') }}" class="btn btn-secondary">Powróć do listy połączeń</a>
                </div>
            </div>
        </div>
    </div>

    @include('shared.footer')
</body>

</html>
