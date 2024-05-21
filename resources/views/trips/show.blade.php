@include('shared.html')

@include('shared.head', ['pageTitle' => 'Wycieczka'])
@include('shared.navbar')
<div class="container text-center">
    <br><br><br>
    <h1>Szczegóły wycieczki</h1>
    <br>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $trip->title }}</h2>
            <br>
            <p class="card-text">{{ $trip->description }}</p>
            <p class="card-text"><strong>Data rozpoczęcia:</strong> {{ $trip->start }}</p>
            <p class="card-text"><strong>Data zakończenia:</strong> {{ $trip->end }}</p>
            <p class="card-text"><strong>Cena:</strong> {{ $trip->price }} zł</p>
            <p class="card-text"><strong>Maksymalna liczba uczestników:</strong> {{ $trip->max_participants }}</p>
            <p class="card-text"><strong>Aktualna liczba uczestników:</strong> {{ $trip->current_participants }}</p>
            <p class="card-text"><strong>Koordynator:</strong> {{ $trip->coordinators->name }} {{ $trip->coordinators->surname }}</p>
            <p class="card-text"><strong>Zwiedzane skocznie:</strong></p>
            <ol class="list-unstyled">
    @foreach($trip->hills as $hill)
        <li>{{ $hill->name }}</li>
    @endforeach
</ol>
            
            @if($trip->photo)
    <img src="{{ asset('photo/' . $trip->photo) }}" class="img-fluid" alt="{{ $trip->title }}" style="max-width: 30%;">
@endif

        </div>
    </div>
</div>
<br>
<div class="container text-center">
    <a href="{{ route('trips.book', $trip) }}" class="btn btn-primary mt-3">Zarezerwuj wycieczkę!</a>
</div>

<div class="container text-center">
    <a href="{{ route('start.oferty') }}" class="btn btn-secondary mt-3">Wróć do listy wycieczek</a>
</div>

<br>
@include('shared.footer')
