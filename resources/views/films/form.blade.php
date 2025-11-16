<form 
    action="{{ $action }}" 
    method="POST" 
    enctype="multipart/form-data" 
    class="space-y-6"
>
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif

    <input type="hidden" name="page" value="{{ request('page', 1) }}">

    <div>
        <label class="block mb-2 font-semibold text-gray-200">Judul Film</label>
        <input 
            type="text" 
            name="title" 
            value="{{ old('title', $film->title ?? '') }}" 
            required
            class="w-full px-4 py-3 text-gray-900 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400"
        >
    </div>

    <div>
        <label class="block mb-2 font-semibold text-gray-200">Genre</label>
        <input 
            type="text" 
            name="genre" 
            value="{{ old('genre', $film->genre ?? '') }}" 
            required
            class="w-full px-4 py-3 text-gray-900 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400"
        >
    </div>

    <div>
        <label class="block mb-2 font-semibold text-gray-200">Harga Sewa (Rp)</label>
        <input 
            type="number" 
            name="price" 
            value="{{ old('price', $film->price ?? '') }}" 
            required
            class="w-full px-4 py-3 text-gray-900 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400"
        >
    </div>

    <div>
        <label class="block mb-2 font-semibold text-gray-200">Gambar Film (Opsional)</label>
        <input 
            type="file" 
            name="image" 
            accept="image/*"
            class="w-full px-4 py-3 text-gray-900 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400"
        >

        @php
            $imageSrc = isset($film) && $film->image
                ? asset('storage/' . $film->image)
                : 'https://via.placeholder.com/200x280?text=Preview';
        @endphp

        <div class="mt-4">
            <p class="mb-2 text-sm text-gray-300">Preview gambar:</p>
            <img 
                id="previewImg" 
                src="{{ $imageSrc }}" 
                alt="Preview" 
                class="object-cover w-40 h-56 rounded-lg shadow-md"
            >
        </div>
    </div>

    <button 
        type="submit"
        class="w-full py-3 font-bold text-gray-900 transition bg-yellow-400 rounded-full hover:bg-yellow-300"
    >
        {{ $method === 'POST' ? 'Tambahkan Film' : 'Perbarui Film' }}
    </button>
</form>

<script>
    document.querySelector('input[name="image"]').addEventListener('change', e => {
        const file = e.target.files[0];
        const preview = document.getElementById('previewImg');
        if (file) {
            const reader = new FileReader();
            reader.onload = ev => preview.src = ev.target.result;
            reader.readAsDataURL(file);
        } else {
            preview.src = '{{ $imageSrc }}';
        }
    });
</script>
