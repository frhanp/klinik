<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Detail Tindakan</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.tindakan.update', $tindakan->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="daftar_tindakan_id" :value="__('Kategori')" />
                                <select name="daftar_tindakan_id" id="daftar_tindakan_id"
                                    class="block mt-1 w-full rounded-md border-gray-300" required>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}" @selected($tindakan->daftar_tindakan_id == $kategori->id)>
                                            {{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <x-input-label for="keterangan" :value="__('Keterangan')" />
                                <x-text-input id="keterangan" class="block mt-1 w-full" type="text" name="keterangan"
                                    :value="old('keterangan', $tindakan->keterangan)" required />
                            </div>
                            <div class="md:col-span-2">
                                <x-input-label for="harga" :value="__('Harga')" />
                                <x-text-input id="harga" class="block mt-1 w-full" type="number" name="harga"
                                    :value="old('harga', $tindakan->harga)" required />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 border-t pt-6">
                            <a href="{{ route('admin.tindakan.index') }}"
                                class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">Simpan
                                Perubahan</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
