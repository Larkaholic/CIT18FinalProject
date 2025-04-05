<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;


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

    public function getFormattedReleaseDateAttribute()
    {
        return $this->release_date->format('F j, Y');
    }

    public function scopeGenre($query, $genre)
    {
        return $query->where('genre', $genre);
    }

    public function setPosterPathAttribute($value)
    {
        $this->attributes['poster_path'] = 'images/' . $value;
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }

    public function favorites()
{
    return $this->belongsToMany(User::class, 'favorites', 'movie_id', 'user_id')->withTimestamps();
}
}
