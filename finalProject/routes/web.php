<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){

    Route::get('/', function () {
        return view('welcome');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    Route::get('/search', [MovieController::class, 'search'])->name('search');

    Route::get('/genres/{genre?}', [MovieController::class, 'showGenre'])->name('genres');

    Route::get('/movies/{id}', [MovieController::class, 'showDetails'])->name('movie_details');

    Route::post('/movies/{movie}/favorite', [MovieController::class, 'favorite'])->name('favorite');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
