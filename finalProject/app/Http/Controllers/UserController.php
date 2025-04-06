<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\User;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function myWatchlist()
    {
        $user = Auth::user();

        $watchlistedMovies = $user->watchlists()
            ->orderBy('created_at', 'asc')
            ->get();

        return view('my_lists', compact('watchlistedMovies'));
    }

    public function myFavorites()
    {
        $user = Auth::user();

        $favoriteMovies = $user->favorites()
            ->orderBy('created_at', 'asc')
            ->get();

        return view('my_favorites', compact('favoriteMovies'));
    }

    public function myRatings()
    {
        $user = Auth::user();

        $ratingReviews = $user->ratings()
            ->with('movie')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('my_ratings', compact('ratingReviews'));
    }

    public function deleteRating(Rating $rating)
    {
        if ($rating->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $rating->delete();

        return redirect()->route('my_ratings')->with('success', 'Rating deleted successfully.');
    }
}