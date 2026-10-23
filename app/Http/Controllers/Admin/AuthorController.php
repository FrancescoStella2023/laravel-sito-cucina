<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::withCount('recipes')->get();
        ;
        return view("authors.index", compact("authors"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("authors.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $new_author = new Author();

        $new_author->name = $data['name'];

        $new_author->save();

        return redirect()->route('authors.show', $new_author);
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        $author->load('recipes');
        return view("authors.show", compact("author"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('authors.edit', compact("author"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $data = $request->all();

        $author->name = $data['name'];

        $author->save();

        return redirect()->route('authors.show', $author);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors.index');
    }
}
