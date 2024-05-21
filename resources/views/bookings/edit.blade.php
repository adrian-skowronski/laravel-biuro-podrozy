@include('shared.html')

@include('shared.head', ['pageTitle' => 'Edytuj rezerwację - admin'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">
        <h1>Edytuj rezerwację</h1>
        <form method="POST" action="{{ route('bookings.update', $booking->booking_id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="customer_id" class="form-label">ID Klienta</label>
                <input type="number" class="form-control" id="customer_id" name="customer_id" value="{{ $booking->customer_id }}" required>
            </div>
            <div class="mb-3">
                <label for="trip_id" class="form-label">ID Wycieczki</label>
                <input type="number" class="form-control" id="trip_id" name="trip_id" value="{{ $booking->trip_id }}" required>
            </div>
            <div class="mb-3">
                <label for="participants" class="form-label">Liczba uczestników</label>
                <input type="number" class="form-control" id="participants" name="participants" value="{{ $booking->participants }}" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Cena</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $booking->price }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
        </form>

        <div class="container mt-3">
            <div class="row">
                <div class="col text-center">
                    <a href="{{ route('bookings.Index') }}" class="btn btn-secondary">Powróć do listy rezerwacji</a>
                </div>
            </div>
        </div>
    </div>

    @include('shared.footer')
</body>
</html>
