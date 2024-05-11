<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nasza oferta</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Dodaj inne linki do stylów tutaj, jeśli są potrzebne -->
</head>
<body>

  <section id="oferta">
    <div class="container">
      <h1>Nasza oferta</h1>
      <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach($trips as $trip)
          <div class="col">
            <div class="card h-100">
              <img src="{{ $trip->photo }}" class="card-img-top" alt="{{ $trip->description }}">
              <div class="card-body">
                <h5 class="card-title">{{ $trip->description }}</h5>
                <p class="card-text">Data: {{ $trip->start }} - {{ $trip->end }}</p>
              </div>
            </div>
          </div>
        @endforeach
        </div>
    </div>
  </section>

</body>
</html>
