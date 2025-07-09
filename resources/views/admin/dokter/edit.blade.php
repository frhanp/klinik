<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Dokter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-notification />
                    <form method="POST" action="{{ route('admin.dokter.update', $dokter->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nama Lengkap -->
                        <div>
                            <x-input-label for="name" :value="__('Nama Lengkap')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $dokter->user->name)" required autofocus />
                        </div>

                        <!-- Email -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $dokter->user->email)" required />
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="mt-4">
                            <x-input-label for="nomor_telepon" :value="__('Nomor Telepon')" />
                            <x-text-input id="nomor_telepon" class="block mt-1 w-full" type="text" name="nomor_telepon" :value="old('nomor_telepon', $dokter->user->nomor_telepon)" required />
                        </div>

                        <!-- Spesialisasi -->
                        <div class="mt-4">
                            <x-input-label for="spesialisasi" :value="__('Spesialisasi')" />
                            <x-text-input id="spesialisasi" class="block mt-1 w-full" type="text" name="spesialisasi" :value="old('spesialisasi', $dokter->spesialisasi)" required />
                        </div>
                        
                        <!-- Foto -->
                        <div class="mt-4">
                            <x-input-label for="foto" :value="__('Ganti Foto (Opsional)')" />
                            @if($dokter->foto)
                                <img src="{{ asset('storage/' . $dokter->foto) }}" alt="Foto {{ $dokter->user->name }}" class="w-24 h-24 rounded-md object-cover mb-2">
                            @endif
                            <input id="foto" class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" type="file" name="foto">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Perbarui Data') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>