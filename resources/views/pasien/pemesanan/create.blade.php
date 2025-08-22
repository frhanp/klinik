<x-app-layout>
    {{-- Tambahkan CSS Tom Select di header --}}
    <x-slot name="header_scripts">
        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Pemesanan Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 md:p-8" 
                 x-data="bookingForm()">
                
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Formulir Janji Temu</h3>
                <x-notification />

                <form method="POST" action="{{ route('pasien.pemesanan.store') }}">
                    @csrf
                    
                    {{-- LANGKAH 1: DATA DIRI --}}
                    <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0">
                        <h4 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">Langkah 1: Data Diri Pasien</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="nama_pasien_booking" value="Nama Pasien" />
                                <x-text-input id="nama_pasien_booking" class="block mt-1 w-full" type="text" name="nama_pasien_booking" x-model="formData.nama_pasien_booking" required />
                            </div>
                            <div>
                                <x-input-label for="nik" value="NIK" />
                                <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik" x-model="formData.nik" />
                            </div>
                            <div class="md:col-span-2">
                                <x-input-label for="status_pasien" value="Status Pasien" />
                                <select id="status_pasien" name="status_pasien" x-model="formData.status_pasien" class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="BPJS">BPJS</option>
                                    <option value="Umum">Umum</option>
                                    <option value="Inhealth">Inhealth</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex justify-end mt-6">
                            <button type="button" @click="nextStep()" :disabled="!isStep1Complete()" class="px-6 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 disabled:bg-gray-400">
                                Lanjutkan
                            </button>
                        </div>
                    </div>

                    {{-- LANGKAH 2: JADWAL & KELUHAN --}}
                    <div x-show="step === 2" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0">
                        <h4 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">Langkah 2: Pilih Jadwal & Keluhan</h4>
                        
                        <!-- Pilih Dokter -->
                        <div class="mb-6">
                            <x-input-label value="Pilih Dokter" />
                            <select x-model="selectedDokter" @change="fetchJadwalDokter" name="id_dokter" class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm">
                                <option value="">-- Silakan Pilih Dokter --</option>
                                @foreach($dokters as $dokter)
                                    <option value="{{ $dokter->id }}">{{ $dokter->user->name }} ({{ $dokter->spesialisasi }})</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Pilih Tanggal -->
                        <div class="mb-6" x-show="selectedDokter" x-transition>
                            <x-input-label value="Pilih Tanggal" />
                            <input type="date" x-model="selectedTanggal" @change="fetchSlotWaktu" name="tanggal_pesan" :min="today" class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm">
                        </div>

                        <!-- Pilih Jam -->
                        <div class="mb-6" x-show="selectedTanggal && !loadingSlot" x-transition>
                            <x-input-label value="Pilih Jam Tersedia" />
                            <div x-show="availableSlots.length > 0" class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-2 mt-1">
                                <template x-for="slot in availableSlots" :key="slot">
                                    <label :class="{'bg-purple-600 text-white': selectedSlot === slot, 'bg-gray-100 hover:bg-purple-100': selectedSlot !== slot}" class="cursor-pointer text-center p-3 rounded-md transition-colors duration-200">
                                        <input type="radio" x-model="selectedSlot" name="waktu_pesan" :value="slot" class="hidden">
                                        <span x-text="slot"></span>
                                    </label>
                                </template>
                            </div>
                            <div x-show="availableSlots.length === 0 && selectedTanggal && !loadingSlot" class="text-sm text-red-500 p-3 bg-red-50 rounded-md mt-1">
                                Tidak ada slot tersedia. Silakan pilih tanggal lain.
                            </div>
                        </div>

                        <!-- Keluhan Awal & Catatan -->
                        <div x-show="selectedSlot" x-transition>
                            <div class="mb-6">
                                <x-input-label for="tindakan_awal" value="Keluhan / Tindakan Awal (Opsional)" />
                                <select name="tindakan_awal[]" id="tindakan_awal" multiple>
                                    @foreach($tindakans as $tindakan)
                                        <option value="{{ $tindakan->id }}" data-harga="{{ $tindakan->harga }}">{{ $tindakan->nama_tindakan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-6">
                                <x-input-label for="catatan" value="Catatan Tambahan (Opsional)" />
                                <textarea name="catatan" id="catatan" rows="3" class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm"></textarea>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-6 border-t pt-6">
                            <button type="button" @click="step = 1" class="text-sm text-gray-600 hover:text-gray-900">&larr; Kembali</button>
                            <x-primary-button type="submit" ::disabled="!isFormComplete()" class="bg-purple-600 hover:bg-purple-700 disabled:bg-gray-400">
                                Buat Janji Temu
                            </x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        // Inisialisasi Tom Select
        document.addEventListener('DOMContentLoaded', function() {
            new TomSelect('#tindakan_awal', {
                plugins: ['remove_button'],
                render: {
                    // Custom render untuk menampilkan harga
                    option: function(data, escape) {
                        const harga = data.harga ? new Intl.NumberFormat('id-ID').format(data.harga) : 'N/A';
                        return `<div>
                                    <span class="font-medium">${escape(data.text)}</span>
                                    <span class="text-sm text-gray-500 ml-2">(Rp ${harga})</span>
                                </div>`;
                    },
                    item: function(data, escape) {
                        return `<div>${escape(data.text)}</div>`;
                    }
                }
            });
        });
        
        function bookingForm() {
            return {
                step: 1,
                formData: {
                    nama_pasien_booking: '{{ Auth::user()->name }}',
                    nik: '{{ Auth::user()->biodata->nik ?? '' }}',
                    status_pasien: '',
                },
                selectedDokter: '',
                jadwalDokter: [],
                loadingJadwal: '',
                selectedTanggal: '',
                today: new Date().toISOString().split('T')[0],
                availableSlots: [],
                loadingSlot: '',
                selectedSlot: '',
                isStep1Complete() {
                    return this.formData.nama_pasien_booking && this.formData.status_pasien;
                },
                nextStep() {
                    if (this.isStep1Complete()) {
                        this.step = 2;
                    } else {
                        alert('Harap isi Nama Pasien dan Status Pasien untuk melanjutkan.');
                    }
                },
                isFormComplete() {
                    return this.isStep1Complete() && this.selectedDokter && this.selectedTanggal && this.selectedSlot;
                },

                fetchJadwalDokter() {
                    this.resetTanggalDanSlot();
                    if (!this.selectedDokter) return;

                    this.loadingJadwal = 'Memuat jadwal dokter...';
                    fetch(`/pasien/get-jadwal-dokter/${this.selectedDokter}`)
                        .then(response => response.json())
                        .then(data => {
                            this.jadwalDokter = data;
                            this.loadingJadwal = '';
                        })
                        .catch(() => {
                            this.loadingJadwal = 'Gagal memuat jadwal.';
                        });
                },

                fetchSlotWaktu() {
                    this.availableSlots = [];
                    this.selectedSlot = '';
                    if (!this.selectedTanggal || !this.selectedDokter) return;

                    this.loadingSlot = 'Mencari slot waktu...';
                    fetch(`/pasien/get-slot-waktu/${this.selectedDokter}/${this.selectedTanggal}`)
                        .then(response => {
                            if (!response.ok) throw new Error('Jadwal tidak ditemukan');
                            return response.json();
                        })
                        .then(data => {
                            this.availableSlots = data;
                            this.loadingSlot = '';
                        })
                        .catch(() => {
                            this.loadingSlot = '';
                        });
                },
                
                isFormComplete() {
                    return this.selectedDokter && this.selectedTanggal && this.selectedSlot;
                },

                resetTanggalDanSlot() {
                    this.selectedTanggal = '';
                    this.availableSlots = [];
                    this.selectedSlot = '';
                }
            }
        }
    </script>
</x-app-layout>