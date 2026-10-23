@extends("layouts.recipe")

@section("title", "Aggiungi ricetta")

@section("content")
    <form action="{{ route("recipes.store") }}" method="POST" enctype="multipart/form-data" class="m-2">
        @csrf

        <div class="form-control mb-3">
            <label class="form-label fw-bold" for="title">Titolo</label>
            <input class="form-control" type="text" id="title" name="title">
        </div>

        <div class="form-control mb-3">
            <label class="form-label fw-bold" for="description">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
        </div>

        <div class="form-control mb-3">
            <label class="form-label fw-bold" for="author">Autore</label>
            <select class="form-select" name="author" id="author">
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-control mb-3 d-flex flex-wrap">
            <label class="form-label fw-bold" for="image">Immagine</label>
            <input class="form-control" type="file" name="image" id="image">
        </div>

        <div class="form-control m-2">
            <input class="btn btn-primary" type="submit" value="Salva">
            <a href="{{ route('recipes.index') }}" class="btn btn-danger display-on-line">
                Annulla
            </a>
        </div>
    </form>
@endsection