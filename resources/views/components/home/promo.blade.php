@php
$promos = [
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10"><path stroke-linecap="round" stroke-linejoin="round" d="M9 14l2-2 4 4m0-4l-4 4-2-2" /></svg>',
        'title' => 'Sewa 2 Gratis 1',
        'description' => 'Sewa 2 film dan dapatkan 1 film gratis favoritmu.'
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>',
        'title' => 'Diskon 20% Top Movie Minggu Ini',
        'description' => 'Nikmati diskon 20% untuk film-film terpopuler minggu ini.'
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>',
        'title' => 'Hadiah Merchandise Eksklusif',
        'description' => 'Kumpulkan poin dari setiap sewa dan tukarkan dengan merchandise eksklusif.'
    ],
];
@endphp

<section id="promo" class="container px-6 py-24 mx-auto text-center">
    <x-section-heading 
        title="Promo Spesial Minggu Ini!" 
        subtitle="Dapatkan film favoritmu dengan promo menarik setiap minggu!" />

    <div class="grid grid-cols-1 gap-8 mt-12 text-center sm:grid-cols-2 md:grid-cols-3">
        @foreach ($promos as $promo)
            <x-promo-card 
                :icon="$promo['icon']"
                :title="$promo['title']"
                :description="$promo['description']" />
        @endforeach
    </div>
</section>
