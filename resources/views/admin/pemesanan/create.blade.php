<x-app-layout>
    {{-- Tambahkan CSS & JS Tom Select jika belum ada di layout utama admin --}}
    <x-slot name="header_scripts">
        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Pemesanan untuk Pasien') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 md:p-8"
     x-data="adminBookingForm()"
     x-init="init()">
 {{-- Nama fungsi JS diubah --}}
                
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Formulir Janji Temu (Admin)</h3>
                <x-notification />

                <form method="POST" action="{{ route('admin.pemesanan.store') }}">
                    @csrf
                    
                    {{-- LANGKAH 1: PILIH PASIEN & STATUS --}}
                    <div>
                        <h4 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">Langkah 1: Pilih Pasien & Status</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                             <div>
                                <x-input-label for="id_pasien" value="Pilih Pasien" />
                                <select id="id_pasien" name="id_pasien" required>
                                    <option value="">-- Cari Pasien --</option>
                                    @foreach($pasiens as $pasien)
                                        <option value="{{ $pasien->id }}" @selected(old('id_pasien') == $pasien->id)>
                                            {{ $pasien->name }} {{ $pasien->biodata?->nik ? '('.$pasien->biodata->nik.')' : '' }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('id_pasien')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="status_pasien" value="Status Pasien" />
                                <select id="status_pasien" name="status_pasien" x-model="formData.status_pasien" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="BPJS">BPJS</option>
                                    <option value="Umum">Umum</option>
                                    <option value="Inhealth">Inhealth</option>
                                </select>
                            </div>
                            <div x-show="formData.status_pasien === 'BPJS'" x-transition class="md:col-span-2">
                                <x-input-label for="nomor_bpjs" value="Nomor BPJS" />
                                <x-text-input id="nomor_bpjs" class="block mt-1 w-full" type="text" name="nomor_bpjs" x-model="formData.nomor_bpjs" />
                            </div>
                        </div>
                    </div>

                    {{-- LANGKAH 2: JADWAL & KELUHAN --}}
                    <div class="mt-8 border-t pt-6">
                        <h4 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">Langkah 2: Pilih Jadwal & Keluhan</h4>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Pilih Dokter --}}
                            <div>
                                <x-input-label value="Pilih Dokter" />
                                {{-- @change dihapus dari sini --}}
                                <select x-model="selectedDokter" name="id_dokter" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                                    <option value="">-- Pilih Dokter --</option>
                                    @foreach($dokters as $dokter)
                                        <option value="{{ $dokter->id }}" @selected(old('id_dokter') == $dokter->id)>{{ $dokter->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Pilih Tanggal --}}
                            <div x-show="selectedDokter" x-transition>
                                <x-input-label value="Pilih Tanggal" />
                                {{-- [FIX] Hapus ':' dari value dan gunakan sintaks Blade biasa --}}
                                <input type="date" x-model="selectedTanggal" name="tanggal_pesan" :min="today" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required value="{{ old('tanggal_pesan', '') }}">
                            </div>
                        </div>

                        {{-- Pilih Jam --}}
                        <div class="mt-6" x-show="selectedTanggal && !loadingSlot" x-transition>
                            <x-input-label value="Pilih Jam Tersedia" />
                            <div x-show="availableSlots.length > 0" class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-2 mt-1">
                                <template x-for="slot in availableSlots" :key="slot">
                                    <label :class="{'bg-purple-600 text-white': selectedSlot === slot, 'bg-gray-100 hover:bg-purple-100': selectedSlot !== slot}" class="cursor-pointer text-center p-3 rounded-md transition-colors duration-200">
                                        <input type="radio" x-model="selectedSlot" name="waktu_pesan" :value="slot" class="hidden" required>
                                        <span x-text="slot"></span>
                                    </label>
                                </template>
                            </div>
                             <div x-show="loadingSlot" class="text-sm text-gray-500 mt-2" x-text="loadingSlot"></div>
                            <div x-show="availableSlots.length === 0 && selectedTanggal && !loadingSlot" class="text-sm text-red-500 p-3 bg-red-50 rounded-md mt-1">
                                Tidak ada slot tersedia atau jadwal tidak ditemukan. Periksa kembali jadwal dokter.
                            </div>
                             <x-input-error :messages="$errors->get('waktu_pesan')" class="mt-2" />
                        </div>

                        {{-- Keluhan Awal & Catatan --}}
                        <div class="mt-6">
                            <x-input-label for="tindakan_awal" value="Keluhan / Tindakan Awal (Opsional)" />
                            <select name="tindakan_awal[]" id="tindakan_awal" multiple>
                                @foreach($daftarTindakans as $kategori)
                                    <optgroup label="{{ $kategori->nama_kategori }}">
                                        @foreach($kategori->tindakanItems as $tindakan)
                                            <option value="{{ $tindakan->id }}" data-harga="{{ $tindakan->harga }}">
                                                {{ $tindakan->keterangan }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4">
                            <x-input-label for="catatan" value="Catatan Tambahan (Opsional)" />
                            <textarea name="catatan" id="catatan" rows="3" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('catatan') }}</textarea>
                        </div>

                        {{-- Status Pemesanan Awal --}}
                         <div class="mt-4">
                            <x-input-label for="status" value="Status Pemesanan Awal" />
                            <select id="status" name="status" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="Dikonfirmasi" @selected(old('status', 'Dikonfirmasi') == 'Dikonfirmasi')>Langsung Dikonfirmasi</option>
                                <option value="Selesai" @selected(old('status') == 'Selesai')>Langsung Selesai (Pasien sudah diperiksa)</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-6 border-t pt-6">
                         <a href="{{ route('admin.pemesanan.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                         <x-primary-button type="submit" x-bind:disabled="!isFormComplete()" class="bg-purple-600 hover:bg-purple-700 disabled:bg-gray-400">


                            Simpan Pemesanan
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log("✅ DOMContentLoaded — Inisialisasi TomSelect");
    
            // Inisialisasi Tom Select untuk Pasien
            new TomSelect('#id_pasien', { 
                create: false, 
                sortField: { field: "text", direction: "asc" } 
            });
    
            // Inisialisasi Tom Select untuk Tindakan
            new TomSelect('#tindakan_awal', {
                plugins: ['remove_button'],
                render: {
                    option: function(data, escape) {
                        const optionElement = document.querySelector(`#tindakan_awal option[value="${data.value}"]`);
                        const harga = optionElement ? optionElement.getAttribute('data-harga') : null;
                        const hargaFormatted = harga ? new Intl.NumberFormat('id-ID').format(harga) : 'N/A';
                        return `<div><span class="font-medium">${escape(data.text)}</span><span class="text-sm text-gray-500 ml-2">(Rp ${hargaFormatted})</span></div>`;
                    },
                    item: function(data, escape) { 
                        return `<div>${escape(data.text)}</div>`; 
                    }
                }
            });
        });
        
        function adminBookingForm() {
            console.log("🧩 Alpine component adminBookingForm() DIINISIALISASI");
    
            return {
                formData: { 
                    status_pasien: '{{ old('status_pasien', '') }}',
                    nomor_bpjs: '{{ old('nomor_bpjs', '') }}',
                },
                selectedDokter: '{{ old('id_dokter', '') }}',
                selectedTanggal: '{{ old('tanggal_pesan', '') }}',
                today: new Date().toISOString().split('T')[0],
                availableSlots: [],
                loadingSlot: '',
                selectedSlot: '{{ old('waktu_pesan', '') }}',
    
                init() {
                    console.log("🚀 init() DIPANGGIL — Alpine aktif dan watcher disiapkan");
                    
                    if (this.selectedDokter && this.selectedTanggal) {
                        console.log("📅 Dokter & tanggal sudah ada di awal, ambil slot...");
                        this.fetchSlotWaktu();
                    }
    
                    this.$watch('selectedDokter', (val) => {
                        console.log("👩‍⚕️ selectedDokter berubah:", val);
                        this.resetTanggalDanSlot();
                    });
    
                    this.$watch('selectedTanggal', (val) => {
                        console.log("📆 selectedTanggal berubah:", val);
                        this.fetchSlotWaktu();
                    });
    
                    this.$watch('selectedSlot', (val) => {
                        console.log("⏰ Slot waktu dipilih:", val);
                    });
                },
                
                isFormComplete() {
                    const pasienSelected = document.getElementById('id_pasien').value !== '';
                    const complete = pasienSelected && this.selectedDokter && this.selectedTanggal && this.selectedSlot;
                    console.log("✅ Mengecek kelengkapan form:", {
                        pasienSelected,
                        selectedDokter: this.selectedDokter,
                        selectedTanggal: this.selectedTanggal,
                        selectedSlot: this.selectedSlot,
                        complete
                    });
                    return complete;
                },
    
                fetchSlotWaktu() {
                    console.log("🔎 Fetch slot waktu untuk dokter:", this.selectedDokter, "tanggal:", this.selectedTanggal);
                    
                    this.availableSlots = [];
                    this.selectedSlot = ''; 
                    if (!this.selectedTanggal || !this.selectedDokter) {
                        this.loadingSlot = ''; 
                        console.warn("⚠️ fetchSlotWaktu dibatalkan — tanggal atau dokter kosong");
                        return;
                    }
    
                    this.loadingSlot = 'Mencari slot waktu...';
                    fetch(`/admin/get-slot-waktu/${this.selectedDokter}/${this.selectedTanggal}`) 
                        .then(response => {
                            if (!response.ok) {
                                return response.json().then(err => { 
                                    throw new Error(err.message || 'Jadwal tidak ditemukan atau terjadi kesalahan server.'); 
                                });
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (Array.isArray(data)) {
                                this.availableSlots = data;
                                this.loadingSlot = data.length === 0 ? 'Tidak ada slot tersedia.' : '';
                                console.log("🕓 Slot tersedia:", data);
                            } else {
                                console.error('Data slot tidak valid:', data);
                                this.loadingSlot = 'Gagal memuat slot (format data salah).';
                                this.availableSlots = [];
                            }
                        })
                        .catch((error) => {
                            console.error('❌ Error fetching slots:', error);
                            this.loadingSlot = `Error: ${error.message || 'Gagal memuat slot.'}`;
                            this.availableSlots = []; 
                        });
                },
    
                resetTanggalDanSlot() {
                    console.log("🔄 Reset tanggal & slot karena dokter berubah");
                    this.selectedTanggal = '';
                    this.availableSlots = [];
                    this.selectedSlot = '';
                    this.loadingSlot = '';
                }
            }
        }
    </script>
    
</x-app-layout>