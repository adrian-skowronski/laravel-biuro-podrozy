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
                @auth
        <!-- Jeśli użytkownik jest zalogowany -->
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-link nav-link">Wyloguj się</button>
            </form>
        </li>
    @else
        <!-- Jeśli użytkownik nie jest zalogowany -->
        <li class="nav-item">
            <a class="btn btn-link nav-link" href="{{ route('login') }}">Zaloguj się</a>
        </li>
        <li class="nav-item">
            <a class="btn btn-link nav-link" href="{{ route('register') }}">Zarejestruj się</a>
        </li>
    @endauth
            </ul>
        </div>
    </div>
</nav>
