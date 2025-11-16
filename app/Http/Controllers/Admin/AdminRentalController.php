<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Film;

class AdminRentalController extends Controller
{
    public function index()
    {

        $films = Film::withCount('rentals')
            ->orderByDesc('rentals_count')
            ->get()
            ->map(function ($film) {
                $film->total_rented = $film->rentals_count;
                return $film;
            });

        return view('admin.rentals.index', compact('films'));
    }

    public function topMovies()
    {

        $topMovies = Film::withCount('rentals')
            ->orderByDesc('rentals_count')
            ->take(8)
            ->get()
            ->map(function ($film) {
                $film->total_rented = $film->rentals_count;
                return $film;
            });

        session(['top_movie_ids' => $topMovies->pluck('id')->toArray()]);

        return view('admin.rentals.top', compact('topMovies'));
    }
}
