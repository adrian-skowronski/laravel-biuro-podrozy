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
                <p class="card-text">Data: {{ $trip->start }} - {{ $trip->end }}</p>
                
            </div>
          </div>
        @endforeach
        </div>
        <!-- Przycisk "Zobacz wszystkie oferty" -->
        <div class="text-center mt-4">
          <a href="{{ route('trips.index') }}" class="btn btn-primary">Zobacz wszystkie oferty</a>
        </div>
      </div>
  </section>