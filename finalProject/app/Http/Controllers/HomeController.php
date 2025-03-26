<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class HomeController extends Controller
{
    public function index()
    {
        // Popular Movies
        $popularMovies = Movie::orderBy('average_rating', 'desc')->take(10)->get();

        // Newly Added Movies
        $newMovies = Movie::orderBy('created_at', 'desc')->take(10)->get();

        // Movies by Genre
        $allGenres = Movie::pluck('genre')->flatMap(function ($genres) {
            return explode(', ', $genres);
        })->unique()->toArray();

        $genreMovies = [];

        foreach ($allGenres as $genre) {
            $genreMovies[$genre] = Movie::where('genre', 'like', '%' . $genre . '%')->take(10)->get();
        }

        return view('home', compact('popularMovies', 'newMovies', 'genreMovies'));
    }
}
