@extends('layouts.app')

@section('content')
<section class="container px-4 py-16 mx-auto">
    <h2 class="mb-6 text-2xl font-bold text-center text-yellow-400">Daftar Film + Jumlah Sewa</h2>

    <div class="flex flex-wrap justify-center gap-4 mb-6">
        <a href="{{ route('admin.rentals.top') }}" 
           class="px-4 py-2 font-semibold text-gray-900 transition bg-yellow-300 rounded-full hover:bg-yellow-400">
            Lihat Top Movies
        </a>
    </div>

    @if($films->count())
        <div class="overflow-x-auto">
            <table class="max-w-4xl min-w-full mx-auto text-sm bg-white border border-gray-300 rounded-md shadow-md sm:text-base">
                <thead class="text-gray-900 bg-yellow-300">
                    <tr>
                        <th class="px-4 py-3 text-left border-b border-gray-300">Judul</th>
                        <th class="px-4 py-3 text-left border-b border-gray-300">Genre</th>
                        <th class="px-4 py-3 text-center border-b border-gray-300">Jumlah Sewa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($films as $index => $film)
                        <tr class="{{ $index % 2 == 0 ? 'bg-yellow-50' : 'bg-white' }} border-t border-gray-300 hover:bg-yellow-100">
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $film->title }}</td>
                            <td class="px-4 py-3 text-gray-900">{{ $film->genre }}</td>
                            <td class="px-4 py-3 font-semibold text-center text-gray-900">{{ $film->total_rented }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="mt-6 text-center text-gray-400">Belum ada film yang tersedia.</p>
    @endif
</section>
@endsection
