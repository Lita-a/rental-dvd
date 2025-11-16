@props(['topMovies'])

<section class="container px-6 py-16 mx-auto">
    <x-section-heading 
        title="Top Movies" 
        subtitle="Film paling banyak disewa minggu ini!" 
        color="yellow" 
    />

    <div class="grid grid-cols-1 gap-8 mt-12 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($topMovies as $movie)
            <div class="relative">
                <span class="absolute px-2 py-1 text-xs font-bold text-white bg-red-600 rounded top-2 left-2">
                    20% Discount
                </span>
                
                <x-top-movie-card 
                    :title="$movie->title"
                    :genre="$movie->genre"
                    :image="$movie->image ?: 'https://via.placeholder.com/300x450?text=No+Image'"
                    :alt="$movie->title"
                    :link="route('checkout.add', $movie->id)"
                />
            </div>
        @endforeach
    </div>
</section>
