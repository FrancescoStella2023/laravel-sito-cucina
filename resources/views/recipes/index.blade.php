@extends("layouts.recipe")

@section("title", "-- Catalogo ricette --")

@section("content")

    <div class="container-fluid d-flex justify-content-center my-4">
        <a href="{{ route("recipes.create") }}" class="btn btn-outline-success btn-lg">Aggiungi ricetta</a>
    </div>

    <table class="table table-hover align-middle my-4">
        <thead class="table-dark border-bottom">
            <tr>
                <th class="py-3">Titolo</th>
                <th class="py-3">Descrizione</th>
                <th class="py-3"></th>
                <th class="py-3"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recipes as $recipe)
                <tr>
                    <td class="py-3">{{ $recipe->title }}</td>
                    <td class="py-3">{{ $recipe->description }}</td>
                    <td class="py-3">
                        <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-outline-primary display-on-line">
                            Dettagli
                        </a>
                    </td>
                    <td class="py-3">
                        <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-outline-warning display-on-line">
                            Modifica
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection