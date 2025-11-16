<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $films = Film::latest()->take(8)->get();
        $movies = Film::whereNotIn('id', $films->pluck('id'))->inRandomOrder()->take(4)->get();

        $topMovies = Film::select('films.*', DB::raw('COUNT(rentals.id) as total_rented'))
            ->leftJoin('rentals', 'films.id', '=', 'rentals.film_id')
            ->groupBy('films.id')
            ->orderByDesc('total_rented')
            ->limit(8)
            ->get();

        session(['top_movie_ids' => $topMovies->pluck('id')->toArray()]);

        return view('home', compact('films', 'movies', 'topMovies'));
    }
}
