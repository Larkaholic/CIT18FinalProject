<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){

    Route::get('/', function () {
        return view('welcome');
    });
});

Route::get('/my-reviews', function () {
    return view('my_reviews');
})->middleware(['auth', 'verified'])->name('my_reviews');

Route::middleware('auth')->group(function () {
    // Movie Navigation
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/search', [MovieController::class, 'search'])->name('search');
    Route::get('/genres/{genre?}', [MovieController::class, 'showGenre'])->name('genres');
    Route::get('/movies/{id}', [MovieController::class, 'showDetails'])->name('movie_details');

    // Lists Navigation
    Route::get('/my-watchlist', [UserController::class, 'myWatchlist'])->name('my_lists');
    Route::get('/my-favorites', [UserController::class, 'myFavorites'])->name('my_favorites');
    Route::get('/my-ratings', [UserController::class, 'myRatings'])->name('my_ratings');

    // User Interactions
    Route::post('/movies/{movie}/favorite', [MovieController::class, 'favorite'])->name('favorite');
    Route::post('/movies/{movie}/watchlist', [MovieController::class, 'watchlist'])->name('watchlist');
    Route::post('/movies/{movie}/rate', [MovieController::class, 'rate'])->name('rate');
    
    // User Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
