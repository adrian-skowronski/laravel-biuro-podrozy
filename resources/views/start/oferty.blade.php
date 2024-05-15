@include('shared.html')
@include('shared.head', ['pageTitle' => 'Oferta'])

<body>

  @include('shared.navbar')
  <section id="oferta">
    <div class="container">
      <h1>Nasza oferta</h1>
      <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach($trips as $trip)
          <div class="col">
            <div class="card h-100">
              <img src="{{ asset('photo/'.$trip->photo) }}" class="card-img-top" alt="{{ $trip->description }}">
              <div class="card-body">
                <h5 class="card-title">{{ $trip->title }}</h5>
                <p class="card-text">{{ $trip->description }}</p>
                <p class="card-text">Zwiedzane skocznie:</p>
                <p class="card-text">Data: {{ $trip->start }} - {{ $trip->end }}</p>
                <p class="card-text">Koordynator:</p>
                <p class="card-text">Uczestników: aktualnie {{ $trip->current_participants }} na {{ $trip->max_participants }} miejsc</p>
                <p class="card-text">Cena: {{ $trip->price }} PLN/os. </p>
              </div>
            </div>
          </div>
        @endforeach
        </div>
    </div>
  </section>

  @include('shared.footer')
</body>
</html>
