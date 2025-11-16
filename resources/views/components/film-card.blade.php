@props(['film'])

@php
use Illuminate\Support\Str;

$imageSrc = $film->image_url
    ?? ($film->image 
        ? (Str::startsWith($film->image, ['http://','https://']) 
            ? $film->image 
            : asset('storage/' . $film->image)) 
        : 'https://via.placeholder.com/300x450?text=No+Image');

$isAdmin = auth()->check() && auth()->user()->is_admin;
$userHasReviewed = auth()->check() 
    ? $film->reviews->where('user_id', auth()->id())->first() 
    : null;
@endphp

<div class="relative flex flex-col justify-between h-full overflow-hidden transition duration-300 transform bg-gray-800 rounded-lg shadow-lg hover:scale-105 hover:shadow-xl">

    @if($film->top_movie ?? false)
        <div class="absolute left-0 z-10 px-2 py-1 text-xs font-bold text-white bg-red-600 rounded-l top-2">
            20% OFF
        </div>
    @endif

    <img src="{{ $imageSrc }}" 
         alt="{{ $film->title }}" 
         class="object-cover object-top w-full bg-gray-700 rounded-t-lg h-72">

    <div class="flex flex-col justify-between flex-1 p-5 bg-gray-900">
        <div>
            <h3 class="mb-2 text-lg font-semibold text-yellow-400">{{ $film->title }}</h3>
            <p class="mb-3 text-sm text-gray-400">{{ $film->genre }}</p>

            @if(!$isAdmin)

                @if($film->reviews->count() > 0)
                    <p class="mb-2 text-sm text-yellow-300">
                        ⭐ {{ number_format($film->averageRating(), 1) }} / 5 
                        <span class="text-gray-400">({{ $film->reviews->count() }} ulasan)</span>
                    </p>
                @else
                    <p class="mb-2 text-sm text-gray-400">Belum ada rating</p>
                @endif

                @auth
                    @if(!$userHasReviewed)
                        <form action="{{ route('films.review', $film->id) }}" method="POST" class="space-y-2">
                            @csrf
                            <select name="rating" required class="w-full p-1 text-gray-900 rounded">
                                <option value="">Pilih rating</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }} ⭐</option>
                                @endfor
                            </select>

                            <textarea name="comment" rows="2" placeholder="Tulis komentar..." class="w-full p-2 text-sm text-gray-900 rounded"></textarea>

                            <button type="submit" class="w-full py-1 text-sm font-semibold text-gray-900 bg-yellow-400 rounded hover:bg-yellow-300">
                                Kirim Review
                            </button>
                        </form>
                    @else
                        <div class="mt-2 text-sm text-gray-300">
                            <p><strong>Kamu sudah review:</strong> ⭐ {{ $userHasReviewed->rating }}</p>
                            <p>{{ Str::limit($userHasReviewed->comment, 80) }}</p>
                            <div class="flex gap-2 mt-2">
                                <a href="{{ route('reviews.edit', $userHasReviewed->id) }}" class="px-2 py-1 text-xs font-medium bg-blue-600 rounded hover:bg-blue-500">Edit</a>

                                <form action="{{ route('reviews.destroy', $userHasReviewed->id) }}" method="POST" onsubmit="return confirm('Hapus review?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 text-xs font-medium bg-red-600 rounded hover:bg-red-500">Hapus</button>
                                </form>
                            </div>
                        </div>
                    @endif
                @else
                    <p class="text-sm text-gray-400">Login untuk memberi rating.</p>
                @endauth
            @endif
        </div>

        @if($isAdmin)
            <div class="flex gap-2 mt-4">
                <a href="{{ route('films.edit', $film->id) }}" class="flex-1 py-2 font-semibold text-center text-gray-900 bg-yellow-400 rounded-lg hover:bg-yellow-300">
                    Edit
                </a>
                <form action="{{ route('films.destroy', $film->id) }}" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full py-2 font-semibold text-gray-900 bg-red-400 rounded-lg hover:bg-red-300">
                        Hapus
                    </button>
                </form>
            </div>
        @else
            <a href="{{ route('checkout.add', $film->id) }}" 
               class="block w-full py-2 mt-4 font-semibold text-center text-gray-900 transition bg-yellow-400 rounded hover:bg-yellow-300">
                Sewa
            </a>
        @endif
    </div>
</div>
