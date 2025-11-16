@props(['icon', 'title', 'description' => ''])

<div class="flex flex-col items-center p-6 space-y-2 text-center transition bg-white rounded-lg hover:-translate-y-1 hover:shadow-lg">
    <div class="w-10 h-10 mb-3 text-indigo-600">
        {!! $icon !!}
    </div>

    <h3 class="mb-1 text-xl font-semibold">{{ $title }}</h3>
    <p class="text-gray-600">{{ $description }}</p>
</div>
