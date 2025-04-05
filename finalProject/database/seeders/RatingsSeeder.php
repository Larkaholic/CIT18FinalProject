<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Rating;
use App\Models\Movie;
use Faker\Factory as Faker;

class RatingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a few initial users
        User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('ABCde_123'),
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'password' => bcrypt('ABCde_123'),
        ]);

        User::create([
            'name' => 'Juan Dela Cruz',
            'email' => 'juan.dela.cruz@example.com',
            'password' => bcrypt('ABCde_123'),
        ]);

        User::create([
            'name' => 'Maria Dela Cruz',
            'email' => 'maria.dela.cruz@example.com',
            'password' => bcrypt('ABCde_123'),
        ]);

        $faker = Faker::create();
        $movies = Movie::all()->pluck('id')->toArray();
        $users = User::all()->pluck('id')->toArray();

        // Seed dummy ratings
        for ($i = 0; $i < 300; $i++) {
            Rating::create([
                'user_id' => $faker->randomElement($users),
                'movie_id' => $faker->randomElement($movies),
                'rating' => $faker->numberBetween(1, 10),
                'review' => $faker->optional()->paragraph(3),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }

        // Recalculate average ratings for movies
        foreach (Movie::all() as $movie) {
            $averageRating = $movie->ratings()->avg('rating');
            $movie->update(['average_rating' => round($averageRating, 1)]);
        }
    }
}
