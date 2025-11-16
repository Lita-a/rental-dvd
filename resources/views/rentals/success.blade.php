@extends('layouts.app')

@section('content')
<section class="container px-6 py-16 mx-auto">
    <x-section-heading 
        title="Sewa Berhasil!" 
        subtitle="Berikut detail film yang berhasil kamu sewa" 
        color="green" />

    @if($rentals->count() > 0)
        <div class="max-w-4xl mx-auto mt-8 space-y-4">
            @php $totalPrice = 0; @endphp
            @foreach($rentals as $rental)
                @php 
                    $film = $rental->film;
                    $totalPrice += $rental->total_price;

                    $imageSrc = $film->image 
                                ? (Str::startsWith($film->image, ['http://','https://']) 
                                    ? $film->image 
                                    : asset('storage/' . $film->image)) 
                                : 'https://via.placeholder.com/100x150?text=No+Image';
                @endphp

                <div class="flex items-center p-3 bg-gray-900 rounded-lg">
                    <img src="{{ $imageSrc }}" alt="{{ $film->title }}" class="object-cover w-20 mr-4 rounded h-28">

                    <div class="flex-1">
                        <h4 class="font-semibold text-white">{{ $film->title }}</h4>
                        <p class="text-gray-400">{{ $film->genre }}</p>
                        <p class="text-gray-300">
                            Durasi: <strong>{{ $rental->duration }} hari</strong><br>
                            Tanggal Sewa: {{ $rental->rented_at->format('d M Y') }}<br>
                            Tanggal Kembali: {{ $rental->due_at->format('d M Y') }}
                        </p>
                        <p class="font-semibold text-yellow-400">
                            Rp {{ number_format($rental->total_price,0,',','.') }}
                        </p>
                    </div>
                </div>
            @endforeach

            <div class="flex items-center justify-between p-4 mt-6 bg-gray-900 rounded-lg">
                <p class="text-lg font-semibold text-white">Total Harga Keseluruhan:</p>
                <p class="text-lg font-bold text-yellow-400">Rp {{ number_format($totalPrice,0,',','.') }}</p>
            </div>

            <div class="mt-6">
                <x-button link="{{ route('films.index') }}" 
                    class="w-full py-2 font-semibold text-gray-900 bg-green-400 rounded hover:bg-green-300">
                    Kembali ke Koleksi Film
                </x-button>
            </div>
        </div>
    @else
        <p class="py-10 text-center text-gray-300">Tidak ada film yang disewa.</p>
        <div class="mt-4">
            <x-button link="{{ route('films.index') }}" 
                class="w-full py-2 font-semibold text-gray-900 bg-green-400 rounded hover:bg-green-300">
                Kembali ke Koleksi Film
            </x-button>
        </div>
    @endif
</section>
@endsection
