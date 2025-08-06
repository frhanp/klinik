<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Rekam Medis untuk ' . $pemesanan->pasien->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200"
                     x-data="{ tindakans: {{ json_encode($tindakans) }}, selectedTindakans: [], totalBiaya: 0,
                                calculateTotal() {
                                    this.totalBiaya = 0;
                                    this.selectedTindakans.forEach(id => {
                                        const tindakan = this.tindakans.find(t => t.id == id);
                                        if (tindakan) {
                                            this.totalBiaya += parseInt(tindakan.harga);
                                        }
                                    });
                                }
                             }">
                    <x-notification />
                    <form method="POST" action="{{ route('dokter.rekam-medis.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_pemesanan" value="{{ $pemesanan->id }}">

                        <!-- Diagnosis -->
                        <div>
                            <x-input-label for="diagnosis" :value="__('Diagnosis')" />
                            <textarea id="diagnosis" name="diagnosis" rows="4" class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm" required>{{ old('diagnosis') }}</textarea>
                        </div>

                        <!-- Perawatan -->
                        <div class="mt-4">
                            <x-input-label for="perawatan" :value="__('Perawatan / Tindakan Medis')" />
                            <textarea id="perawatan" name="perawatan" rows="4" class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm" required>{{ old('perawatan') }}</textarea>
                        </div>

                        <!-- Catatan Dokter -->
                        <div class="mt-4">
                            <x-input-label for="catatan" :value="__('Catatan Tambahan')" />
                            <textarea id="catatan" name="catatan" rows="3" class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm">{{ old('catatan') }}</textarea>
                        </div>
                        
                        <!-- Upload Foto -->
                        <div class="mt-4">
                            <x-input-label for="foto" :value="__('Upload Foto Pendukung (Bisa lebih dari satu)')" />
                            <input id="foto" class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" type="file" name="foto[]" multiple>
                            {{-- TAMBAHKAN BARIS DI BAWAH INI --}}
                            <p class="mt-1 text-xs text-gray-500">Tipe file yang diizinkan: JPG, PNG, GIF. Ukuran maks: 2MB.</p>
                        </div>

                        <!-- BAGIAN BARU: Tindakan & Biaya -->
                        <div class="mt-6 border-t pt-6">
                            <h3 class="text-lg font-medium text-gray-800">Tindakan & Biaya</h3>
                            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <template x-for="tindakan in tindakans" :key="tindakan.id">
                                    <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50 cursor-pointer">
                                        <input type="checkbox" :value="tindakan.id" x-model="selectedTindakans" @change="calculateTotal" name="tindakans[]" class="h-4 w-4 rounded border-gray-300 text-purple-600 focus:ring-purple-500">
                                        <span class="ml-3 text-sm text-gray-700" x-text="tindakan.nama_tindakan"></span>
                                        <span class="ml-auto text-sm font-semibold text-gray-900" x-text="'Rp ' + new Intl.NumberFormat('id-ID').format(tindakan.harga)"></span>
                                    </label>
                                </template>
                            </div>
                            <div class="mt-4 p-4 bg-purple-50 rounded-lg flex justify-between items-center">
                                <span class="font-bold text-lg text-purple-800">Total Estimasi Biaya:</span>
                                <span class="font-bold text-xl text-purple-900" x-text="'Rp ' + new Intl.NumberFormat('id-ID').format(totalBiaya)"></span>
                            </div>
                        </div>

                        <!-- Resep Obat -->
                        <div class="mt-6 border-t pt-6" x-data="{ resep: [{nama_obat: '', dosis: '', instruksi: ''}] }">
                            <h3 class="text-lg font-medium text-gray-800">Resep Obat</h3>
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
                                    <button type="button" @click="resep.splice(index, 1)" class="mt-2 text-red-500 text-sm hover:underline" x-show="index > 0">Hapus Resep</button>
                                </div>
                            </template>
                            <button type="button" @click="resep.push({nama_obat: '', dosis: '', instruksi: ''})" class="mt-2 text-sm text-blue-600 hover:underline">+ Tambah Resep</button>
                        </div>

                        <div class="flex items-center justify-end mt-6 border-t pt-6">
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">
                                {{ __('Simpan & Lanjutkan ke Pembayaran') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>