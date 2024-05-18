<!-- Sekcja: Formularz Zapytań -->
<section id="zapytania">
  <div class="container">
    <h1>Gdzie chcesz jechać?</h1>
    <p>Wyślij formularz, a my zrobimy co w naszej mocy!</p>
    <form method="POST" action="{{ route('queries.store') }}">
        @csrf
        <div class="mt-2 mb-3">
            <label for="email" class="form-label">Adres email</label>
            <input type="email" class="form-control" id="email" name="mail" placeholder="Twój adres email" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Opis</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Opisz swoje wymagania" required></textarea>
        </div>
        <div class="mb-3">
            <label for="budget" class="form-label">Budżet</label>
            <div class="input-group mb-3">
                <input type="number" min="0" placeholder="5000" step="any" class="form-control" id="budget" name="budget" aria-label="Amount" required>
                <span class="input-group-text">PLN</span>
            </div>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Preferowany termin wycieczki</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="mb-3 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Wyślij</button>
        </div>
    </form>
  </div>
  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</section>
