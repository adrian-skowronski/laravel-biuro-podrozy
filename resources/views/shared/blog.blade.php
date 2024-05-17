<section id="blog">
  <div class="container">
    <h1>Wasze opowieści</h1>
    <h4> Ostatnie wpisy na blogu:</h4>
    <div class="container">
      <!-- Wyświetl ostatnie wpisy -->
      <div class="row">
        @forelse($latestPosts as $post)
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="row g-0">
              @if($post->photo)
              <div class="col-md-4">
                <img src="{{ asset($post->photo) }}" class="img-fluid rounded-start" alt="{{ $post->title }}">
              </div>
              @endif
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{ $post->title }}</h5>
                  <p class="card-text">{{ $post->description }}</p>
                  <p class="card-text"><small class="text-muted">Utworzono: {{ $post->created_at->format('d-m-Y') }}</small></p>
                  {{-- Sprawdź, czy istnieje użytkownik --}}
                  @if($post->customer)
                  {{-- Wyświetl imię i nazwisko użytkownika --}}
                  <p class="card-text"><strong>Autor:</strong> {{ $post->customer->name }} {{ $post->customer->surname }}</p>
                  @else
                  {{-- Jeśli nie ma użytkownika, wyświetl "Nieznany" --}}
                  <p class="card-text"><strong>Autor:</strong> Nieznany</p>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        @empty
        <p>Brak wpisów na blogu.</p>
        @endforelse
      </div>
    </div>
  </div>
</section>
