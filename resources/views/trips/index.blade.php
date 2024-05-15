@include('shared.html')

@include('shared.head', ['pageTitle' => 'Wycieczki - lista - admin'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">
        <div class="row mb-1">
            <h1>Lista wycieczek</h1>
        </div>
        <div class="row mb-2">
            <a href="{{ route('trips.create') }}">Dodaj nową wycieczkę</a>
        </div>
        <div class="row">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tytuł</th>
                        <th scope="col">Od</th>
                        <th scope="col">Do</th>
                        <th scope="col">Cena</th>
                        <th scope="col">Opis</th>
                        <th scope="col">Max_uczest.</th>
                        <th scope="col">Obecnie_uczest.</th>
                        <th scope="col">Status</th>
                        <th scope="col">Id koordynatora</th>
                        <th scope="col">Zdjęcie</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($trips as $trip)
                        <tr>
                            <th scope="row">{{$trip->trip_id}}</th>
                            <td>{{$trip->title}}</td>
                            <td>{{$trip->start}}</td>
                            <td>{{$trip->end}}</td>
                            <td>{{$trip->price}}</td>
                            <td>{{$trip->description}}</td>
                            <td>{{$trip->max_participants}}</td>
                            <td>{{$trip->current_participants}}</td>
                            <td>{{$trip->status}}</td>
                            <td>{{$trip->coordinator_id}}</td>
                            <td>{{$trip->photo}}</td>

                            <td><a href="{{route('trips.edit', $trip->trip_id)}}">Edycja</a></td> 
                            <td> 
 <form method="POST" action="{{ route('trips.destroy', $trip->trip_id) }}"> 
 @csrf 
 @method('DELETE') 
 <button type="submit" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń</button>

 </form> 
</td>
                        </tr>
                    @empty
                        <tr>
                            <th scope="row" colspan="6">Brak wycieczek.</th>
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
