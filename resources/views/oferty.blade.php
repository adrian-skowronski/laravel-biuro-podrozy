<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oferty - Skocz w podróż!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
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
        </div>
    </nav>

    <!-- Oferty -->
    <section id="oferta" class="py-5">
        <div class="container">
            <h1>Nasza oferta</h1>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <!-- Oferta 1 -->
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
                <!-- Oferta 2 -->
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
                <!-- Oferta 3 -->
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
                <!-- Oferta 4 -->
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
        </div>
    </section>

    <!-- Footer -->
    <footer class="container-fluid bg-body-tertiary text-center py-3">
        <p>&copy; Biuro Podróży Skok - 2024</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
