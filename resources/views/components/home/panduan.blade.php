@php
    $steps = [
        [
            'step' => 1,
            'title' => 'Pilih Film',
            'description' => 'Telusuri koleksi film dan pilih yang ingin disewa.',
            'color' => 'bg-brand-purple',
        ],
        [
            'step' => 2,
            'title' => 'Bayar Sewa',
            'description' => 'Lakukan pembayaran melalui metode yang tersedia.',
            'color' => 'bg-brand-orange',
        ],
        [
            'step' => 3,
            'title' => 'Tonton Film',
            'description' => 'Nikmati film pilihanmu kapan saja dan di mana saja.',
            'color' => 'bg-brand-pink',
        ],
        [
            'step' => 4,
            'title' => 'Selesai',
            'description' => 'Selesai menonton, kamu bisa menyewa film lain.',
            'color' => 'bg-brand-yellow',
        ],
    ];
@endphp

<section id="panduan" class="container px-6 py-24 mx-auto text-center">
    <x-section-heading 
        title="Panduan Sewa Film"
        subtitle="Langkah mudah untuk menikmati film favoritmu"
    />

    <div class="grid grid-cols-1 gap-8 mt-12 sm:grid-cols-2 md:grid-cols-4">
        @foreach ($steps as $step)
            <x-panduan-step 
                :step="$step['step']"
                :title="$step['title']"
                :description="$step['description']"
                :color="$step['color']"
            />
        @endforeach
    </div>
</section>
