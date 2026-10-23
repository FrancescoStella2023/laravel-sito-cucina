<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\RecipeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('adminDashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource("recipes", RecipeController::class)->middleware(['auth', 'verified']);
Route::resource("authors", AuthorController::class)->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
