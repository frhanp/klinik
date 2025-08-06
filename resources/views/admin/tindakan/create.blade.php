<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Tindakan Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <x-notification />
                    <form method="POST" action="{{ route('admin.tindakan.store') }}">
                        @csrf

                        <!-- Nama Tindakan -->
                        <div>
                            <x-input-label for="nama_tindakan" :value="__('Nama Tindakan')" />
                            <x-text-input id="nama_tindakan" class="block mt-1 w-full" type="text" name="nama_tindakan" :value="old('nama_tindakan')" required autofocus />
                        </div>

                        <!-- Harga -->
                        <div class="mt-4">
                            <x-input-label for="harga" :value="__('Harga')" />
                            <x-text-input id="harga" class="block mt-1 w-full" type="number" name="harga" :value="old('harga')" required placeholder="Contoh: 300000" />
                        </div>

                        <!-- Deskripsi -->
                        <div class="mt-4">
                            <x-input-label for="deskripsi" :value="__('Deskripsi (Opsional)')" />
                            <textarea id="deskripsi" name="deskripsi" rows="3" class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm">{{ old('deskripsi') }}</textarea>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.tindakan.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                                Batal
                            </a>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">
                                {{ __('Simpan Tindakan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>