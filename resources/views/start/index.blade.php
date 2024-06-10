<!-- STRONA GŁÓWNA STARTOWA!!! -->

<!doctype html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Skocznie świata</title>
  //<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <style>
    .navbar {
      background-color: #0077b6 !important; 
      position: fixed; 
      width: 100%; 
      top: 0; 
      z-index: 9999;
    }

    .navbar-brand,
    .navbar-nav {
      color: white !important; 
    }
        
    /* hero-image, czyli "zdjęcie w tle" */
.hero-image {
  background-image: url('hero-image-2.jpg');
  background-size: cover;
  background-position: center;
  height: 500px; 
  opacity: 0.7; 
  position: relative;
}

.hero-text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #FAFDFF; 
  text-align: center;
  font-weight: bold;
  text-shadow: 1px 1px 2px red, 0 0 1em blue, 0 0 0.2em blue;
}

    .footer {
      background-color: #343a40;
      color: white;
      text-align: center;
      position: absolute;
      bottom: 0;
      width: 100%;
      z-index: 9999;
    }
  </style>
</head>
<body>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- NAVBAR -->
    @include('shared.navbar_start')

        <div class="container-fluid p-0">
            <div class="hero-image">
              <div class="hero-text">
                <h1><b>Gotowy na niezapomniane przeżycia?</b></h1>
                <p><b>Wyruszmy na skocznie narciarskie świata!</b></p>
                <a href="#oferta" class="btn btn-primary"><b>Jedziemy!</b></a>
              </div>
            </div>
          </div>

          <br><br>

  <!-- Sekcja: Oferta -->
  <section id="oferta">
    <div class="container">
        <h1>Nasza oferta</h1>
        <div class="row">
            @foreach($trips as $trip)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('photo/'.$trip->photo) }}" class="card-img-top" alt="{{ $trip->description }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $trip->title }}</h5>
                        <p class="card-text">{{ $trip->description }}</p>
                        <p class="card-text">Data: {{ $trip->start }} - {{ $trip->end }}</p>
                        <a href="{{ route('trips.show', $trip->trip_id) }}" class="btn btn-primary">Szczegóły</a>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Przycisk "Zobacz wszystkie oferty" -->
        <div class="text-center mt-4">
            <a href="{{ route('start.oferty') }}" class="btn btn-primary">Zobacz wszystkie oferty</a>
        </div>
    </div>
</section>



  <br><br>

 <!-- Sekcja: Mapa Wycieczek -->
 @include('shared.map')

  <br><br>

 <!-- Sekcja: Formularz Zapytań -->
 @include('shared.form')


  </div>
</section>

  <br><br>

  
 <!-- Sekcja: Blog -->
 @include('shared.blog')
 



    
        <!-- Przycisk "Przejdź na blog" -->
        <div class="text-center">
          <a href="{{ route('blog.index') }}" class="btn btn-primary">Przejdź na blog</a>
        </div>
         </div>
    

        </div>
      </div>
    </div>
  </section>

  <br><br>

  <!-- Sekcja: Panel Klienta -->

  <section id="panel" class="bg-image" style="background-image: url('hero-image.jpg'); background-size: cover;">
    <div class="bg-overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
          <h1 class="mt-5 text-white">Skaczemy!</h1>
          <p class="lead text-white">Zaloguj się i bądź na bieżąco z naszą ofertą</p>
          <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Przejdź do logowania</a>
          <p></p>
          <p></p>
        </div>
      </div>
    </div>
  </section>

  @include('shared.footer') 

      
      
  </body>
</html>