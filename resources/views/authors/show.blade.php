@extends("layouts.recipe")

@section("title", "Aggiungi autore")

@section("content")
    <div class="container-fluid d-flex justify-content-center my-2 gap-4">
        <a href="{{ route('authors.edit', $author) }}" class="btn btn-outline-warning">
            Modifica Autore
        </a>
        <!-- Corretto: data-bs-toggle="modal" -->
        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Elimina Autore
        </button>
    </div>

    <div class="d-flex flex-column bg-dark text-white rounded p-4 my-3">
        <div class="d-flex flex-column align-items-center text-center mb-4">
            <h4 class="fw-bold mb-3">{{ $author->name }}</h4>

            <h5>Ricette associate:</h5>

            <ul class="list-group">
                @forelse ($author->recipes as $recipe)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>
                            #{{ $recipe->id }} - {{ $recipe->title }}
                        </span>

                        <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-outline-primary btn-sm">
                            Dettagli
                        </a>
                    </li>
                @empty
                    <li class="list-group-item">
                        Nessuna ricetta associata a questo autore.
                    </li>
                @endforelse
            </ul>
        </div>
    </div>


    <div class="container-fluid d-flex justify-content-center">
        <a href="{{ route('authors.index') }}" class="btn btn-outline-primary">
            Back
        </a>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-dark"> <!-- text-dark serve se lo sfondo della pagina è scuro -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Conferma eliminazione elemento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Un autore cancellato e le ricette annesse non potranno essere recuperate. Sicuro di volerle
                        <strong>eliminare
                            definitivamente</strong>?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                    <form action="{{ route('authors.destroy', $author) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-outline-danger" value="ELIMINA DEFINITIVAMENTE">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection