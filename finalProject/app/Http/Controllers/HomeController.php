<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class HomeController extends Controller
{
    public function index()
    {
        // 10 Newly Added Movies
        $newMovies = Movie::orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        // Top 10 Most Loved Movies
        $favoriteMovies = Movie::withCount('favorites')
            ->orderByDesc('favorites_count')
            ->take(10)
            ->get();

        // Top 10 Highly Rated Movies
        $highlyRatedMovies = Movie::orderByDesc('average_rating')
            ->take(10)
            ->get();

        return view('home', compact('favoriteMovies', 'newMovies', 'highlyRatedMovies'));
    }
}
