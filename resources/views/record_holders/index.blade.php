@include('shared.html')

@include('shared.head', ['pageTitle' => 'Rekordziści - lista - admin'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">
        <div class="row mb-1">
            <h1>Lista rekordzistów</h1>
        </div>
        <div class="row mb-2">
            <a href="{{ route('record_holders.create') }}">Dodaj rekordzistę</a>
        </div>
        <div class="row">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Imię</th>
                        <th scope="col">Nazwisko</th>
                        <th scope="col">Kraj</th>
                        <th scope="col">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recordHolders as $recordHolder)
                    <tr>
                        <th scope="row">{{ $recordHolder->record_holder_id }}</th>
                        <td>{{ $recordHolder->name }}</td>
                        <td>{{ $recordHolder->surname }}</td>
                        <td>{{ $recordHolder->country }}</td>
                        <td>
                            <a href="{{ route('record_holders.edit', $recordHolder->record_holder_id) }}">Edycja</a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('record_holders.destroy', $recordHolder->record_holder_id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <th scope="row" colspan="5">Brak rekordzistów.</th>
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