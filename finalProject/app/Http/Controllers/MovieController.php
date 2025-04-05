<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Favorite;
use App\Models\Watchlist;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

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

        $isFavorite = false;
        if (Auth::check()) {
            $isFavorite = Favorite::where('user_id', Auth::id())
                ->where('movie_id', $movie->id)
                ->exists();
        }

        $isWatchlist = false;
        if (Auth::check()) {
            $isWatchlist = Watchlist::where('user_id', Auth::id())
                ->where('movie_id', $movie->id)
                ->exists();
        }

        $userRating = null;
            if (Auth::check()) {
                $userRating = Rating::where('user_id', Auth::id())
                    ->where('movie_id', $movie->id)
                    ->first();
            }

        $otherRatings = Rating::where('movie_id', $movie->id)
        ->where('user_id', '!=', Auth::id()) // Exclude current user
        ->with('user')
        ->latest() // Sort by most recent
        ->get();

        return view('movie_details', compact('movie', 'isFavorite', 'isWatchlist', 'userRating', 'otherRatings'));
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

    public function favorite(Request $request, Movie $movie)
    {
        $user = Auth::user();

        $favorite = Favorite::where('user_id', $user->id)->where('movie_id', $movie->id)->first();

        if ($favorite) {
            $favorite->delete();
        } else {
            Favorite::create(['user_id' => $user->id, 'movie_id' => $movie->id]);
        }

        return redirect()->route('movie_details', $movie->id);
    }

    public function watchlist(Request $request, Movie $movie)
    {
        $user = Auth::user();

        $watchlist = Watchlist::where('user_id', $user->id)->where('movie_id', $movie->id)->first();

        if ($watchlist) {
            $watchlist->delete();
        } else {
            Watchlist::create(['user_id' => $user->id, 'movie_id' => $movie->id]);
        }

        return redirect()->route('movie_details', $movie->id);
    }

    public function rate(Request $request, Movie $movie)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:10',
            'review' => 'nullable|string',
        ]);
    
        $user = Auth::user();
    
        Rating::updateOrCreate(
            ['user_id' => $user->id, 'movie_id' => $movie->id],
            ['rating' => $request->rating, 'review' => $request->review]
        );
    
        return redirect()->route('movie_details', $movie->id);
    }
}
