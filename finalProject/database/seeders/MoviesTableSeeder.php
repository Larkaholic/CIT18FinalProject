<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::create([
            'title' => 'Avatar: The Way of Water',
            'description' => 'Jake Sully lives with his newfound family formed on the extrasolar moon Pandora. Once a familiar threat returns to finish what was previously started, Jake must work with Neytiri and the army of the Na\'vi race to protect their home.',
            'release_date' => '2022-12-16',
            'genre' => 'Sci-Fi,Action, Adventure, Fantasy',
            'poster_path' => 'poster_avatar_the_way_of_water.jpg',
            'director' => 'James Cameron',
            'cast' => 'Sam Worthington, Zoe Saldaña, Sigourney Weaver, Stephen Lang, Cliff Curtis',
            'average_rating' => 7.5,
        ]);

        Movie::create([
            'title' => 'Captain America: Brave New World',
            'description' => 'Sam Wilson has officially taken up the mantle of Captain America. After meeting with newly elected U.S. President Thaddeus Ross, Sam finds himself in the middle of an international incident. He must discover the reason behind a nefarious global plot before the true mastermind has the entire world seeing red.',
            'release_date' => '2025-02-14',
            'genre' => 'Action, Adventure, Fantasy',
            'poster_path' => 'poster_captain_america_brave_new_world.jpg',
            'director' => 'Julius Onah',
            'cast' => 'Anthony Mackie, Harrison Ford, Tim Blake Nelson, Danny Ramirez, Giancarlo Esposito',
            'average_rating' => 5.9,
        ]);

        Movie::create([
            'title' => 'Mufasa: The Lion King',
            'description' => 'Mufasa, a cub lost and alone, meets a sympathetic lion named Taka, the heir to a royal bloodline. The chance meeting sets in motion an expansive journey of an extraordinary group of misfits searching for their destiny--their bonds will be tested as they work together to evade a threatening and deadly foe.',
            'release_date' => '2024-12-20',
            'genre' => 'Kids & Family, Adventure, Drama, Animation',
            'poster_path' => 'poster_mufasa_the_lion_king.jpg',
            'director' => 'Barry Jenkins',
            'cast' => 'Aaron Pierre, Kelvin Harrison Jr., Tiffany Boone, Kagiso Lediga, Preston Nyman',
            'average_rating' => 6.6,
        ]);

        Movie::create([
            'title' => 'Wicked',
            'description' => 'Elphaba, a young woman ridiculed for her green skin, and Galinda, a popular girl, become friends at Shiz University in the Land of Oz. After an encounter with the Wonderful Wizard of Oz, their friendship reaches a crossroads.',
            'release_date' => '2024-11-27',
            'genre' => 'Kids & Family, Musical, Fantasy, Adventure',
            'poster_path' => 'poster_wicked.jpg',
            'director' => 'Jon M. Chu',
            'cast' => 'Cynthia Erivo, Ariana Grande, Jonathan Bailey, Ethan Slater, Bowen Yang',
            'average_rating' => 7.5,
        ]);
    }
}
