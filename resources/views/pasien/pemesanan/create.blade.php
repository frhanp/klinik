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

                <form method="POST" action="{{ route('pasien.pemesanan.store') }}">
                    @csrf
                    
                    <!-- Step 1: Pilih Dokter -->
                    <div class="mb-6">
                        <label class="block font-medium text-sm text-gray-700 mb-2">1. Pilih Dokter</label>
                        <select x-model="selectedDokter" @change="fetchJadwalDokter" name="id_dokter" class="block w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm">
                            <option value="">-- Silakan Pilih Dokter --</option>
                            @foreach($dokters as $dokter)
                                <option value="{{ $dokter->id }}">{{ $dokter->user->name }} ({{ $dokter->spesialisasi }})</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Step 2: Pilih Tanggal -->
                    <div class="mb-6" x-show="selectedDokter" x-transition>
                        <label class="block font-medium text-sm text-gray-700 mb-2">2. Pilih Tanggal</label>
                        <div x-text="loadingJadwal" class="text-sm text-gray-500" x-show="loadingJadwal"></div>
                        <input type="date" x-model="selectedTanggal" @change="fetchSlotWaktu" name="tanggal_pesan" 
                               :min="today"
                               class="block w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm">
                        <p class="text-xs text-gray-500 mt-1">Hanya tanggal praktek dokter yang akan menampilkan slot waktu.</p>
                    </div>

                    <!-- Step 3: Pilih Jam -->
                    <div class="mb-6" x-show="selectedTanggal && !loadingSlot" x-transition>
                        <label class="block font-medium text-sm text-gray-700 mb-2">3. Pilih Jam Tersedia</label>
                        <div x-text="loadingSlot" class="text-sm text-gray-500" x-show="loadingSlot"></div>
                        
                        <div x-show="availableSlots.length > 0" class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-2">
                            <template x-for="slot in availableSlots" :key="slot">
                                <label :class="{'bg-purple-600 text-white': selectedSlot === slot, 'bg-gray-100 hover:bg-purple-100': selectedSlot !== slot}"
                                       class="cursor-pointer text-center p-3 rounded-md transition-colors duration-200">
                                    <input type="radio" x-model="selectedSlot" name="waktu_pesan" :value="slot" class="hidden">
                                    <span x-text="slot"></span>
                                </label>
                            </template>
                        </div>
                        <div x-show="availableSlots.length === 0 && selectedTanggal && !loadingSlot" class="text-sm text-red-500 p-3 bg-red-50 rounded-md">
                            Tidak ada slot tersedia pada tanggal ini atau dokter tidak praktek. Silakan pilih tanggal lain.
                        </div>
                    </div>

                    <!-- Step 4: Pilih Tindakan Awal -->
                    <div class="mb-6" x-show="selectedSlot" x-transition>
                        <label for="tindakan_awal" class="block font-medium text-sm text-gray-700 mb-2">4. Keluhan / Tindakan Awal</label>
                        <select name="tindakan_awal[]" id="tindakan_awal" multiple>
                            <option value="">-- Pilih Keluhan Utama (Bisa lebih dari satu) --</option>
                            @foreach($tindakans as $tindakan)
                                <option value="{{ $tindakan->id }}" data-harga="{{ $tindakan->harga }}">{{ $tindakan->nama_tindakan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Step 5: Catatan & Submit -->
                    <div class="mb-6" x-show="selectedSlot" x-transition>
                        <label for="catatan" class="block font-medium text-sm text-gray-700 mb-2">5. Catatan Tambahan (Opsional)</label>
                        <textarea name="catatan" id="catatan" rows="3" class="block w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm" placeholder="Contoh: Sakit gigi di bagian kanan bawah..."></textarea>
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button type="submit" ::disabled="!isFormComplete()"
                            class="bg-purple-600 hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-800 disabled:bg-gray-400">
                            Buat Janji Temu
                        </x-primary-button>
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
                selectedDokter: '',
                jadwalDokter: [],
                loadingJadwal: '',
                selectedTanggal: '',
                today: new Date().toISOString().split('T')[0],
                availableSlots: [],
                loadingSlot: '',
                selectedSlot: '',

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