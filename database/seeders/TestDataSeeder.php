<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Session;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create('ru_RU');

        // GENRES - Жанр
        $genres = ['драма', 'комедия', 'боевик', 'ужасы', 'фантастика', 'триллер', 'детектив', 'мелодрама', 'приключения', 'фэнтези', 'вестерн'];

        $genresTable = [];
        foreach ($genres as $genre) {
            $gnr = Genre::create([
                'name' => $genre,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $genresTable[] = $gnr;
        }

        // MOVIES - Кино
        $url = config('app.url');

        $films = [
            [
                'name' => 'Праздники',
                'image' => $url . '/storage/images/image 4.png',
            ],
            [
                'name' => 'Мег 2: Бездна',
                'image' => $url . '/storage/images/Group 862.png',
            ],
            [
                'name' => 'Заложники',
                'image' => $url . '/storage/images/Group 862 (1).png',
            ],
            [
                'name' => 'Леди Баг и Супер-Кот: Пробуждение силы',
                'image' => $url . '/storage/images/Group 862 (2).png',
            ],
            [
                'name' => 'Руслан и Людмила. Больше, чем сказка',
                'image' => $url . '/storage/images/Group 862 (3).png',
            ],
            [
                'name' => 'Аватар: Пламя и пепел (2025)',
                'image' => $url . '/storage/images/6dd37a9d6c63ac910f946ebafeed5.webp',
            ],
            [
                'name' => 'Убежище (2026)',
                'image' => $url . '/storage/images/fc3d1d2108c7bc1cbb577839dd254.webp',
            ],
            [
                'name' => 'Зверополис 2 (2025)',
                'image' => $url . '/storage/images/629f91dfe174c8e2ea7da9902c923.webp',
            ],
        ];

        $movies = [];
        foreach ($films as $film) {
            $movie = Movie::create([
                'name' => $film['name'],
                'image' => $film['image'],
                'description' => $faker->paragraph(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $randomGenres = $faker->randomElements($genresTable, rand(1, 3));
            $genreIds = array_map(fn($genre) => $genre->id, $randomGenres);
            $movie->genres()->attach($genreIds);

            $movies[] = $movie;
        }

        $dates = [];
        for ($i = 0; $i <= 6; $i++) {
            $dates[] = now()->addDays($i)->format('Y-m-d');
        }

        for ($i = 1; $i <= 20; $i++) {
            $randomMovie = $faker->randomElement($movies);
            $randomData = $faker->randomElement($dates);
            Session::create([
                'date' => $randomData,
                'time' => $faker->time(),
                'price' => rand(1500, 6000),
                'format' => $faker->randomElement(['2D', '3D', 'IMAX']),
                'hall' => rand(1, 5),
                'movie_id' => $randomMovie->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
