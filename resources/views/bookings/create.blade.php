@include('shared.html')

@include('shared.head', ['pageTitle' => 'Dodaj Rezerwację'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">
        <h1>Dodaj Rezerwację</h1>
        <form method="POST" action="{{ route('bookings.store') }}">
            @csrf
            <div class="mb-3">
                <label for="trip_id" class="form-label">Wycieczka</label>
                <select class="form-control" id="trip_id" name="trip_id" required>
                    @foreach($trips as $trip)
                    <option value="{{ $trip->trip_id }}">{{ $trip->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="participants" class="form-label">Liczba Uczestników</label>
                <input type="number" class="form-control" id="participants" name="participants" min="1" required>
            </div>
            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>
    </div>

    @include('shared.footer')
</body>
</html>
