@include('shared.html')

@include('shared.head', ['pageTitle' => 'Koordynatorzy - lista - admin'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">
        <div class="row mb-1">
            <h1>Lista koordynatorów</h1>
        </div>
        <div class="row mb-2">
            <a href="{{ route('coordinators.create') }}">Dodaj koordynatora</a>
        </div>
        <div class="row">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Imię</th>
                        <th scope="col">Nazwisko</th>
                        <th scope="col">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($coordinators as $coordinator)
                    <tr>
                        <th scope="row">{{ $coordinator->coordinator_id }}</th>
                        <td>{{ $coordinator->name }}</td>
                        <td>{{ $coordinator->surname }}</td>
                        <td>
                            <a href="{{ route('coordinators.edit', $coordinator->coordinator_id) }}">Edycja</a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('coordinators.destroy', $coordinator->coordinator_id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <th scope="row" colspan="4">Brak koordynatorów.</th>
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
