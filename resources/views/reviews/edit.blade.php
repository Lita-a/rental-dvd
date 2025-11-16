@extends('layouts.app')

@section('content')
<div class="container px-6 py-12 mx-auto">
    <div class="max-w-xl p-6 mx-auto bg-gray-800 rounded-lg">
        <h2 class="mb-4 text-xl font-semibold text-yellow-400">Edit Review</h2>

        <form action="{{ route('reviews.update', $review->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label class="block text-sm text-gray-300">Rating (1-5)</label>
            <select name="rating" required class="w-full p-2 mt-1 text-gray-900 rounded">
                @for($i=1; $i<=5; $i++)
                    <option value="{{ $i }}" {{ $review->rating == $i ? 'selected' : '' }}>{{ $i }} ⭐</option>
                @endfor
            </select>

            <label class="block mt-3 text-sm text-gray-300">Komentar (opsional)</label>
            <textarea name="comment" class="w-full p-2 mt-1 text-gray-900 rounded" rows="5">{{ old('comment', $review->comment) }}</textarea>

            <div class="flex gap-2 mt-4">
                <button type="submit" class="px-4 py-2 text-gray-900 bg-yellow-400 rounded">Simpan</button>
                <a href="{{ url()->previous() }}" class="px-4 py-2 text-gray-200 bg-gray-700 rounded">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
