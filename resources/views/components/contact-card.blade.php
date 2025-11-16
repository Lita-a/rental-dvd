@props(['icon', 'title', 'text'])

<div class="flex flex-col items-center p-6 space-y-2 transition transform bg-white rounded-lg shadow-md hover:-translate-y-1 hover:shadow-xl">
    <div class="w-8 h-8 text-indigo-600">{!! $icon !!}</div>
    <h3 class="text-xl font-semibold text-gray-900">{{ $title }}</h3>
    <p class="text-center text-gray-700">{{ $text }}</p>
</div>
