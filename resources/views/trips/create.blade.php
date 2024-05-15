@include('shared.html')

@include('shared.head', ['pageTitle' => 'Dodaj nową wycieczkę'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">

        <div class="row mt-4 mb-4 text-center">
            <h1>Dodaj nową wycieczkę</h1>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <form method="POST" action="{{ route('trips.store') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group mb-2">
                        <label for="title" class="form-label">Tytuł</label>
                        <input id="title" name="title" type="text" class="form-control @if ($errors->first('title')) is-invalid @endif" value="{{ old('title') }}">
                        <div class="invalid-feedback">Nieprawidłowy tytuł!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="start" class="form-label">Od</label>
                        <input id="start" name="start" type="date" class="form-control @if ($errors->first('start')) is-invalid @endif" value="{{ old('start') }}">
                        <div class="invalid-feedback">Nieprawidłowa data od!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="end" class="form-label">Do</label>
                        <input id="end" name="end" type="date" class="form-control @if ($errors->first('end')) is-invalid @endif" value="{{ old('end') }}">
                        <div class="invalid-feedback">Nieprawidłowa data do!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="price" class="form-label">Cena</label>
                        <input id="price" name="price" type="text" class="form-control @if ($errors->first('price')) is-invalid @endif" value="{{ old('price') }}">
                        <div class="invalid-feedback">Nieprawidłowa cena!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="description" class="form-label">Opis</label>
                        <input id="description" name="description" type="text" class="form-control @if ($errors->first('description')) is-invalid @endif" value="{{ old('description') }}">
                        <div class="invalid-feedback">Nieprawidłowy opis!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="description" class="form-label">Maksymalna liczba uczestników</label>
                        <input id="max_participants" name="max_participants" type="text" class="form-control @if ($errors->first('max_participants')) is-invalid @endif" value="{{ old('max_participants') }}">
                        <div class="invalid-feedback">Nieprawidłowa liczba!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="description" class="form-label">Aktualna liczba uczestników</label>
                        <input id="current_participants" name="current_participants" type="text" class="form-control @if ($errors->first('current_participants')) is-invalid @endif" value="{{ old('current_participants') }}">
                        <div class="invalid-feedback">Nieprawidłowy liczba!</div>
                    </div>
                    <div class="form-group mb-2">
    <label for="status" class="form-label">Status</label>
    <select id="status" name="status" class="form-control @if ($errors->first('status')) is-invalid @endif">
        <option value="aktualna" @if (old('status') == 'aktualna') selected @endif>Aktualna</option>
        <option value="archiwalna" @if (old('status') == 'archiwalna') selected @endif>Archiwalna</option>
    </select>
    <div class="invalid-feedback">Nieprawidłowy status!</div>
</div>

                    <div class="form-group mb-2">
                        <label for="description" class="form-label">Id koordynatora</label>
                        <input id="coordinator_id" name="coordinator_id" type="text" class="form-control @if ($errors->first('coordinator_id')) is-invalid @endif" value="{{ old('coordinator_id') }}">
                        <div class="invalid-feedback">Nieprawidłowe ID koordynatora!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="description" class="form-label">Nazwa zdjęcia</label>
                        <input id="photo" name="photo" type="text" class="form-control @if ($errors->first('photo')) is-invalid @endif" value="{{ old('photo') }}">
                        <div class="invalid-feedback">Nieprawidłowa nazwa!</div>
                    </div>
                    <div class="text-center mt-4 mb-4">
                        <input class="btn btn-success" type="submit" value="Dodaj">
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('shared.footer')
</body>

</html>
