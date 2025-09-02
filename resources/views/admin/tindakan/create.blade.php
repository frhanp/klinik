<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Tambah Kategori atau Detail Tindakan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Form untuk Kategori Baru -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-4">Tambah Kategori Tindakan Baru</h3>
                    <form method="POST" action="{{ route('admin.tindakan.store') }}">
                        @csrf
                        <div>
                            <x-input-label for="nama_kategori" :value="__('Nama Kategori (Contoh: Tambal Gigi, Cabut Gigi)')" />
                            <x-text-input id="nama_kategori" class="block mt-1 w-full" type="text"
                                name="nama_kategori" :value="old('nama_kategori')" required />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="bg-blue-600 hover:bg-blue-700">Simpan Kategori</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Form untuk Detail Tindakan Baru -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white">
                    <h3 class="text-lg font-bold mb-4">Tambah Detail Tindakan Baru</h3>
                    <form method="POST" action="{{ route('admin.tindakan.store') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="daftar_tindakan_id" :value="__('Pilih Kategori')" />
                                <select name="daftar_tindakan_id" id="daftar_tindakan_id"
                                    class="block mt-1 w-full rounded-md border-gray-300" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <x-input-label for="keterangan" :value="__('Keterangan (Contoh: Gigi Depan, Gigi Geraham)')" />
                                <x-text-input id="keterangan" class="block mt-1 w-full" type="text" name="keterangan"
                                    :value="old('keterangan')" required />
                            </div>
                            <div class="md:col-span-2">
                                <x-input-label for="harga" :value="__('Harga')" />
                                <x-text-input id="harga" class="block mt-1 w-full" type="number" name="harga"
                                    :value="old('harga')" required />
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">Simpan Detail
                                Tindakan</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
