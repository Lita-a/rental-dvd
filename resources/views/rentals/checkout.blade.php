@extends('layouts.app')

@section('content')
<div class="container px-6 py-16 pb-32 mx-auto">

    <div class="flex justify-center mb-8">
        <div class="flex items-center gap-3">
            <label for="duration" class="text-sm font-medium text-gray-200">Durasi Sewa (hari):</label>
            <select id="duration" class="px-3 py-2 text-gray-900 bg-gray-200 rounded focus:outline-none">
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>
    </div>

<section class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    @foreach($cart as $film)
        <div class="relative flex flex-col overflow-hidden transition bg-gray-900 shadow-md rounded-2xl hover:scale-105 hover:shadow-xl">
            
            <a href="{{ route('checkout.remove', $film['id']) }}" 
               class="absolute z-10 px-2 py-1 text-xs font-semibold text-gray-900 bg-red-400 rounded top-2 right-2 hover:bg-red-300">
               Hapus
            </a>

            @if($film['top_movie'])
                <div class="absolute left-0 z-10 px-2 py-1 text-xs font-bold text-white bg-red-600 rounded-l top-2">
                    20% OFF
                </div>
            @endif

            <div class="relative">
                <img src="{{ $film['image'] }}" 
                     alt="{{ $film['title'] }}" 
                     class="object-cover w-full h-32 sm:h-40 rounded-t-2xl"
                     onerror="this.onerror=null;this.src='https://via.placeholder.com/300x450?text=No+Image';">
            </div>

            <div class="flex flex-col flex-1 gap-1 p-4">
                <h4 class="font-semibold text-yellow-400 text-md line-clamp-2">{{ $film['title'] }}</h4>
                <p class="text-xs text-gray-400">{{ $film['genre'] }}</p>
                <p class="text-sm font-medium text-yellow-400">
                    Rp {{ number_format($film['price'],0,',','.') }}/hari
                </p>
                <p class="text-xs text-gray-200">Durasi: <span class="film-duration">1</span> hari</p>
                <p class="text-sm font-semibold text-yellow-400">
                    Subtotal: Rp <span class="film-subtotal" data-price="{{ $film['price'] }}" data-top="{{ $film['top_movie'] ? '1' : '0' }}">{{ number_format($film['price'],0,',','.') }}</span>
                </p>
            </div>
        </div>
    @endforeach
</section>

    <div class="flex flex-col gap-3 mt-8 sm:max-w-md sm:mx-auto">
        <div class="flex justify-between p-4 text-lg font-semibold text-yellow-400 bg-gray-800 rounded-2xl">
            <span>Total Sewa:</span> <span id="total-rent">0</span>
        </div>

        <a href="{{ route('films.index') }}" 
           class="w-full px-6 py-3 font-semibold text-center text-gray-900 bg-green-400 rounded hover:bg-green-300">
           Tambahkan Film Lain
        </a>

        <form action="{{ route('rentals.store') }}" method="POST" class="w-full">
            @csrf
            <input type="hidden" name="rent_start" value="{{ date('Y-m-d') }}">
            <input type="hidden" name="duration" id="hidden-duration" value="1">
            <button type="submit" class="w-full px-6 py-3 font-semibold text-gray-900 bg-yellow-400 rounded hover:bg-yellow-300">
                Konfirmasi Sewa
            </button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const subtotals = document.querySelectorAll('.film-subtotal');
    const durations = document.querySelectorAll('.film-duration');
    const totalRent = document.getElementById('total-rent');
    const durationSelect = document.getElementById('duration');
    const hiddenDuration = document.getElementById('hidden-duration');

    function updateTotal() {
        const duration = parseInt(durationSelect.value);
        hiddenDuration.value = duration;

        let total = 0;
        subtotals.forEach((el,i) => {
            const price = parseInt(el.dataset.price);
            const top = el.dataset.top === '1';
            let subtotal = price * duration;

            if(top) {
                subtotal = Math.round(subtotal * 0.8);
            }

            el.textContent = subtotal.toLocaleString('id-ID');
            durations[i].textContent = duration;
            total += subtotal;
        });

        totalRent.textContent = total.toLocaleString('id-ID');
    }

    durationSelect.addEventListener('change', updateTotal);
    updateTotal();
});
</script>
@endsection
