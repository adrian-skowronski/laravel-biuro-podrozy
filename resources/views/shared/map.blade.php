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