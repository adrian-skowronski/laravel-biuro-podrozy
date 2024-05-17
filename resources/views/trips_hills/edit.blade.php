@include('shared.html')

@include('shared.head', ['pageTitle' => 'Edytuj wycieczki-skocznie'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">


        <div class="row mt-4 mb-4 text-center">
            <h1>Edytuj powiązania skoczni z wycieczkami</h1>
        </div>


        <div class="row d-flex justify-content-center">
            <div class="col-6">
            <form method="POST" action="{{ route('trips_hills.update', $trip_hill->trip_hill_id) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group mb-2">
                        <label for="trip_id" class="form-label">Wycieczka</label>
                        <input id="trip_id" name="trip_id" type="text" class="form-control @if ($errors->first('trip_id')) is-invalid @endif" value="{{ $trip_hill->trip_id }}">
                        <div class="invalid-feedback">Nieprawidłowe ID wycieczki!</div>
                    </div>
                 <div class="form-group mb-2">
                        <label for="hill_id" class="form-label">Skocznia</label>
                        <input id="hill_id" name="hill_id" type="text" class="form-control @if ($errors->first('hill_id')) is-invalid @endif" value="{{ $trip_hill->hill_id}}">
                        <div class="invalid-feedback">Nieprawidłowe ID skoczni!</div>
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
