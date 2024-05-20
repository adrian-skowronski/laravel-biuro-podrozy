@include('shared.html')
@include('shared.head', ['pageTitle' => 'Doładuj saldo'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">
        <h1 class="mb-4">Doładuj saldo</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('customer.add_money.submit') }}">
            @csrf
            <div class="form-group">
                <label for="amount">Kwota doładowania</label>
                <input type="number" class="form-control" id="amount" name="amount" min="1" required>
            </div>
            <div class="form-group">
                <label for="code">Kod</label>
                <input type="text" class="form-control" id="code" name="code" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Doładuj</button>
        </form>

        <div class="mt-3">
            <a href="{{ route('customer') }}" class="btn btn-secondary">Powróć do panelu</a>
        </div>
    </div>

    @include('shared.footer')
</body>
</html>
