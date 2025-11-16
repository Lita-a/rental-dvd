<x-layout>
    <x-slot:heading>
        Masuk
    </x-slot:heading>

    <div class="min-h-screen px-6 py-20 bg-gray-900">
        <div class="max-w-2xl p-10 mx-auto bg-white shadow-xl rounded-3xl">
            <h2 class="mb-10 text-3xl font-extrabold text-center text-gray-800">
                Masuk ke Akunmu
            </h2>

            <form method="POST" action="{{ route('login') }}" class="space-y-8">
                @csrf

                <div>
                    <label for="email" class="block text-base font-medium text-gray-700">
                        Email
                    </label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus
                        class="w-full px-5 py-4 mt-3 text-lg border border-gray-300 outline-none rounded-xl focus:ring-green-400 focus:border-green-400"
                    >
                    @error('email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-base font-medium text-gray-700">
                        Password
                    </label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        required
                        class="w-full px-5 py-4 mt-3 text-lg border border-gray-300 outline-none rounded-xl focus:ring-green-400 focus:border-green-400"
                    >
                    @error('password')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-wrap items-center justify-between gap-3 mt-10">
                    <x-button 
                         link="{{ route('password.request') }}" 
                        class="px-8 py-4 text-lg font-bold text-gray-900 transition bg-indigo-400 rounded-full hover:bg-indigo-300"
                    >
                        Lupa Sandi?
                    </x-button>

                    <div class="flex flex-wrap gap-3">
                        <x-button 
                            link="{{ route('register') }}" 
                            class="px-8 py-4 text-lg font-bold text-gray-900 transition bg-purple-400 rounded-full hover:bg-purple-300"
                        >
                            Daftar
                        </x-button>

                        <x-button 
                        type="submit" 
                        class="px-8 py-4 text-lg font-bold text-gray-900 transition bg-green-400 rounded-full hover:bg-green-300"
                           
                        >
                            Masuk
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>
