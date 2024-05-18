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
                  @if($post->customers)
                  <p class="card-text"><strong>Autor:</strong> {{ $post->customers->name }} {{ $post->customers->surname }}</p>
                  @else
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
