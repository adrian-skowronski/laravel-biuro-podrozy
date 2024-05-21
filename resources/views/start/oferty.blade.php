@include('shared.html')
@include('shared.head', ['pageTitle' => 'Oferta'])

<body>
  @include('shared.navbar')
  <section id="oferta">
    <div class="container">
      <br><br><br>
      <h1>Nasza oferta</h1>
      <br>
      <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach($trips as $trip)
          <div class="col">
            <div class="card h-100">
              <img src="{{ asset('photo/'.$trip->photo) }}" class="card-img-top" alt="{{ $trip->description }}">
              <div class="card-body">
              @if($trip->status == 'archiwalna')
                <span class="badge bg-danger">Archiwalna</span>
              @elseif($trip->status == 'Ostatnia szansa')
                <span class="badge bg-warning">Ostatnia szansa</span>
              @else
          <span class="badge bg-success">Aktualna</span>
              @endif

                <h5 class="card-title">{{ $trip->title }}</h5>
                <p class="card-text">{{ $trip->description }}</p>
                <p class="card-text">Data: {{ $trip->start }} - {{ $trip->end }}</p>
                <p class="card-text">Cena: {{ $trip->price }} PLN/os. </p>
                <a href="{{ route('trips.show', $trip->trip_id) }}" class="btn btn-primary">Szczegóły</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <br>
  @include('shared.footer')
</body>
</html>
