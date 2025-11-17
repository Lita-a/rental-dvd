@props(['topMovies'])

<section class="container px-6 py-16 mx-auto">
    <x-section-heading 
        title="Top Movies" 
        subtitle="Film paling banyak disewa minggu ini!" 
        color="yellow" 
    />

    <div class="grid grid-cols-1 gap-8 mt-12 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($topMovies as $movie)
            <x-home.top-movie-card 
                :title="$movie->title"
                :genre="$movie->genre"
                :image="$movie->image ?: 'https://via.placeholder.com/300x450?text=No+Image'"
                :alt="$movie->title"
                :link="route('checkout.add', $movie->id)"
            />
        @endforeach
    </div>
</section>
