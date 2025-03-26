<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'release_date',
        'genre',
        'poster_path',
        'director',
        'cast',
        'average_rating',
    ];

    protected $casts = [
        'release_date' => 'date',
        'average_rating' => 'float',
    ];
}
