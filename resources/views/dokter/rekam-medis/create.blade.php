<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Buat Rekam Medis untuk: <span class="font-bold">{{ $pemesanan->pasien->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('dokter.rekam-medis.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_pemesanan" value="{{ $pemesanan->id }}">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="diagnosis" :value="__('Diagnosis')" />
                                <x-text-input id="diagnosis" class="block mt-1 w-full" type="text" name="diagnosis"
                                    :value="old('diagnosis')" required />
                            </div>
                            <div>
                                <x-input-label for="perawatan" :value="__('Perawatan')" />
                                <x-text-input id="perawatan" class="block mt-1 w-full" type="text" name="perawatan"
                                    :value="old('perawatan')" required />
                            </div>
                            <div class="md:col-span-2">
                                <x-input-label for="catatan" :value="__('Catatan Tambahan (Opsional)')" />
                                <textarea id="catatan" name="catatan" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" rows="3">{{ old('catatan') }}</textarea>
                            </div>
                        </div>

                        @php
                            $openKategoriId = '';
                            if ($daftarTindakans && $tindakanAwalIds) {
                                foreach ($daftarTindakans as $kategori) {
                                    if (count(array_intersect($kategori->tindakanItems->pluck('id')->toArray(), $tindakanAwalIds)) > 0) {
                                        $openKategoriId = $kategori->id;
                                        break;
                                    }
                                }
                            }
                        @endphp

                        <div class="mt-6 border-t pt-6" x-data="{ openKategori: '{{ $openKategoriId }}' }">
                            <h3 class="text-lg font-bold mb-4">Tindakan Medis</h3>
                            <div id="tindakan-container" class="space-y-2">
                                @forelse ($daftarTindakans as $kategori)
                                    <div class="border rounded-md overflow-hidden">
                                        <button type="button"
                                            @click="openKategori = (openKategori === '{{ $kategori->id }}' ? '' : '{{ $kategori->id }}')"
                                            class="w-full flex justify-between items-center p-3 text-left font-semibold text-gray-700 bg-gray-50 hover:bg-gray-100">
                                            <span>{{ $kategori->nama_kategori }}</span>
                                            <svg class="w-5 h-5 transform transition-transform"
                                                :class="{ 'rotate-180': openKategori === '{{ $kategori->id }}' }"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </button>

                                        <div x-show="openKategori === '{{ $kategori->id }}'" x-collapse class="p-4">
                                            @php
                                                $pilihanPasien = $kategori->tindakanItems->whereIn('id', $tindakanAwalIds);
                                                $tindakanLain = $kategori->tindakanItems->whereNotIn('id', $tindakanAwalIds);
                                            @endphp

                                            @if ($pilihanPasien->isNotEmpty())
                                                <div class="mb-4">
                                                    <h4 class="text-sm font-semibold text-gray-600 mb-2 pb-1 border-b">Pilihan Awal Pasien</h4>
                                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                                        @foreach ($pilihanPasien as $tindakan)
                                                            <label class="flex items-center space-x-2 p-2 border rounded-md bg-blue-50 cursor-not-allowed">
                                                                <input type="checkbox"
                                                                    value="{{ $tindakan->id }}"
                                                                    class="tindakan-checkbox rounded border-gray-300"
                                                                    data-harga="{{ $tindakan->harga }}" checked disabled>
                                                                {{-- Input hidden agar nilai tetap terkirim --}}
                                                                <input type="hidden" name="tindakans[]" value="{{ $tindakan->id }}">
                                                                <span>
                                                                    {{ $tindakan->keterangan }} 
                                                                    <span class="text-gray-500">(Rp {{ number_format($tindakan->harga, 0, ',', '.') }})</span>
                                                                </span>
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif

                                            @if($tindakanLain->isNotEmpty())
                                                <h4 class="text-sm font-semibold text-gray-600 mb-2 pb-1 border-b">Tindakan Tambahan</h4>
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                                    @foreach ($tindakanLain as $tindakan)
                                                        <label class="flex items-center space-x-2 p-2 border rounded-md bg-white hover:bg-gray-100">
                                                            <input type="checkbox" name="tindakans[]"
                                                                value="{{ $tindakan->id }}"
                                                                class="tindakan-checkbox rounded border-gray-300"
                                                                data-harga="{{ $tindakan->harga }}"
                                                                {{ in_array($tindakan->id, old('tindakans', [])) ? 'checked' : '' }}>
                                                            <span>
                                                                {{ $tindakan->keterangan }} 
                                                                <span class="text-gray-500">(Rp {{ number_format($tindakan->harga, 0, ',', '.') }})</span>
                                                            </span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                             @endif
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-center text-gray-500 p-4">Belum ada kategori tindakan yang dibuat.</p>
                                @endforelse
                            </div>
                        </div>

                        <div class="mt-6 border-t pt-6">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-bold">Resep Obat</h3>
                                <button type="button" id="tambah-resep"
                                    class="px-3 py-1 bg-green-500 text-white rounded-md text-sm hover:bg-green-600">Tambah
                                    Obat</button>
                            </div>
                            <div id="resep-container" class="space-y-4">
                            </div>
                        </div>

                        <div class="mt-6 border-t pt-6">
                            <h3 class="text-lg font-bold mb-4">Foto Pendukung (Opsional)</h3>
                            <input type="file" name="foto[]" multiple
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100" />
                        </div>

                        <div class="mt-6 border-t pt-6">
                            <h3 class="text-2xl font-bold text-right text-gray-800">
                                Total Estimasi Biaya: <span id="total-biaya" class="text-purple-600">Rp 0</span>
                            </h3>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('dokter.dashboard') }}"
                                class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">Simpan Rekam
                                Medis</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const obats = @json($obats);

            document.addEventListener('DOMContentLoaded', function() {
                const resepContainer = document.getElementById('resep-container');
                const addButton = document.getElementById('tambah-resep');
                const totalBiayaEl = document.getElementById('total-biaya');
                let resepIndex = 0;

                function calculateTotal() {
                    let total = 0;
                    // Gabungkan kalkulasi untuk semua checkbox yang bisa dipilih (tidak disabled)
                    document.querySelectorAll('.tindakan-checkbox:not(:disabled):checked').forEach(checkbox => {
                        total += parseFloat(checkbox.dataset.harga) || 0;
                    });
                    // Tambahkan biaya dari tindakan awal yang sudah pasti (disabled dan checked)
                    document.querySelectorAll('.tindakan-checkbox:disabled').forEach(checkbox => {
                        total += parseFloat(checkbox.dataset.harga) || 0;
                    });
                    // Kalkulasi biaya resep
                    document.querySelectorAll('#resep-container .resep-row').forEach(row => {
                        const obatId = row.querySelector('.obat-select').value;
                        const jumlah = parseFloat(row.querySelector('.jumlah-input').value) || 0;
                        const tipeHarga = row.querySelector('.tipe-harga-select').value;
                        if (obatId && jumlah > 0) {
                            const obat = obats.find(o => o.id == obatId);
                            if (obat) {
                                const harga = tipeHarga === 'resep' ? obat.harga_jual_resep : obat.harga_jual_non_resep;
                                total += (parseFloat(harga) || 0) * jumlah;
                            }
                        }
                    });
                    totalBiayaEl.textContent = 'Rp ' + total.toLocaleString('id-ID');
                }

                function addResepRow() {
                    const selectId = `select-obat-${resepIndex}`;
                    const row = document.createElement('div');
                    row.classList.add('resep-row', 'p-4', 'border', 'rounded-md', 'bg-gray-50', 'space-y-3');
                    row.innerHTML = `
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Pilih Obat</label>
                                <select id="${selectId}" name="resep[${resepIndex}][obat_id]" class="obat-select" required placeholder="Ketik untuk mencari obat..."><option value="">-- Pilih dari Stok --</option>${obats.map(obat => `<option value="${obat.id}">${obat.nama_obat} (Stok: ${obat.stok})</option>`).join('')}</select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tipe Harga</label>
                                <select name="resep[${resepIndex}][tipe_harga]" class="tipe-harga-select mt-1 block w-full rounded-md border-gray-300" required><option value="resep">Harga Resep</option><option value="non_resep">Harga Non-Resep</option></select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                                <input type="number" name="resep[${resepIndex}][jumlah]" class="jumlah-input mt-1 block w-full rounded-md border-gray-300" min="1" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Dosis</label>
                                <input type="text" name="resep[${resepIndex}][dosis]" class="mt-1 block w-full rounded-md border-gray-300">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Instruksi</label>
                                <input type="text" name="resep[${resepIndex}][instruksi]" class="mt-1 block w-full rounded-md border-gray-300">
                            </div>
                        </div>
                        <button type="button" class="hapus-resep text-red-500 text-sm hover:text-red-700">Hapus</button>
                    `;
                    resepContainer.appendChild(row);
                    new TomSelect(`#${selectId}`, {
                        create: false,
                        sortField: {
                            field: "text",
                            direction: "asc"
                        }
                    });
                    resepIndex++;
                }

                addButton.addEventListener('click', addResepRow);
                
                const container = document.getElementById('tindakan-container');
                container.addEventListener('change', (e) => {
                    if (e.target.matches('.tindakan-checkbox')) {
                        calculateTotal();
                    }
                });

                resepContainer.addEventListener('change', (e) => {
                     if (e.target.matches('.obat-select, .tipe-harga-select, .jumlah-input')) {
                        calculateTotal();
                    }
                });
                 resepContainer.addEventListener('input', (e) => {
                    if (e.target.matches('.jumlah-input')) {
                        calculateTotal();
                    }
                });
                resepContainer.addEventListener('click', (e) => {
                    if (e.target.classList.contains('hapus-resep')) {
                        e.target.closest('.resep-row').remove();
                        calculateTotal();
                    }
                });

                // Inisialisasi
                addResepRow();
                calculateTotal();
            });
        </script>
    @endpush
</x-app-layout>