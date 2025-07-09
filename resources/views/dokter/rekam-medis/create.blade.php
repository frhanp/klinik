<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Rekam Medis untuk ' . $pemesanan->pasien->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-notification />
                    <form method="POST" action="{{ route('dokter.rekam-medis.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_pemesanan" value="{{ $pemesanan->id }}">

                        <!-- Diagnosis -->
                        <div>
                            <x-input-label for="diagnosis" :value="__('Diagnosis')" />
                            <textarea id="diagnosis" name="diagnosis" rows="4" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('diagnosis') }}</textarea>
                        </div>

                        <!-- Perawatan -->
                        <div class="mt-4">
                            <x-input-label for="perawatan" :value="__('Perawatan / Tindakan')" />
                            <textarea id="perawatan" name="perawatan" rows="4" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('perawatan') }}</textarea>
                        </div>

                        <!-- Catatan Dokter -->
                        <div class="mt-4">
                            <x-input-label for="catatan" :value="__('Catatan Tambahan')" />
                            <textarea id="catatan" name="catatan" rows="3" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('catatan') }}</textarea>
                        </div>
                        
                        <!-- Upload Foto -->
                        <div class="mt-4">
                            <x-input-label for="foto" :value="__('Upload Foto Pendukung (Bisa lebih dari satu)')" />
                            <input id="foto" class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" type="file" name="foto[]" multiple>
                        </div>

                        <!-- Resep Obat -->
                        <div class="mt-6" x-data="{ resep: [{nama_obat: '', dosis: '', instruksi: ''}] }">
                            <h3 class="text-lg font-medium">Resep Obat</h3>
                            <template x-for="(item, index) in resep" :key="index">
                                <div class="p-4 mt-2 border rounded-md">
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <div>
                                            <x-input-label ::for="'nama_obat_' + index" :value="__('Nama Obat')" />
                                            <x-text-input ::id="'nama_obat_' + index" class="block mt-1 w-full" type="text" x-model="item.nama_obat" ::name="'resep[' + index + '][nama_obat]'" />
                                        </div>
                                        <div>
                                            <x-input-label ::for="'dosis_' + index" :value="__('Dosis')" />
                                            <x-text-input ::id="'dosis_' + index" class="block mt-1 w-full" type="text" x-model="item.dosis" ::name="'resep[' + index + '][dosis]'" />
                                        </div>
                                        <div>
                                            <x-input-label ::for="'instruksi_' + index" :value="__('Instruksi')" />
                                            <x-text-input ::id="'instruksi_' + index" class="block mt-1 w-full" type="text" x-model="item.instruksi" ::name="'resep[' + index + '][instruksi]'" />
                                        </div>
                                    </div>
                                    <button type="button" @click="resep.splice(index, 1)" class="mt-2 text-red-500 text-sm" x-show="index > 0">Hapus Resep</button>
                                </div>
                            </template>
                            <button type="button" @click="resep.push({nama_obat: '', dosis: '', instruksi: ''})" class="mt-2 text-sm text-blue-600">+ Tambah Resep</button>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button>
                                {{ __('Simpan Rekam Medis & Selesaikan Kunjungan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>