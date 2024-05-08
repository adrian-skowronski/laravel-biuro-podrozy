<!-- Sekcja: Formularz Zapytań -->
<section id="zapytania">
  <div class="container">
    <h1>Gdzie chcesz jechać?</h1>
    <p>Wyślij formularz, a my zrobimy co w naszej mocy!</p>
    <form>
    <div class="mt-2 mb-3">
        <label for="email" class="form-label">Adres email</label>
        <input type="email" class="form-control" id="email" placeholder="Twój adres email" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Opis</label>
        <textarea class="form-control" id="description" rows="3" placeholder="Opisz swoje wymagania" required></textarea>
    </div>
    <div class="mb-3">
        <label for="budget" class="form-label">Budżet</label>
        <div class="input-group mb-3">
            <input type="number" min="0" placeholder="5000" step="any" class="form-control" id="budget" aria-label="Amount" required>
            <span class="input-group-text">PLN</span>
        </div>
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Preferowany termin wycieczki</label>
        <input type="date" class="form-control" id="date" required>
    </div>
    <div class="mb-3 d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Wyślij</button>
    </div>
</form>