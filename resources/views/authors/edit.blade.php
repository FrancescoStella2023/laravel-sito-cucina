@extends("layouts.recipe")

@section("title", "Modifica ricetta")

@section("content")
    <form action="{{ route("authors.update", $author) }}" method="POST" class="m-2">
        @csrf
        @method('PUT')

        <div class="form-control mb-3">
            <label class="form-label fw-bold" for="name">Nome</label>
            <input class="form-control" type="text" id="name" name="name" value=" {{ $author->name }}">
        </div>

        <div class="form-control m-2">
            <input class="btn btn-primary" type="submit" value="Salva">
            <a href="{{ route('authors.index') }}" class="btn btn-danger display-on-line">
                Annulla
            </a>
        </div>
    </form>
@endsection