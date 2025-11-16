@props(['title', 'genre', 'image', 'alt', 'link' => '#'])

<div class="flex flex-col justify-between h-full overflow-hidden transition duration-300 transform bg-gray-800 rounded-lg shadow-lg hover:scale-105">
    <img src="{{ $image }}" alt="{{ $alt }}" class="object-cover w-full h-72">

    <div class="flex flex-col flex-grow p-4 bg-gray-900">
        <div>
            <h3 class="mb-2 text-xl font-semibold text-yellow-400">{{ $title }}</h3>
            <p class="mb-4 text-sm text-gray-400">{{ $genre }}</p>
        </div>

        <a href="{{ $link }}" 
           class="block w-full py-2 mt-auto font-semibold text-center text-gray-900 transition bg-yellow-400 rounded hover:bg-yellow-300">
            Sewa
        </a>
    </div>
</div>
