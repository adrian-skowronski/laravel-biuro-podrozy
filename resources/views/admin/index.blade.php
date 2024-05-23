<?php

use Illuminate\Support\Facades\Schema;

//LISTA NAZW TABEL
$tables = ['trips', 'hills', 'trips_hills','record_holders','coordinators','blog_posts','customers', 'queries',];

?>

@include('shared.html')
@include('shared.head', ['pageTitle' => 'Panel admina'])

<body>
@include('shared.navbar')
<br><br>
<section id="oferta">
    <div class="container">
      <br>
        <h1>Lista tabel w bazie danych</h1>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Nazwa tabeli</th>
                    <th>Akcja</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tables as $table)
                <tr>
                    <td>{{ $table }}</td>
                    <td>
                      <a href="{{ route('admin.table', ['table' => $table]) }}" class="btn btn-primary">Wyświetl</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
        <h2>Statystyki rezerwacji wycieczek</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nazwa wycieczki</th>
                    <th>Liczba rezerwacji</th>
                </tr>
            </thead>
            <tbody>
                @foreach($statistics as $stat)
                <tr>
                    <td>{{ $stat['trip']->title }}</td>
                    <td>{{ $stat['booking_count'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h2>Ranking wydanych pieniędzy przez klientów</h2>
        @if(isset($customersRanking) && count($customersRanking) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Id klienta</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Suma wydanych pieniędzy</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customersRanking as $customer)
            <tr>
                <td>{{ isset($customer->customer_id) ? $customer->customer_id : 'Brak danych' }}</td>
                <td>{{ isset($customer->imie) ? $customer->imie : 'Brak danych' }}</td>
                <td>{{ isset($customer->nazwisko) ? $customer->nazwisko : 'Brak danych' }}</td>
                <td>{{ isset($customer->suma_wydanych_pieniedzy) ? $customer->suma_wydanych_pieniedzy : 'Brak danych' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Brak danych do wyświetlenia.</p>
@endif
        
    </div>
</section>
<br>
<br>
@include('shared.footer')
</body>
</html>
