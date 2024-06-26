@include('shared.html')
@include('shared.head', ['pageTitle' => 'Zarezerwuj'])
@include('shared.navbar')

<div class="container text-center">
    <br><br><br>
    <h1>Zarezerwuj wycieczkę</h1>
    <h4 class="card-title">{{ $trip->title }}</h4>
    <br>
    <p class="card-text"><strong>Data rozpoczęcia:</strong> {{ $trip->start }}</p>
    <p class="card-text"><strong>Data zakończenia:</strong> {{ $trip->end }}</p>

    <br>

    <!-- Formularz rezerwacji -->
    <form method="POST" action="{{ route('trips.booking.submit', $trip) }}">
    @csrf
    <input type="hidden" name="trip_id" value="{{ $trip->trip_id }}">
    <div class="form-group">
        <label for="participants">Liczba osób:</label>
        <input type="number" class="form-control" id="participants" name="participants" min="1" required>
    </div>
    <p>Cena całkowita: <b><span id="price">0</span> zł </b>/w tym podatek/</p>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const participantsInput = document.getElementById('participants');
        const priceElement = document.getElementById('price');
        const pricePerPerson = {{ $trip->price }};

        participantsInput.addEventListener('input', function() {
            const participants = participantsInput.value;
            const totalPrice = pricePerPerson * participants;
            priceElement.textContent = totalPrice.toFixed(2);
        });
    });
    </script>
    <button type="submit" class="btn btn-primary">Zarezerwuj i zapłać</button>
</form>

</div>

<br>
<div class="container text-center">
    <a href="{{ route('start.oferty') }}" class="btn btn-secondary mt-3">Wróć do listy wycieczek</a>
</div>
<br>
@include('shared.footer')
