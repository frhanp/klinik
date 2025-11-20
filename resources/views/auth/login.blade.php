{{-- AWAL MODIFIKASI: resources/views/auth/login.blade.php --}}
<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-3xl font-bold text-gray-800">Selamat Datang Kembali!</h2>
        <p class="text-gray-500 mt-2">Silakan masuk ke akun Anda.</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <div class="flex justify-between items-center">
                <x-input-label for="password" :value="__('Password')" />
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-purple-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Lupa password?') }}
                    </a>
                @endif
            </div>
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-purple-600 shadow-sm focus:ring-purple-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
            </label>
        </div>

        <div class="mt-4">

            <x-input-label for="captcha" :value="__('Verifikasi Keamanan')" />
            <div class="flex items-center space-x-2 mt-1">
                {{-- Tampilkan gambar captcha --}}
                <span class="border rounded-md p-1 bg-gray-100">
                    <img src="{{ captcha_src() }}" alt="captcha">

                </span>
                {{-- Input untuk kode --}}
                <x-text-input id="captcha" class="block w-full" type="text" name="captcha" required />
            </div>
            <x-input-error :messages="$errors->get('captcha')" class="mt-2" />
        </div>
        
        <div class="mt-6">
            <x-primary-button class="w-full justify-center bg-purple-600 hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-800 focus:ring-purple-500">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <div class="mt-6 text-center text-sm text-gray-600">
            Belum punya akun?
            <a class="underline hover:text-purple-700 font-semibold" href="{{ route('register') }}">
                Daftar di sini
            </a>
        </div>
    </form>
</x-guest-layout>
{{-- AKHIR MODIFIKASI --}}