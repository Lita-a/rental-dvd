@props(['label', 'name', 'type' => 'text', 'value' => '', 'required' => false])

<div>
    <label for="{{ $name }}" class="block text-base font-medium text-gray-700">
        {{ $label }}
    </label>

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        {{ $required ? 'required' : '' }}
        class="block w-full px-5 py-4 mt-3 text-lg border border-gray-300 rounded-xl focus:ring-green-400 focus:border-green-400"
    >

    @error($name)
        <span class="block mt-1 text-sm text-red-500">{{ $message }}</span>
    @enderror
</div>
