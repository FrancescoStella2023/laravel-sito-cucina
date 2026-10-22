@extends("layouts.recipe")

@section("title", "ciao")

@section("content")

    <table class="table table-hover align-middle my-5">
        <thead class="table-dark border-bottom">
            <tr>
                <th class="py-3">Titolo</th>
                <th class="py-3">Descrizion</th>
                <th class="py-3">Categoria</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection