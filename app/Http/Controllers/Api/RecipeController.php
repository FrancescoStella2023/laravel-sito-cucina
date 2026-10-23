<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    function index()
    {
        $recipes = Recipe::with('author')->get();

        return response()->json($recipes);
    }

    function show(Recipe $recipe)
    {
        $recipe->load('author');

        return response()->json($recipe);
    }
}
