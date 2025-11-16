@props(['link' => '#', 'type' => 'button', 'class' => ''])

@if ($type === 'submit')
    <button type="submit" {{ $attributes->merge(['class' => "inline-block px-8 py-4 rounded-full font-bold text-gray-900 transition $class"]) }}>
        {{ $slot }}
    </button>
@else
    <a href="{{ $link }}" {{ $attributes->merge(['class' => "inline-block px-8 py-4 rounded-full font-bold text-gray-900 transition $class"]) }}>
        {{ $slot }}
    </a>
@endif
