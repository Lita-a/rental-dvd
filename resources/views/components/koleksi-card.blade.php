@props(['title', 'genre', 'image', 'alt' => '', 'link' => '#'])

<div class="flex flex-col justify-between overflow-hidden transition duration-300 transform bg-gray-800 shadow-lg rounded-2xl hover:scale-105">

    <img 
        src="{{ $image }}" 
        alt="{{ $alt ?: $title }}" 
        class="object-cover w-full h-72 rounded-t-2xl"
        onerror="this.src='https://via.placeholder.com/300x450?text=No+Image';"
    >

    <div class="flex flex-col flex-grow p-5">
        <div class="flex-1">
            <h3 class="mb-2 text-xl font-semibold leading-snug text-yellow-400 line-clamp-2">
                {{ $title }}
            </h3>
            <p class="mb-4 text-sm text-gray-400">{{ $genre }}</p>
        </div>

        <a href="{{ $link }}" 
           class="block w-full py-2 mt-auto font-semibold text-center text-gray-900 transition bg-yellow-400 rounded-lg hover:bg-yellow-300">
            Sewa
        </a>
    </div>
</div>
