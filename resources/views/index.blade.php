<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skocznie świata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- FRAMEWORK MAPY - LEAFLET.JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>
  <body>

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
    opacity: 0.9; /*przezroczystość */
    position: relative;
  }
      
        .hero-text {
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          color: white;
          text-align: center;
          font-weight: bold;
        }

        .footer {
      background-color: #343a40;
      color: white;
      text-align: center;
      position: fixed;
      bottom: 0;
      width: 100%;
      z-index: 9999;
    }

      </style>
    
    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><b>Skocz w podróż!</b></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#oferta">Oferta</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#mapa">Mapa</a>
                  </li>
                <li class="nav-item">
                    <a class="nav-link" href="#zapytania">Zaproponuj wyjazd</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#blog">Wasze opowieści</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#panel">Panel Klienta</a>
                  </li>
            </ul>
          </div>
        </nav>

        <div class="container-fluid p-0">
            <div class="hero-image">
              <div class="hero-text">
                <h1><b>Gotowy na niezapomniane przeżycia?</b></h1>
                <p>Wyruszmy na skocznie narciarskie świata!</p>
                <a href="#oferta" class="btn btn-primary">Jedziemy!</a>
              </div>
            </div>
          </div>

          <br><br>

           <!-- Sekcja: Oferta -->
  <section id="oferta">
    <div class="container">
        <h1>Nasza oferta</h1>
        <div class="row row-cols-1 row-cols-md-4 g-4">
          <!-- Wycieczka 1 -->
          <div class="col">
            <div class="card h-100">
              <img src="image1.jpg" class="card-img-top" alt="Wycieczka 1">
              <div class="card-body">
                <h5 class="card-title">Nazwa Wycieczki 1</h5>
                <p class="card-text">Krótki opis wycieczki 1.</p>
                <a href="wycieczka1.html" class="btn btn-primary">Czytaj więcej</a>
              </div>
            </div>
          </div>
          <!-- Wycieczka 2 -->
          <div class="col">
            <div class="card h-100">
              <img src="image2.jpg" class="card-img-top" alt="Wycieczka 2">
              <div class="card-body">
                <h5 class="card-title">Nazwa Wycieczki 2</h5>
                <p class="card-text">Krótki opis wycieczki 2.</p>
                <a href="wycieczka2.html" class="btn btn-primary">Czytaj więcej</a>
              </div>
            </div>
          </div>
          <!-- Wycieczka 3 -->
          <div class="col">
            <div class="card h-100">
              <img src="image3.jpg" class="card-img-top" alt="Wycieczka 3">
              <div class="card-body">
                <h5 class="card-title">Nazwa Wycieczki 3</h5>
                <p class="card-text">Krótki opis wycieczki 3.</p>
                <a href="wycieczka3.html" class="btn btn-primary">Czytaj więcej</a>
              </div>
            </div>
          </div>
          <!-- Wycieczka 4 -->
          <div class="col">
            <div class="card h-100">
              <img src="image4.jpg" class="card-img-top" alt="Wycieczka 4">
              <div class="card-body">
                <h5 class="card-title">Nazwa Wycieczki 4</h5>
                <p class="card-text">Krótki opis wycieczki 4.</p>
                <a href="wycieczka4.html" class="btn btn-primary">Czytaj więcej</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Przycisk "Zobacz wszystkie oferty" -->
        <div class="text-center mt-4">
          <a href="{{ route('oferty') }}" class="btn btn-primary">Zobacz wszystkie oferty</a>
        </div>
      </div>
  </section>

  <br><br>

            <!-- Sekcja: Mapa Wycieczek -->
  <section id="mapa">
    <div class="container">
      <h1>Mapa wycieczek</h1>
      
    </div>
    <div id="map" style="height: 400px;"></div>

    <!-- LEAFLET.JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        var map = L.map('map').setView([20, 0], 2); // ustawienie środka mapy i przybliżenia
    
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    
        // zaznaczenia na mapie
        var markers = [
          { name: 'Japonia (Sapporo)', coords: [43.0621, 141.3544] },
          { name: 'Finlandia (Lahti)', coords: [60.9829, 25.6612] },
          { name: 'USA (Lake Placid)', coords: [44.2795, -73.9799] }
        ];
    
        markers.forEach(function (marker) {
          L.marker(marker.coords).addTo(map)
            .bindPopup(marker.name);
        });
      </script>
      
  </section>

  <br><br>

  <!-- Sekcja: Formularz Zapytań -->
  <section id="zapytania">
    <div class="container">
        <h1>Gdzie chcesz jechać?</h1>
        <p>Wyślij formularz, a my zrobimy co w naszej mocy!</p>
        <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td><label for="email" class="form-label">Adres email</label></td>
                  <td><input type="email" class="form-control" id="email" placeholder="Twój adres email" required></td>
                </tr>
                <tr>
                  <td><label for="budget" class="form-label">Budżet</label></td>
                  <td><input type="number" class="form-control" id="budget" placeholder="Twój budżet" min="0" required></td>
                </tr>
                <tr>
                  <td><label for="description" class="form-label">Opis</label></td>
                  <td><textarea class="form-control" id="description" rows="3" placeholder="Opisz swoje wymagania" required></textarea></td>
                </tr>
                <tr>
                  <td><label for="date" class="form-label">Preferowany termin wycieczki</label></td>
                  <td><input type="date" class="form-control" id="date" required></td>
                </tr>
                <tr>
                  <td></td>
                  <td><button type="submit" class="btn btn-primary">Zapisz</button></td>
                </tr>
              </tbody>
            </table>
          </div>
          
      </div>
  </section>

  <br><br>

  <!-- Sekcja: Blog -->
  <section id="blog">
    <div class="container">
      <h1>Wasze opowieści</h1>
      <h4>Najnowszy wpis na blogu:</h4>
      <div class="container">
        <!-- Przykładowy wpis na stronie głównej -->
        <div class="post mb-4">
          <img src="post1.jpg" class="img-fluid" alt="Post 1">
          <div class="post-content mt-2">
            <h3 class="post-header">Nagłówek wpisu 1</h3>
            <p class="post-info">Data stworzenia: 01-01-2024</p>
            <p>Treść wpisu 1...</p>
            <p>Autor: login_autora_1</p>
          </div>
        </div>
    
        <!-- Przycisk "Przejdź na blog" -->
        <div class="text-center">
          <a href="podstrona.html" class="btn btn-primary">Przejdź na blog</a>
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
          <a href="login.html" class="btn btn-primary btn-lg">Przejdź do logowania</a>
          <p></p>
          <p></p>
        </div>
      </div>
    </div>
  </section>

  <footer class="container-fluid bg-body-tertiary"> 
    <div class="row text-center pt-2"> 
    <p>&copy; Biuro Podróży Skok &ndash; 2024</p> 
    </div> 
   </footer> 

      
      
  </body>
</html>