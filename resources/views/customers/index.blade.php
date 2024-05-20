@include('shared.html')

@include('shared.head', ['pageTitle' => 'Klienci - lista - admin'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">
        <div class="row mb-1">
            <h1>Lista klientów</h1>
        </div>
        <div class="row mb-2">
            <a href="{{ route('customers.create') }}">Dodaj klienta</a>
        </div>
        <div class="row">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Imię</th>
                        <th scope="col">Nazwisko</th>
                        <th scope="col">Telefon</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Kod</th>
                        <th scope="col">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $customer)
                    <tr>
                        <th scope="row">{{ $customer->customer_id }}</th>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->surname }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->code }}</td>
                        <td>
                            <a href="{{ route('customers.edit', $customer->customer_id) }}">Edycja</a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('customers.destroy', $customer->customer_id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <th scope="row" colspan="7">Brak klientów.</th>
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
