<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RentalController extends Controller
{
    public function addToCheckout(Film $film)
    {
        if (!Auth::check()) return redirect()->route('login');

        $cart = session('checkout_cart', []);

        if (!in_array($film->id, array_column($cart, 'id'))) {
            $topMovieIds = session('top_movie_ids', []);
            $isDiscounted = in_array($film->id, $topMovieIds);

            $cart[] = [
                'id'             => $film->id,
                'title'          => $film->title,
                'genre'          => $film->genre,
                'price'          => $film->price,
                'original_price' => $film->price,
                'discount'       => $isDiscounted ? 20 : 0,
                'image'          => $film->image ? asset('storage/' . $film->image) : 'https://via.placeholder.com/300x450?text=No+Image',
                'top_movie'      => $isDiscounted,
            ];
        }

        session(['checkout_cart' => $cart]);
        return redirect()->route('rentals.checkout');
    }

    public function removeFromCheckout($filmId)
    {
        $cart = session('checkout_cart', []);
        $cart = array_values(array_filter($cart, fn($f) => $f['id'] != $filmId));
        session(['checkout_cart' => $cart]);
        return redirect()->route('rentals.checkout');
    }

    public function checkout()
    {
        return view('rentals.checkout', ['cart' => session('checkout_cart', [])]);
    }

    public function store(Request $request)
    {
        if (!Auth::check()) return redirect()->route('login');

        $request->validate([
            'rent_start' => 'required|date|after_or_equal:today',
            'duration'   => 'required|integer|min:1|max:3',
        ]);

        $cart = session('checkout_cart', []);
        if (empty($cart)) return redirect()->route('films.index')->with('error', 'Keranjang sewa kosong.');

        $rentStart = Carbon::parse($request->rent_start);
        $duration  = (int) $request->duration;
        $dueAt     = $rentStart->copy()->addDays($duration);

        $rentals = [];
        foreach ($cart as $filmItem) {
            $film = Film::findOrFail($filmItem['id']);
            $pricePerDay = $film->price;
            $isTopMovie = $filmItem['top_movie'] ?? false;

            $totalPrice = $pricePerDay * $duration;
            if ($isTopMovie) {
                $totalPrice = round($totalPrice * 0.8);
            }

            $rentals[] = Rental::create([
                'user_id'     => Auth::id(),
                'film_id'     => $film->id,
                'duration'    => $duration,
                'total_price' => $totalPrice,
                'rented_at'   => $rentStart,
                'due_at'      => $dueAt,
                'status'      => 'active',
            ]);
        }

        session(['checkout_rentals' => collect($rentals)->pluck('id')->toArray()]);
        session()->forget('checkout_cart');

        return redirect()->route('rentals.success');
    }

    public function success()
    {
        $rentals = Rental::with('film')->whereIn('id', session('checkout_rentals', []))->get();
        session()->forget('checkout_rentals');

        return view('rentals.success', compact('rentals'));
    }
}
