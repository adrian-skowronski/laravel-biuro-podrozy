@include('shared.html')

@include('shared.head', ['pageTitle' => 'Edytuj dane wycieczki'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">


        <div class="row mt-4 mb-4 text-center">
            <h1>Edytuj dane wycieczki</h1>
        </div>


        <div class="row d-flex justify-content-center">
            <div class="col-6">
            <form method="POST" action="{{ route('trips.update', $trip->trip_id) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Tytuł</label>
                        <input id="title" name="title" type="text" class="form-control @if ($errors->first('title')) is-invalid @endif" value="{{ $trip->title }}">
                        <div class="invalid-feedback">Nieprawidłowy tytuł!</div>
                    </div>
                 <div class="form-group mb-2">
                        <label for="name" class="form-label">Od</label>
                        <input id="start" name="start" type="date" class="form-control @if ($errors->first('start')) is-invalid @endif" value="{{ $trip->start }}">
                        <div class="invalid-feedback">Nieprawidłowa data od!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Do</label>
                        <input id="end" name="end" type="date" class="form-control @if ($errors->first('end')) is-invalid @endif" value="{{ $trip->end }}">
                        <div class="invalid-feedback">Nieprawidłowa data do!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Cena</label>
                        <input id="price" name="price" type="text" class="form-control @if ($errors->first('price')) is-invalid @endif" value="{{ $trip->price }}">
                        <div class="invalid-feedback">Nieprawidłowa cena!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Opis</label>
                        <input id="description" name="description" type="text" class="form-control @if ($errors->first('description')) is-invalid @endif" value="{{ $trip->description }}">
                        <div class="invalid-feedback">Nieprawidłowy opis!</div>
                    </div>   
                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Max_uczest.</label>
                        <input id="max_participants" name="max_participants" type="text" class="form-control @if ($errors->first('max_participants')) is-invalid @endif" value="{{ $trip->max_participants }}">
                        <div class="invalid-feedback">Nieprawidłowa liczba!</div>
                    </div>   
                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Obecnie_uczest.</label>
                        <input id="current_participants" name="current_participants" type="text" class="form-control @if ($errors->first('current_participants')) is-invalid @endif" value="{{ $trip->current_participants }}">
                        <div class="invalid-feedback">Nieprawidłowa liczba!</div>
                    </div>   
                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Status</label>
                        <select id="status" name="status" class="form-control @if ($errors->first('status')) is-invalid @endif">
        <option value="aktualna" @if (old('status') == 'aktualna') selected @endif>Aktualna</option>
        <option value="archiwalna" @if (old('status') == 'archiwalna') selected @endif>Archiwalna</option>
    </select>                        <div class="invalid-feedback">Nieprawidłowy status!</div>
                    </div>   
                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Id koordynatora</label>
                        <input id="coordinator_id" name="coordinator_id" type="text" class="form-control @if ($errors->first('coordinator_id')) is-invalid @endif" value="{{ $trip->coordinator_id }}">
                        <div class="invalid-feedback">Nieprawidłowe ID!</div>
                    </div>   
                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Zdjęcie</label>
                        <input id="photo" name="photo" type="text" class="form-control @if ($errors->first('photo')) is-invalid @endif" value="{{ $trip->photo }}">
                        <div class="invalid-feedback">Nieprawidłowa ścieżka!</div>
                    </div>   
                    
                    
                    <div class="text-center mt-4 mb-4">
                        <input class="btn btn-success" type="submit" value="Wyślij">
                    </div>
                  
                    
                </form>
            </div>
        </div>
    </div>

    @include('shared.footer')
</body>

</html>
