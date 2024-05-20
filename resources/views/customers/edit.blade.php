@include('shared.html')

@include('shared.head', ['pageTitle' => 'Edytuj klienta'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">
        <h1>Edytuj klienta</h1>
        <form method="POST" action="{{ route('customers.update', $customer->customer_id) }}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label">Imię</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}" required>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Nazwisko</label>
                <input type="text" class="form-control" id="surname" name="surname" value="{{ $customer->surname }}" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Telefon</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $customer->phone }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Nowe hasło</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="code" class="form-label">Kod</label>
                <input type="text" class="form-control" id="code" name="code" value="{{ $customer->code }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
        </form>
        <div class="mt-3">
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Powróć do listy klientów</a>
        </div>
    </div>

    @include('shared.footer')
</body>
</html>
