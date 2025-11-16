<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Rental DVD' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="font-sans text-gray-900 bg-gray-900">

<nav class="fixed z-50 w-full bg-gray-900 shadow-md">
    <div class="container flex items-center justify-between px-6 py-4 mx-auto">
        <a href="{{ url('/') }}" class="text-2xl font-extrabold tracking-wide text-yellow-400 transition hover:text-yellow-300">
            Rental DVD
        </a>
        <div class="items-center hidden space-x-4 md:flex">
            <x-button link="{{ route('films.index') }}" class="px-5 py-2 font-semibold text-gray-900 bg-yellow-400 rounded-full hover:bg-yellow-300">
                Daftar Film
            </x-button>

            @guest
                <x-button link="{{ route('login') }}" class="px-5 py-2 font-semibold text-gray-900 bg-green-400 rounded-full hover:bg-green-300">
                    Login
                </x-button>

                <x-button link="{{ route('register') }}" class="px-5 py-2 font-semibold text-gray-900 bg-purple-400 rounded-full hover:bg-purple-300">
                    Daftar
                </x-button>
            @else
                <span class="px-4 py-2 font-semibold text-gray-200">{{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <x-button type="submit" class="px-5 py-2 font-semibold text-gray-900 bg-red-400 rounded-full hover:bg-red-300">
                        Logout
                    </x-button>
                </form>
            @endguest
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
            Daftar Film
        </x-button>

        @guest
            <x-button link="{{ route('login') }}" class="block w-full px-4 py-2 font-semibold text-gray-900 bg-green-400 rounded-full hover:bg-green-300">
                Login
            </x-button>

            <x-button link="{{ route('register') }}" class="block w-full px-4 py-2 font-semibold text-gray-900 bg-purple-400 rounded-full hover:bg-purple-300">
                Daftar
            </x-button>
        @else
            <span class="block px-4 py-2 font-semibold text-gray-200 bg-gray-800 rounded-full">{{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <x-button type="submit" class="block w-full px-4 py-2 font-semibold text-gray-900 bg-red-400 rounded-full hover:bg-red-300">
                    Logout
                </x-button>
            </form>
        @endguest
    </div>
</nav>

<main class="pt-24">
    {{ $slot }}
</main>

<script>
    const menuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    menuButton.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
</script>

</body>
</html>
