@props(['films'])

<section class="container px-6 py-16 mx-auto">
    <x-section-heading 
        title="Koleksi Terbaru"
        subtitle="Film-film terbaru untuk menemani harimu!"
        color="yellow"
    />

    @if($films->count())
        <div class="grid grid-cols-1 gap-8 mt-12 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 auto-rows-fr">
            @foreach ($films as $film)
                @php
                    use Illuminate\Support\Str;

                    $imageSrc = $film->image_url 
                        ?? ($film->image 
                            ? (Str::startsWith($film->image, ['http://','https://']) 
                                ? $film->image 
                                : asset('storage/' . $film->image)) 
                            : 'https://via.placeholder.com/300x450?text=No+Image');
                    $isAdmin = auth()->check() && auth()->user()->is_admin;
                @endphp

                <div class="relative">
                    <x-collection-card 
                        :title="$film->title"
                        :genre="$film->genre"
                        :image="$imageSrc"
                        :alt="$film->title"
                        :link="!$isAdmin ? route('checkout.add', $film->id) : '#'"
                    />

                    @if($isAdmin)
                        <div class="absolute left-0 flex w-full gap-2 px-5 bottom-4">
                            <a href="{{ route('films.edit', $film->id) }}" 
                               class="flex-1 py-2 font-semibold text-center text-gray-900 bg-yellow-400 rounded-lg hover:bg-yellow-300">
                                Edit
                            </a>
                            <form action="{{ route('films.destroy', $film->id) }}" method="POST" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-full py-2 font-semibold text-gray-900 bg-red-400 rounded-lg hover:bg-red-300">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <div class="flex flex-col items-center justify-center mt-16 text-gray-400">
            <img src="{{ asset('images/empty.svg') }}" alt="Tidak ada koleksi" class="w-64 mb-6">
            <p class="text-lg font-medium">Belum ada film di koleksi kamu.</p>
        </div>
    @endif
</section>
