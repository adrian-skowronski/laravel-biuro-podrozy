@include('shared.html')
@include('shared.head', ['pageTitle' => 'Panel Klienta'])

<body>
    @include('shared.navbar')
    <div class="container text-center">
    <br><br><br>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</div>
    <div class="container mt-5 mb-5">
        <div class="row mb-1">
            <h1>Dane Klienta</h1>
        </div>



        <div class="row">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">Pole</th>
                        <th scope="col">Wartość</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">ID</th>
                        <td>{{ $customer->customer_id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Imię</th>
                        <td>{{ $customer->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nazwisko</th>
                        <td>{{ $customer->surname }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Telefon</th>
                        <td>{{ $customer->phone }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td>{{ $customer->email }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Kod</th>
                        <td>{{ $customer->code }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Saldo</th>
                        <td>{{ $customer->balance }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Rola</th>
                        <td>{{ $customer->role_id == 1 ? 'Admin' : 'Klient' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Utworzony</th>
                        <td>{{ $customer->created_at }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Ostatnia aktualizacja</th>
                        <td>{{ $customer->updated_at }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="row mb-1">
                <br><br>
    <h1>Historia Rezerwacji</h1>
</div>

<div class="row">
    @if ($bookings->isEmpty())
        <p>Brak rezerwacji.</p>
    @else
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Wycieczka</th>
                    <th scope="col">Liczba uczestników</th>
                    <th scope="col">Cena</th>
                    <th scope="col">Data rezerwacji</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->booking_id }}</td>
                        <td>{{ $booking->trip->title }}</td>
                        <td>{{ $booking->participants }}</td>
                        <td>{{ $booking->price }}</td>
                        <td>{{ $booking->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

            <div class="container mt-3">
                <div class="row">
                    <div class="col text-center">
                        <a href="{{ route('customer.add_money') }}" class="btn btn-primary">Doładuj saldo</a>
                    </div>
                </div>
            </div>

            <div class="container mt-3">
                <div class="row">
                    <div class="col text-center">
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Powróć do panelu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('shared.footer')
</body>
</html>
