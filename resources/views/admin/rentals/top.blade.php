@extends('layouts.app')

@section('content')
<section class="container px-6 py-16 mx-auto">
    <h2 class="mb-6 text-2xl font-bold text-yellow-400">Top Movies</h2>

    <div class="mb-6">
        <a href="{{ route('admin.rentals.index') }}" 
           class="px-4 py-2 font-semibold text-gray-900 bg-yellow-300 rounded-full hover:bg-yellow-400">
            Kembali ke Semua Film
        </a>
    </div>

    <div class="grid grid-cols-1 gap-8 mt-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 auto-rows-fr">
        @foreach($topMovies as $film)
            <div class="p-4 bg-gray-800 border rounded">
                <img src="{{ $film->image_url 
                            ? $film->image_url 
                            : ($film->image ? asset('storage/' . $film->image) : 'https://via.placeholder.com/150') }}" 
                     alt="{{ $film->title }}" class="object-cover w-full mb-2 rounded h-60">
                <h3 class="font-bold text-yellow-400">{{ $film->title }}</h3>
                <p class="text-gray-300">Genre: {{ $film->genre }}</p>
                <p class="mt-1 font-semibold text-yellow-400">Jumlah Sewa: {{ $film->total_rented }}</p>
            </div>
        @endforeach
    </div>
</section>
@endsection
