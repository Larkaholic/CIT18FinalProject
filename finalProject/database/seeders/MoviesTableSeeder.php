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

        Movie::create([
            'title' => 'Mickey 17',
            'description' => 'Mickey 17, known as an "expendable," goes on a dangerous journey to colonize an ice planet.',
            'release_date' => '2025-03-07',
            'genre' => 'Sci-Fi, Comedy, Drama, Mystery & Thriller',
            'poster_path' => 'poster_mickey_oneseven.jpg',
            'director' => 'Bong Joon Ho',
            'cast' => 'Robert Pattinson, Naomi Ackie, Steven Yeun, Toni Collete, Mark Rufallo',
            'average_rating' => 7.0,
        ]);

        Movie::create([
            'title' => 'Black Bag',
            'description' => 'When intelligence agent Kathryn Woodhouse is suspected of betraying the nation, her husband - also a legendary agent - faces the ultimate test of whether to be loyal to his marriage, or his country.',
            'release_date' => '2025-03-14',
            'genre' => 'Drama, Mystery & Thriller',
            'poster_path' => 'poster_black_bag.jpg',
            'director' => 'Steven Soderbergh',
            'cast' => 'Cate Blanchett, Michael Fassbender, Marisa Abela, Tom Burke, Naomie Harris',
            'average_rating' => 7.3,
        ]);

        Movie::create([
            'title' => 'The Shawshank Redemption',
            'description' => 'A banker convicted of uxoricide forms a friendship over a quarter century with a hardened convict, while maintaining his innocence and trying to remain hopeful through simple compassion.',
            'release_date' => '1994-10-14',
            'genre' => 'Drama',
            'poster_path' => 'poster_shawshank_redemption.jpg',
            'director' => 'Frank Darabont',
            'cast' => 'Tim Robbins, Morgan Freeman, Bob Gunton, William Sadler',
            'average_rating' => 9.3,
        ]);

        Movie::create([
            'title' => 'The Godfather',
            'description' => 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.',
            'release_date' => '1972-03-24',
            'genre' => 'Crime, Drama',
            'poster_path' => 'poster_godfather.jpg',
            'director' => 'Francis Ford Coppola',
            'cast' => 'Marlon Brando, Al Pacino, James Caan, Diane Keaton',
            'average_rating' => 9.2,
        ]);

        Movie::create([
            'title' => 'Pulp Fiction',
            'description' => 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.',
            'release_date' => '1994-10-14',
            'genre' => 'Crime, Drama',
            'poster_path' => 'poster_pulp_fiction.jpg',
            'director' => 'Quentin Tarantino',
            'cast' => 'John Travolta, Uma Thurman, Samuel L. Jackson, Bruce Willis',
            'average_rating' => 8.9,
        ]);

        Movie::create([
            'title' => 'The Dark Knight',
            'description' => 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.',
            'release_date' => '2008-07-18',
            'genre' => 'Action, Crime, Drama',
            'poster_path' => 'poster_dark_knight.jpg',
            'director' => 'Christopher Nolan',
            'cast' => 'Christian Bale, Heath Ledger, Aaron Eckhart, Michael Caine',
            'average_rating' => 9.0,
        ]);

        Movie::create([
            'title' => 'Inception',
            'description' => 'A thief who steals corporate secrets through use of dream-sharing technology is given the inverse task of planting an idea into the mind of a CEO.',
            'release_date' => '2010-07-16',
            'genre' => 'Action, Sci-Fi, Thriller',
            'poster_path' => 'poster_inception.jpg',
            'director' => 'Christopher Nolan',
            'cast' => 'Leonardo DiCaprio, Joseph Gordon-Levitt, Elliot Page, Tom Hardy',
            'average_rating' => 8.8,
        ]);

        Movie::create([
            'title' => 'Parasite',
            'description' => 'Greed and class discrimination threaten the newly formed symbiotic relationship between the wealthy Park family and the destitute Kim clan.',
            'release_date' => '2019-10-25',
            'genre' => 'Comedy, Drama, Thriller',
            'poster_path' => 'poster_parasite.jpg',
            'director' => 'Bong Joon-ho',
            'cast' => 'Song Kang-ho, Lee Sun-kyun, Cho Yeo-jeong, Choi Woo-shik',
            'average_rating' => 8.5,
        ]);

        Movie::create([
            'title' => 'Spirited Away',
            'description' => 'During her family\'s move to a new house, a sullen 10-year-old girl wanders into a world ruled by gods, witches, and spirits, and where humans are changed into beasts.',
            'release_date' => '2001-07-20',
            'genre' => 'Animation, Adventure, Family',
            'poster_path' => 'poster_spirited_away.jpg',
            'director' => 'Hayao Miyazaki',
            'cast' => 'Rumi Hiiragi, Miyu Irino, Mari Natsuki, Takashi Naito',
            'average_rating' => 8.6,
        ]);

        Movie::create([
            'title' => '65',
            'description' => 'After a catastrophic crash on an unknown planet, pilot Mills quickly discovers he\'s actually stranded on Earth...65 million years ago.',
            'release_date' => '2023-03-10',
            'genre' => 'Action, Adventure, Sci-Fi',
            'poster_path' => 'poster_six_five.jpg',
            'director' => 'Scott Beck, Bryan Woods',
            'cast' => 'Adam Driver, Ariana Greenblatt, Chloe Coleman',
            'average_rating' => 5.4,
        ]);

        Movie::create([
            'title' => 'Ant-Man and the Wasp: Quantumania',
            'description' => 'Super-Hero partners Scott Lang and Hope van Dyne, along with Hope\'s parents Hank Pym and Janet van Dyne, find themselves exploring the Quantum Realm, interacting with strange new creatures and embarking on an adventure that will push them beyond the limits of what they thought possible.',
            'release_date' => '2023-02-17',
            'genre' => 'Action, Adventure, Comedy',
            'poster_path' => 'poster_antman_and_the_wasp_quantumania.jpg',
            'director' => 'Peyton Reed',
            'cast' => 'Paul Rudd, Evangeline Lilly, Jonathan Majors, Michelle Pfeiffer',
            'average_rating' => 6.1,
        ]);

        Movie::create([
            'title' => 'The Flash',
            'description' => 'Barry Allen travels back in time to prevent his mother\'s murder, which brings unintended consequences to his timeline.',
            'release_date' => '2023-06-16',
            'genre' => 'Action, Adventure, Sci-Fi',
            'poster_path' => 'poster_the_flash.jpg',
            'director' => 'Andy Muschietti',
            'cast' => 'Ezra Miller, Michael Keaton, Sasha Calle, Michael Shannon',
            'average_rating' => 6.7,
        ]);

        Movie::create([
            'title' => 'Transformers: Rise of the Beasts',
            'description' => 'During the 1990s, the Maximals, Predacons and Terrorcons join the existing battle on Earth between Autobots and Decepticons.',
            'release_date' => '2023-06-09',
            'genre' => 'Action, Adventure, Sci-Fi',
            'poster_path' => 'poster_transformers_rise_of_the_beasts.jpg',
            'director' => 'Steven Caple Jr.',
            'cast' => 'Anthony Ramos, Dominique Fishback, Peter Cullen, Ron Perlman',
            'average_rating' => 5.8,
        ]);

        Movie::create([
            'title' => 'Hypnotic',
            'description' => 'A detective investigating the disappearance of his daughter finds himself enmeshed in a mystery involving a secret government program and a dangerous hypnotist.',
            'release_date' => '2023-05-12',
            'genre' => 'Action, Mystery, Thriller',
            'poster_path' => 'poster_hypnotic.jpg',
            'director' => 'Robert Rodriguez',
            'cast' => 'Ben Affleck, Alice Braga, J.D. Pardo, William Fichtner',
            'average_rating' => 5.5,
        ]);
    }
}
