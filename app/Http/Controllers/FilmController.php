<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $query = Film::with(['reviews.user']);

        if ($search) {
            $query->where(fn($q) => $q->where('title', 'like', "%{$search}%")
                ->orWhere('genre', 'like', "%{$search}%"));
        }

        $films = $query->latest()->paginate(12)->withQueryString();

        $topMovies = Film::withCount('rentals')
            ->orderByDesc('rentals_count')
            ->take(5)
            ->pluck('id')
            ->toArray();
        session(['top_movie_ids' => $topMovies]);

        $cart = session('checkout_cart', []);

        return view('films.index', compact('films', 'search', 'cart'));
    }

    public function create(Request $request)
    {
        $page = $request->input('page', 1);
        $search = $request->input('search', '');
        $film = null;

        return view('films.create', compact('film', 'page', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('films', $filename, 'public');
            $imagePath = 'films/' . $filename;
        }

        Film::create([
            'user_id' => Auth::id(),
            'title'   => $request->title,
            'genre'   => $request->genre,
            'price'   => $request->price,
            'image'   => $imagePath,
        ]);

        $page = $request->input('page', 1);
        $search = $request->input('search', '');
        return redirect()->route('films.index', ['page' => $page, 'search' => $search])
            ->with('success', 'Film berhasil ditambahkan.');
    }

    public function edit(Film $film, Request $request)
    {
        $page = $request->input('page', 1);
        $search = $request->input('search', '');
        return view('films.edit', compact('film', 'page', 'search'));
    }

    public function update(Request $request, Film $film)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $film->image;
        if ($request->hasFile('image')) {
            if ($imagePath) Storage::disk('public')->delete($imagePath);
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('films', $filename, 'public');
            $imagePath = 'films/' . $filename;
        }

        $film->update([
            'title' => $request->title,
            'genre' => $request->genre,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        $page = $request->input('page', 1);
        $search = $request->input('search', '');
        return redirect()->route('films.index', ['page' => $page, 'search' => $search])
            ->with('success', 'Film berhasil diperbarui.');
    }

    public function destroy(Film $film, Request $request)
    {
        if ($film->image) Storage::disk('public')->delete($film->image);
        $film->delete();

        $page = $request->input('page', 1);
        $search = $request->input('search', '');
        return redirect()->route('films.index', ['page' => $page, 'search' => $search])
            ->with('success', 'Film berhasil dihapus.');
    }
}
