@extends('layouts.app')

@section('content')
<section class="container px-6 py-16 mx-auto">
    
    @if (session('success'))
        <div id="toast-success" 
             class="fixed z-50 flex items-center w-full max-w-xs p-4 text-gray-900 bg-yellow-400 rounded-lg shadow-lg top-6 right-6 animate-fadeIn"
             role="alert">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" 
                      d="M16.707 5.293a1 1 0 010 1.414L8.414 15l-4.121-4.121a1 1 0 011.414-1.414L8.414 12.172l7.879-7.879a1 1 0 011.414 0z"
                      clip-rule="evenodd" />
            </svg>
            <span class="text-sm font-medium ms-3">{{ session('success') }}</span>
        </div>
        <script>
            setTimeout(() => document.getElementById('toast-success')?.remove(), 3000);
        </script>
    @endif

    <x-section-heading 
        title="Koleksi Film"
        subtitle="Pilih film favoritmu dan nikmati kapan saja!"
        color="yellow"
        align="center"
        size="4xl" 
    />

    <div class="flex flex-col items-center justify-center gap-4 mt-10 mb-6 sm:flex-row">
        <form method="GET" action="{{ route('films.index') }}" class="flex items-center">
            <input type="text" 
                   name="search" 
                   value="{{ request('search') }}"
                   placeholder="Cari film..." 
                   class="w-[260px] px-4 py-3 bg-gray-100 text-gray-900 rounded-l-full focus:outline-none focus:ring-2 focus:ring-yellow-400">
            <button type="submit" 
                    class="px-4 py-3 font-semibold text-gray-900 transition bg-yellow-400 rounded-r-full hover:bg-yellow-300">
                Cari
            </button>
        </form>

        @auth
            @if (Auth::user()->is_admin)
                <div class="flex flex-col gap-3 sm:flex-row">
                    <x-button 
                        link="{{ route('films.create', ['page' => request('page', 1), 'search' => request('search')]) }}" 
                        class="flex items-center gap-2 px-4 py-3 font-semibold text-gray-900 bg-yellow-300 rounded-full hover:bg-yellow-300">
                        <span class="text-xl font-bold leading-none">＋</span> Tambah Film
                    </x-button>

                    <x-button 
                        link="{{ route('admin.rentals.index') }}" 
                        class="flex items-center gap-2 px-4 py-3 font-semibold text-gray-900 bg-yellow-300 rounded-full hover:bg-yellow-400">
                        📄 Lihat List Film Disewakan
                    </x-button>
                </div>
            @endif
        @endauth
    </div>

    @if ($films->count())
        <div class="grid grid-cols-1 gap-8 mt-12 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 auto-rows-fr">
            @foreach ($films as $film)
                <x-film-card :film="$film" :page="request('page', 1)" :search="request('search')" />
            @endforeach
        </div>

        <div class="mt-12">
            {{ $films->appends(request()->query())->links() }}
        </div>
    @else
        <p class="mt-12 text-center text-gray-400">Belum ada film yang tersedia.</p>
    @endif

</section>
@endsection
