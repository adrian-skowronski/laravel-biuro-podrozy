@include('shared.html')

@include('shared.head', ['pageTitle' => 'Rezerwacje - lista - admin'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">
        <div class="row mb-1">
            <h1>Lista rezerwacji</h1>
        </div>
        <div class="row mb-2">
            <a href="{{ route('bookings.create') }}">Dodaj nową rezerwację</a>
        </div>
        <div class="row">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID Klienta</th>
                        <th scope="col">ID Wycieczki</th>
                        <th scope="col">Liczba uczestników</th>
                        <th scope="col">Cena</th>
                        <th scope="col">Utworzono</th>
                        <th scope="col">Zaktualizowano</th>
                        <th scope="col">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $booking)
                        <tr>
                            <th scope="row">{{$booking->booking_id}}</th>
                            <td>{{$booking->customer_id}}</td>
                            <td>{{$booking->trip_id}}</td>
                            <td>{{$booking->participants}}</td>
                            <td>{{$booking->price}}</td>
                            <td>{{$booking->created_at}}</td>
                            <td>{{$booking->updated_at}}</td>
                            <td>
                                <a href="{{route('bookings.edit', $booking->booking_id)}}">Edycja</a>
                                <form method="POST" action="{{ route('bookings.destroy', $booking->booking_id) }}" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th scope="row" colspan="8">Brak rezerwacji.</th>
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
