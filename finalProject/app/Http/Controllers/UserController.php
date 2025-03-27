<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\User;
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
}