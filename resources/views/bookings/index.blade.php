@include('shared.html')

@include('shared.head', ['pageTitle' => 'Lista Rezerwacji'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">
        <h1>Lista Rezerwacji</h1>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID Wycieczki</th>
                    <th scope="col">ID Klienta</th>
                    <th scope="col">Liczba Uczestników</th>
                    <th scope="col">Cena</th>
                    <th scope="col">Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <th scope="row">{{ $booking->booking_id }}</th>
                    <td>{{ $booking->trip_id }}</td>
                    <td>{{ $booking->customer_id }}</td>
                    <td>{{ $booking->participants }}</td>
                    <td>{{ $booking->price }}</td>
                    <td>
                        <a href="{{ route('bookings.edit', $booking->booking_id) }}">Edycja</a>
                        <form method="POST" action="{{ route('bookings.destroy', $booking->booking_id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('shared.footer')
</body>
</html>
