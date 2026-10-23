@extends("layouts.recipe")

@section("title", "Modifica ricetta")

@section("content")
    <form action="{{ route("recipes.update", $recipe) }}" method="POST" enctype="multipart/form-data" class="m-2">
        @csrf
        @method('PUT')

        <div class="form-control mb-3">
            <label class="form-label fw-bold" for="title">Titolo</label>
            <input class="form-control" type="text" id="title" name="title" value=" {{ $recipe->title }}">
        </div>

        <div class="form-control mb-3">
            <label class="form-label fw-bold" for="description">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="4">
                                {{ $recipe->description }}
                        </textarea>
        </div>

        <div class="form-control mb-3">
            <label class="form-label fw-bold" for="author">Autore</label>
            <select class="form-select" name="author" id="author">
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-control mb-3 ">
            <label class="form-label fw-bold" for="image">Carica nuova immagine: </label>
            <input type="file" name="image" id="image">
            <label class="form-label fw-bold" for="image">Vecchia immagine: </label>
            <img class="img-fluid w-25 rounded" src="{{ asset('storage/' . $recipe->image) }}" alt="{{  $recipe->image}}">
        </div>

        <div class="form-control m-2">
            <input class="btn btn-primary" type="submit" value="Salva">
            <a href="{{ route('recipes.index') }}" class="btn btn-danger display-on-line">
                Annulla
            </a>
        </div>
    </form>
@endsection