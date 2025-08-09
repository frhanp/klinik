<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Obat: ') . $obat->nama_obat }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <x-notification />
                    <form method="POST" action="{{ route('admin.obat.update', $obat->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Nama Obat -->
                        <div>
                            <x-input-label for="nama_obat" :value="__('Nama Obat')" />
                            <x-text-input id="nama_obat" class="block mt-1 w-full" type="text" name="nama_obat" :value="old('nama_obat', $obat->nama_obat)" required autofocus />
                        </div>

                        <!-- Satuan -->
                        <div class="mt-4">
                            <x-input-label for="satuan" :value="__('Satuan')" />
                            <x-text-input id="satuan" class="block mt-1 w-full" type="text" name="satuan" :value="old('satuan', $obat->satuan)" required />
                        </div>

                        <!-- Stok -->
                        <div class="mt-4">
                            <x-input-label for="stok" :value="__('Jumlah Stok')" />
                            <x-text-input id="stok" class="block mt-1 w-full" type="number" name="stok" :value="old('stok', $obat->stok)" required />
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.obat.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                                Batal
                            </a>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">
                                {{ __('Perbarui Obat') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
