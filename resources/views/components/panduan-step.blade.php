@props(['step', 'title', 'description', 'color' => 'bg-brand-pink'])

<div class="flex flex-col items-center p-6 space-y-2 text-center transition bg-white rounded-lg hover:-translate-y-1 hover:shadow-lg">
    <div class="flex items-center justify-center w-12 h-12 mb-2 text-lg font-bold text-white rounded-full {{ $color }}">
        {{ $step }}
    </div>

    <h3 class="text-xl font-semibold text-gray-900">
        {{ $title }}
    </h3>

    <p class="text-gray-600">
        {{ $description }}
    </p>
</div>
