<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $movies = Movie::where('title', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->orWhere('release_date', 'like', "%$query%")
            ->orWhere('director', 'like', "%$query%")
            ->orWhere('cast', 'like', "%$query%")
            ->get();

        return view('search', compact('movies', 'query'));
    }

    public function showDetails($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movie_details', compact('movie'));
    }

    public function showGenre(Request $request, $genre = null)
    {
        $genres = Movie::pluck('genre')->flatMap(function ($genres) {
            return explode(', ', $genres);
        })->unique()->sort()->toArray();

        // Add "All" genre for default view
        array_unshift($genres, 'All');

        if ($genre && $genre !== 'All') {
            $movies = Movie::where('genre', 'like', '%' . $genre . '%')
                ->orderBy('title')
                ->get();
            return view('genres', compact('genres', 'movies', 'genre'));
        } elseif ($genre === 'All' || $genre === null) {
            $movies = Movie::orderBy('title')->get();
            return view('genres', compact('genres', 'movies', 'genre'));
        } else {
            return view('genres', compact('genres'));
        }
    }
}
