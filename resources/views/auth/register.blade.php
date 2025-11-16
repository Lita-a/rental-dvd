<x-layout>
    <x-slot:heading>
        Daftar Akun
    </x-slot:heading>

    <div class="min-h-screen px-6 py-20 bg-gray-900">
        <div class="max-w-2xl p-10 mx-auto bg-white shadow-xl rounded-3xl">

            @if(session('success'))
                <div class="px-4 py-3 mb-6 text-center text-green-700 bg-green-100 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <h2 class="mb-10 text-3xl font-extrabold text-center text-gray-800">
                Buat Akun Baru
            </h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-8">
                @csrf

                <div>
                    <label for="name" class="block text-base font-medium text-gray-700">Nama Lengkap</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        value="{{ old('name') }}" 
                        required
                        class="w-full px-5 py-4 mt-3 text-lg border border-gray-300 outline-none rounded-xl focus:ring-purple-400 focus:border-purple-400"
                    >
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-base font-medium text-gray-700">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        value="{{ old('email') }}" 
                        required
                        class="w-full px-5 py-4 mt-3 text-lg border border-gray-300 outline-none rounded-xl focus:ring-purple-400 focus:border-purple-400"
                    >
                    @error('email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-base font-medium text-gray-700">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        required
                        class="w-full px-5 py-4 mt-3 text-lg border border-gray-300 outline-none rounded-xl focus:ring-purple-400 focus:border-purple-400"
                    >
                    @error('password')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-base font-medium text-gray-700">
                        Konfirmasi Password
                    </label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation" 
                        required
                        class="w-full px-5 py-4 mt-3 text-lg border border-gray-300 outline-none rounded-xl focus:ring-purple-400 focus:border-purple-400"
                    >
                </div>

                <div class="flex items-center justify-between gap-3 mt-10">
                    <x-button 
                        type="submit"
                        class="bg-purple-400 hover:bg-purple-300"
                    >
                        Daftar
                    </x-button>

                    <x-button 
                        link="{{ route('login') }}"
                        class="bg-green-400 hover:bg-green-300"
                    >
                        Kembali ke Login
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
