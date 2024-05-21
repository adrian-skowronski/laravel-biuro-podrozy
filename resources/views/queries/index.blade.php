@include('shared.html')

@include('shared.head', ['pageTitle' => 'Zapytania - lista - admin'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">
        <div class="row mb-1">
            <h1>Lista zapytań</h1>
        </div>
        <div class="row">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Email</th>
                        <th scope="col">Opis</th>
                        <th scope="col">Budżet</th>
                        <th scope="col">Data</th>
                        <th scope="col">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($queries as $query)
                    <tr>
                        <th scope="row">{{ $query->id }}</th>
                        <td>{{ $query->mail }}</td>
                        <td>{{ $query->description }}</td>
                        <td>{{ $query->budget }}</td>
                        <td>{{ $query->date }}</td>
                        <td>
                            <form method="POST" action="{{ route('queries.destroy', $query->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <th scope="row" colspan="6">Brak zapytań.</th>
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
