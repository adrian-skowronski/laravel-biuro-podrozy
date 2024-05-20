@include('shared.html')
@include('shared.head', ['pageTitle' => 'Blog - wpisy'])
@include('shared.navbar')
<br><br><br>
<div class="container">
    <h1>Wpisy na blogu</h1>
    <br>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @auth
    <div class="mb-3">
        <a href="{{ route('blog.create') }}" class="btn btn-primary">Dodaj nowy wpis</a>
    </div>
    @endauth
    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->description }}</p>
                        @if($post->photo)
                        <img src="{{ asset($post->photo) }}" class="card-img-top" alt="{{ $post->title }}">
                    @endif
                        <p class="card-text">Utworzono: {{ $post->created_at }}</p>
                        {{-- Sprawdź, czy istnieje użytkownik --}}
                        @if($post->customers)
                            {{-- Wyświetl imię i nazwisko użytkownika --}}
                            <p class="mt-3"><strong>Autor:</strong> {{ $post->customers->name }} {{ $post->customers->surname }}</p>
                        @else
                            {{-- Jeśli nie ma użytkownika, wyświetl "Nieznany" --}}
                            <p class="mt-3"><strong>Autor:</strong> Nieznany</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@include('shared.footer')