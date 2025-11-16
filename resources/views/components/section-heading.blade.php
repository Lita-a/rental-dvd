@props(['title', 'subtitle' => '', 'color' => 'yellow', 'align' => 'center', 'size' => '4xl'])

@php
    $colorClass = match($color) {
        'yellow' => 'text-yellow-400',
        'blue' => 'text-blue-400',
        'red' => 'text-red-400',
        'green' => 'text-green-400',
        'purple' => 'text-purple-400',
        default => 'text-yellow-400',
    };
@endphp

<div class="px-4 py-6 text-{{ $align }} bg-gray-800 rounded-lg shadow-md">
    <h2 class="font-extrabold text-{{ $size }} {{ $colorClass }}">{{ $title }}</h2>
    @if ($subtitle)
        <p class="mt-2 text-lg text-gray-200">{{ $subtitle }}</p>
    @endif
</div>
