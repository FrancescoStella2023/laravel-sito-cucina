@extends("layouts.recipe")

@section("title", "-- Lista Autori --")

@section("content")

    <div class="container-fluid d-flex justify-content-center my-4">
        <a href="{{ route("authors.create") }}" class="btn btn-outline-success btn-lg">Aggiungi autore</a>
    </div>

    <table class="table table-hover align-middle my-4">
        <thead class="table-dark border-bottom">
            <tr>
                <th class="py-3">Nome</th>
                <th class="py-3">Numero di ricette</th>
                <th class="py-3"></th>
                <th class="py-3"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td class="py-3">{{ $author->name }}</td>
                    <td class="py-3">{{ $author->recipes_count }}</td>
                    <td class="py-3">
                        <a href="{{ route('authors.show', $author->id) }}" class="btn btn-outline-primary display-on-line">
                            Dettagli
                        </a>
                    </td>
                    <td class="py-3">
                        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-outline-warning display-on-line">
                            Modifica
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection