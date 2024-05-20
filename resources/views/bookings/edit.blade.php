@include('shared.html')

@include('shared.head', ['pageTitle' => 'Edycja Rezerwacji'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">
        <h1>Edycja Rezerwacji</h1>
        <form method="POST" action="{{ route('bookings.update', $booking->booking_id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="trip_id" class="form-label">Wycieczka</label>
                <select class="form-control" id="trip_id" name="trip_id" required>
                @foreach($trips as $trip)
                <option value="{{ $trip->trip_id }}" @if($trip->trip_id == $booking->trip_id) selected @endif>{{ $trip->title }}</option>
                @endforeach
                </select>
                </select>
            </div>
            <div class="mb-3">
                <label for="participants" class="form-label">Liczba Uczestników</label>
                <input type="number" class="form-control" id="participants" name="participants" min="1" value="{{ $booking->participants }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Zapisz</button>
        </form>
    </div>

    @include('shared.footer')
</body>
</html>
