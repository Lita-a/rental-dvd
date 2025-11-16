<x-layout>
    <x-slot:heading>
        Reset Kata Sandi
    </x-slot:heading>

    <div class="min-h-screen px-6 py-20 bg-gray-900">
        <div class="max-w-2xl p-10 mx-auto bg-white shadow-xl rounded-3xl">
            <h2 class="mb-10 text-3xl font-extrabold text-center text-gray-800">
                Buat Kata Sandi Baru
            </h2>

            <form method="POST" action="{{ route('password.update') }}" class="space-y-8">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <label for="email" class="block text-base font-medium text-gray-700">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        value="{{ old('email') }}" 
                        required
                        class="w-full px-5 py-4 mt-3 text-lg border border-gray-300 outline-none rounded-xl focus:ring-indigo-400 focus:border-indigo-400"
                    >
                    @error('email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-base font-medium text-gray-700">Password Baru</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        required
                        class="w-full px-5 py-4 mt-3 text-lg border border-gray-300 outline-none rounded-xl focus:ring-indigo-400 focus:border-indigo-400"
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
                        class="w-full px-5 py-4 mt-3 text-lg border border-gray-300 outline-none rounded-xl focus:ring-indigo-400 focus:border-indigo-400"
                    >
                </div>

                <div class="flex items-center justify-between gap-3 mt-10">
                    <x-button 
                        type="submit" 
                        class="px-8 py-4 text-lg font-bold text-gray-900 transition bg-indigo-400 rounded-full hover:bg-indigo-300"
                    >
                        Reset Password
                    </x-button>

                    <x-button 
                        link="{{ route('login') }}" 
                        class="px-8 py-4 text-lg font-bold text-gray-900 transition bg-green-400 rounded-full hover:bg-green-300"
                    >
                        Kembali ke Login
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
