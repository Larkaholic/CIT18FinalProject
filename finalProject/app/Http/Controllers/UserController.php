<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function myLists()
    {
        $user = Auth::user();

        $favoriteMovies = $user->User::favorites()->get();
        $watchlistedMovies = $user->User::watchlists()->get();

        return view('my_lists', compact('favoriteMovies', 'watchlistedMovies'));
    }
}