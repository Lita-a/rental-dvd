<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Rental DVD' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="font-sans text-gray-100 bg-gradient-to-b from-gray-900 to-indigo-950">

    <nav class="sticky top-0 z-50 shadow-lg bg-gray-900/80 backdrop-blur">
        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
            <a href="{{ url('/') }}" class="text-2xl font-bold text-yellow-400 hover:text-yellow-300">
                RentalDVD
            </a>

            <div class="hidden space-x-4 md:flex">
                <x-button link="{{ route('films.index') }}" class="px-4 py-2 font-semibold text-gray-900 bg-yellow-400 rounded-full hover:bg-yellow-300">
                    Koleksi Film
                </x-button>
            </div>

            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-200 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden px-6 pb-4 space-y-2 bg-gray-900 md:hidden">
            <x-button link="{{ route('films.index') }}" class="block w-full px-4 py-2 font-semibold text-gray-900 bg-yellow-400 rounded-full hover:bg-yellow-300">
                Koleksi Film
            </x-button>
        </div>
    </nav>

    <main class="pt-24">
        @yield('content')
    </main>

    <script>
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if(menuButton && mobileMenu) {
            menuButton.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
        }
    </script>

</body>
</html>
