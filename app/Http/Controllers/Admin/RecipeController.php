<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::all();
        return view("recipes.index", compact("recipes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        return view("recipes.create", compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $new_recipe = new Recipe();

        $new_recipe->title = $data['title'];
        $new_recipe->description = $data['description'];
        $new_recipe->author_id = $data['author'];

        if (array_key_exists("image", $data)) {
            $img_url = Storage::putFile('recipes', $data['image']);
            $new_recipe->image = $img_url;
        }

        $new_recipe->save();

        return redirect()->route('recipes.show', $new_recipe);
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        return view("recipes.show", compact("recipe"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        $authors = Author::all();
        return view("recipes.edit", compact('recipe', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        $data = $request->all();

        $recipe->title = $data['title'];
        $recipe->description = $data['description'];
        $recipe->author_id = $data['author'];

        if (array_key_exists("image", $data)) {
            Storage::delete($recipe->image);
            $img_url = Storage::putFile('recipes', $data['image']);
            $recipe->image = $img_url;
        }

        $recipe->save();

        return redirect()->route('recipes.show', $recipe);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        Storage::delete($recipe->image);
        $recipe->delete();

        return redirect()->route('recipes.index');
    }
}
