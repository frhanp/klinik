<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Tambah Data Obat Baru') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.obat.store') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="nama_obat" :value="__('Nama Obat')" />
                                <x-text-input id="nama_obat" class="block mt-1 w-full" type="text" name="nama_obat" :value="old('nama_obat')" required />
                            </div>
                             <div>
                                <x-input-label for="kemasan" :value="__('Kemasan (Strip/Botol/Box)')" />
                                <x-text-input id="kemasan" class="block mt-1 w-full" type="text" name="kemasan" :value="old('kemasan')" required />
                            </div>
                             <div>
                                <x-input-label for="stok" :value="__('Stok Awal')" />
                                <x-text-input id="stok" class="block mt-1 w-full" type="number" name="stok" :value="old('stok')" required />
                            </div>
                             <div>
                                <x-input-label for="harga_jual_resep" :value="__('Harga Jual (Resep)')" />
                                <x-text-input id="harga_jual_resep" class="block mt-1 w-full" type="number" name="harga_jual_resep" :value="old('harga_jual_resep')" required />
                            </div>
                             <div class="md:col-span-2">
                                <x-input-label for="harga_jual_non_resep" :value="__('Harga Jual (Non-Resep)')" />
                                <x-text-input id="harga_jual_non_resep" class="block mt-1 w-full" type="number" name="harga_jual_non_resep" :value="old('harga_jual_non_resep')" required />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 border-t pt-6">
                            <a href="{{ route('admin.obat.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">{{ __('Simpan Obat') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>