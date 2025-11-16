<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Film $film)
    {
        $validated = $request->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        $existingReview = Review::where('user_id', Auth::id())
            ->where('film_id', $film->id)
            ->first();

        if ($existingReview) {
            return back()->with('success', 'Kamu sudah memberi review untuk film ini.');
        }

        Review::create([
            'user_id' => Auth::id(),
            'film_id' => $film->id,
            'rating'  => $validated['rating'],
            'comment' => $validated['comment'] ?? null,
        ]);

        return back()->with('success', 'Review berhasil dikirim!');
    }

    public function edit(Review $review)
    {
        $this->authorize('update', $review);
        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $this->authorize('update', $review);

        $validated = $request->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        $review->update($validated);

        return back()->with('success', 'Review berhasil diperbarui!');
    }

    public function destroy(Review $review)
    {
        $this->authorize('delete', $review);
        $review->delete();

        return back()->with('success', 'Review berhasil dihapus!');
    }
}
