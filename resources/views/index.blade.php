<!doctype html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Skocznie świata</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
</head>
<body>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- NAVBAR -->
    @include('shared.navbar')

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
  @include('shared.offers')

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

  @include('shared.footer') 

      
      
  </body>
</html>