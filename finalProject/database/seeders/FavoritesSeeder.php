<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Movie;
use App\Models\Favorite;
use Faker\Factory as Faker;

class FavoritesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $users = User::all()->pluck('id')->toArray();
        $movies = Movie::all()->pluck('id')->toArray();

        if (empty($users) || empty($movies)) {
            $this->command->warn('No users or movies found. Please run the UserSeeder and MoviesTableSeeder first.');
            return;
        }

        $numberOfFavoritesToCreate = 150;

        for ($i = 0; $i < $numberOfFavoritesToCreate; $i++) {
            $userId = $faker->randomElement($users);
            $movieId = $faker->randomElement($movies);

            // Ensure a user doesn't favorite the same movie multiple times
            $existingFavorite = Favorite::where('user_id', $userId)
                ->where('movie_id', $movieId)
                ->first();

            if (!$existingFavorite) {
                Favorite::create([
                    'user_id' => $userId,
                    'movie_id' => $movieId,
                    'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                    'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
                ]);
            }
        }

        $this->command->info('Dummy favorites created successfully.');
    }
}