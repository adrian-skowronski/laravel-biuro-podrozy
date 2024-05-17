@include('shared.html')
@include('shared.head', ['pageTitle' => 'Blog - nowy wpis'])
<div class="container">
    <h1>Utwórz nowy wpis na blogu</h1>

    <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Tytuł</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Opis</label>
            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Zdjęcie (opcjonalnie)</label>
            <input type="file" class="form-control" id="photo" name="photo">
        </div>
        <button type="submit" class="btn btn-primary">Utwórz</button>
    </form>
</div>
