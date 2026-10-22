@extends("layouts.recipe")

@section("title", "Aggiungi ricetta")

@section("content")
    <div class="container-fluid d-flex justify-content-center my-2 gap-4">
        <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-outline-warning">
            Modifica Ricetta
        </a>
        <!-- Corretto: data-bs-toggle="modal" -->
        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Elimina Progetto
        </button>
    </div>

    <div class="d-flex flex-column bg-dark text-white rounded p-4 my-3">
        <div class="d-flex flex-column align-items-center text-center mb-4">
            <h4 class="fw-bold mb-3">{{ $recipe->title }}</h4>
            <img class="img-fluid w-25 rounded" src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->image }}">
        </div>
        <p>{{ $recipe->description }}</p>
    </div>


    <div class="container-fluid d-flex justify-content-center">
        <a href="{{ route('recipes.index') }}" class="btn btn-outline-primary">
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
                    <p>Un proggetto cancellato non puo essere recuperato. Sicuro di voler <strong>eliminare
                            definitivamente</strong> questo elemento?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                    <form action="{{ route('recipes.destroy', $recipe) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-outline-danger" value="ELIMINA DEFINITIVAMENTE">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection