@php
$contacts = [
    [
        'icon' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" /><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2" /></svg>',
        'title' => 'Alamat',
        'text' => 'Jl. Contoh No.123, Kota Contoh',
    ],
    [
        'icon' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.6 4.8a1 1 0 01-.252 1.064L8.414 12l3.354 3.354a1 1 0 011.064-.252l4.8 1.6a1 1 0 01.684.948V19a2 2 0 01-2 2h-1C7.82 21 3 16.18 3 11V6a2 2 0 012-2z" /></svg>',
        'title' => 'Telepon',
        'text' => '(021) 123-4567',
    ],
    [
        'icon' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0L4 8m4 4l4 4m6 0a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v8a2 2 0 002 2h12z" /></svg>',
        'title' => 'Email',
        'text' => 'info@contoh.com',
    ],
];
@endphp

<section id="kontak" class="container px-6 py-24 mx-auto text-center">
    <x-section-heading 
        title="Hubungi Kami" 
        subtitle="Silakan hubungi kami melalui informasi berikut" />

    <div class="grid grid-cols-1 gap-8 mt-12 sm:grid-cols-2 md:grid-cols-3">
        @foreach ($contacts as $item)
            <x-contact-card 
                :icon="$item['icon']" 
                :title="$item['title']" 
                :text="$item['text']" />
        @endforeach
    </div>
</section>
