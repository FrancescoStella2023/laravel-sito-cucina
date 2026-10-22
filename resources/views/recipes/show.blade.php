@extends("layouts.recipe")

@section("title", "ciao")

@section("content")

    <div class="d-flex flex-column bg-dark text-white rounded p-4 my-3">
        <h4 class="fw-b">{{ $recipe->title }}</h4>
        <p>{{ $recipe->description }}</p>
    </div>


    <div class="container-fluid d-flex justify-content-center">
        <a href="{{ route('recipes.index') }}" class="btn btn-outline-primary">
            Back
        </a>
    </div>

@endsection