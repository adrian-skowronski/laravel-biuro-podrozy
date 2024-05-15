@include('shared.html')

@include('shared.head', ['pageTitle' => 'Skocznie - lista - admin'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">
        <div class="row mb-1">
            <h1>Lista skoczni</h1>
        </div>
        <div class="row mb-2">
            <a href="{{ route('hills.create') }}">Dodaj wycieczkę</a>
        </div>
        <div class="row">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nazwa</th>
                        <th scope="col">Kraj</th>
                        <th scope="col">Miasto</th>
                        <th scope="col">Rok_budowy</th>
                        <th scope="col">Rozmiar</th>
                        <th scope="col">Rekord</th>
                        <th scope="col">ID_rekordzisty</th>
                        <th scope="col">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($hills as $hill)
                    <tr>
                        <th scope="row">{{ $hill->hill_id }}</th>
                        <td>{{ $hill->name }}</td>
                        <td>{{ $hill->country }}</td>
                        <td>{{ $hill->city }}</td>
                        <td>{{ $hill->build_year }}</td>
                        <td>{{ $hill->hill_size }}</td>
                        <td>{{ $hill->record }}</td>
                        <td>{{ $hill->record_holder_id }}</td>
                        <td>
                            <a href="{{ route('hills.edit', $hill->hill_id) }}">Edycja</a>
</td>
<td>
                            <form method="POST" action="{{ route('hills.destroy', $hill->hill_id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <th scope="row" colspan="9">Brak skoczni.</th>
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
