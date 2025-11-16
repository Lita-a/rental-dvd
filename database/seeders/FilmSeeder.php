<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Film;

class FilmSeeder extends Seeder
{
    public function run(): void
    {
        $films = [
            [
                'title' => 'Dune: Part Two',
                'genre' => 'Science Fiction • Adventure • Action',
                'price' => 18000,
                'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/1pdfLvkbY9ohJlCjQH2CZjjYVvJ.jpg',
            ],
            [
                'title' => 'The Batman',
                'genre' => 'Action • Crime • Drama',
                'price' => 15000,
                'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/jlb7eOM3lGvPcDIyzyiV80bwHis.jpg',
            ],
            [
                'title' => 'Oppenheimer',
                'genre' => 'Biography • Drama • History',
                'price' => 20000,
                'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/bAFmcr3kEQrM2VJScJsk3W7MSzK.jpg',
            ],
            [
                'title' => 'Avatar: The Way of Water',
                'genre' => 'Science Fiction • Adventure',
                'price' => 17000,
                'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/t6HIqrRAclMCA60NsSmeqe9RmNV.jpg',
            ],
            [
                'title' => 'Guardians of the Galaxy Vol. 3',
                'genre' => 'Action • Comedy • Science Fiction',
                'price' => 16000,
                'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/r2J02Z2OpNTctfOSN1Ydgii51I3.jpg',
            ],
            [
                'title' => 'Spider-Man: Across the Spider-Verse',
                'genre' => 'Animation • Action • Adventure',
                'price' => 15000,
                'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/8Vt6mWEReuy4Of61Lnj5Xj704m8.jpg',
            ],
            [
                'title' => 'John Wick: Chapter 4',
                'genre' => 'Action • Thriller • Crime',
                'price' => 15000,
                'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/vZloFAK7NmvMGKE7VkF5UHaz0I.jpg',
            ],
            [
                'title' => 'Wonka',
                'genre' => 'Comedy • Family • Fantasy',
                'price' => 13000,
                'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/qhb1qOilapbapxWQn9jtRCMwXJF.jpg',
            ],
            [
                'title' => 'The Flash',
                'genre' => 'Action • Science Fiction',
                'price' => 14000,
                'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/rktDFPbfHfUbArZ6OOOKsXcv0Bm.jpg',
            ],
            [
                'title' => 'Mission: Impossible - Dead Reckoning Part One',
                'genre' => 'Action • Thriller • Adventure',
                'price' => 17000,
                'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/NNxYkU70HPurnNCSiCjYAmacwm.jpg',
            ],
            [
                'title' => 'Barbie',
                'genre' => 'Comedy • Adventure • Fantasy',
                'price' => 13000,
                'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/iuFNMS8U5cb6xfzi51Dbkovj7vM.jpg',
            ],
            [
                'title' => 'The Super Mario Bros. Movie',
                'genre' => 'Animation • Adventure • Family',
                'price' => 13000,
                'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/qNBAXBIQlnOThrVvA6mA2B5ggV6.jpg',
            ],
            [
                'title' => 'Elemental',
                'genre' => 'Animation • Comedy • Family',
                'price' => 12000,
                'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/4Y1WNkd88JXmGfhtWR7dmDAo1T2.jpg',
            ],
            [
                'title' => 'Transformers: Rise of the Beasts',
                'genre' => 'Action • Adventure • Science Fiction',
                'price' => 16000,
                'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/gPbM0MK8CP8A174rmUwGsADNYKD.jpg',
            ],
            [
                'title' => 'Fast X',
                'genre' => 'Action • Crime • Thriller',
                'price' => 16000,
                'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/fiVW06jE7z9YnO4trhaMEdclSiC.jpg',
            ],
            [
                'title' => 'The Marvels',
                'genre' => 'Action • Science Fiction • Adventure',
                'price' => 16000,
                'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/AgWgYlUy3K36X5kVfWkzqzQBz1V.jpg',
            ],
            [
                'title' => 'The Little Mermaid',
                'genre' => 'Family • Fantasy • Romance',
                'price' => 13000,
                'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/ym1dxyOk4jFcSl4Q2zmRrA5BEEN.jpg',
            ],
            [
                'title' => 'Black Panther: Wakanda Forever',
                'genre' => 'Action • Adventure • Drama',
                'price' => 16000,
                'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/sv1xJUazXeYqALzczSZ3O6nkH75.jpg',
            ],
            [
                'title' => 'Doctor Strange in the Multiverse of Madness',
                'genre' => 'Action • Adventure • Fantasy',
                'price' => 16000,
                'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/wRnbWt44nKjsFPrqSmwYki5vZtF.jpg',
            ],
            [
                'title' => 'The Matrix Resurrections',
                'genre' => 'Science Fiction • Action',
                'price' => 15000,
                'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/8c4a8kE7PizaGQQnditMmI1xbRp.jpg',
            ],
        ];

        foreach ($films as $film) {
            Film::create([
                'user_id' => 1,
                'title'   => $film['title'],
                'genre'   => $film['genre'],
                'price'   => $film['price'],
                'image'   => $film['image'],
            ]);
        }
    }
}
