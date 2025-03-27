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
            ->get();

        return view('search', compact('movies', 'query'));
    }

    public function showGenre(Request $request, $genre = null)
    {
        $genres = Movie::pluck('genre')->flatMap(function ($genres) {
            return explode(', ', $genres);
        })->unique()->toArray();

        if ($genre) {
            $movies = Movie::where('genre', 'like', '%' . $genre . '%')->get();
            return view('genres', compact('genres', 'movies', 'genre'));
        } else {
            return view('genres', compact('genres'));
        }
    }
}
