@include('shared.html')

@include('shared.head', ['pageTitle' => 'Dodaj nową skocznię'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">

        <div class="row mt-4 mb-4 text-center">
            <h1>Dodaj nową skocznię</h1>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <form method="POST" action="{{ route('hills.store') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Nazwa</label>
                        <input id="name" name="name" type="text" class="form-control @if ($errors->first('name')) is-invalid @endif" value="{{ old('name') }}">
                        <div class="invalid-feedback">Nieprawidłowa nazwa!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="country" class="form-label">Kraj</label>
                        <input id="country" name="country" type="text" class="form-control @if ($errors->first('country')) is-invalid @endif" value="{{ old('country') }}">
                        <div class="invalid-feedback">Nieprawidłowy kraj!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="city" class="form-label">Miasto</label>
                        <input id="city" name="city" type="text" class="form-control @if ($errors->first('city')) is-invalid @endif" value="{{ old('city') }}">
                        <div class="invalid-feedback">Nieprawidłowe miasto!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="build_year" class="form-label">Rok_budowy</label>
                        <input id="build_year" name="build_year" type="text" class="form-control @if ($errors->first('build_year')) is-invalid @endif" value="{{ old('build_year') }}">
                        <div class="invalid-feedback">Nieprawidłowy rok!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="hill_size" class="form-label">Rozmiar</label>
                        <input id="hill_size" name="hill_size" type="text" class="form-control @if ($errors->first('hill_size')) is-invalid @endif" value="{{ old('hill_size') }}">
                        <div class="invalid-feedback">Nieprawidłowa wartość!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="record" class="form-label">Rekord</label>
                        <input id="record" name="record" type="text" class="form-control @if ($errors->first('record')) is-invalid @endif" value="{{ old('record') }}">
                        <div class="invalid-feedback">Nieprawidłowa wartość!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="record_holder_id" class="form-label">ID rekordzisty</label>
                        <input id="record_holder_id" name="record_holder_id" type="text" class="form-control @if ($errors->first('record_holder_id')) is-invalid @endif" value="{{ old('record_holder_id') }}">
                        <div class="invalid-feedback">Nieprawidłowe ID!</div>
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
