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
                    {{-- AWAL MODIFIKASI: Data Pribadi & Medis Pasien --}}
@if($pemesanan->pasien->biodata)
<div class="mt-6 p-5 bg-gray-50 border border-gray-200 rounded-lg">
    <h3 class="text-lg font-bold text-purple-800 mb-4 pb-2 border-b border-purple-200">Data Pribadi & Medis Pasien</h3>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4 text-sm">
        
        {{-- Kolom kiri --}}
        <div class="space-y-2">
            <div>
                <p class="text-gray-500 text-xs">NIK</p>
                <p class="font-semibold">{{ $pemesanan->pasien->biodata->nik ?? '-' }}</p>
            </div>
            <div>
                <p class="text-gray-500 text-xs">Tempat, Tanggal Lahir</p>
                <p class="font-semibold">
                    {{ $pemesanan->pasien->biodata->tempat_lahir ?? '-' }}, 
                    {{ $pemesanan->pasien->biodata->tanggal_lahir ? \Carbon\Carbon::parse($pemesanan->pasien->biodata->tanggal_lahir)->translatedFormat('d F Y') : '-' }}
                </p>
            </div>
            <div>
                <p class="text-gray-500 text-xs">Umur</p>
                <p class="font-semibold">
                    {{ $pemesanan->pasien->biodata->umur 
                        ? $pemesanan->pasien->biodata->umur . ' Tahun'
                        : ($pemesanan->pasien->biodata->tanggal_lahir 
                            ? \Carbon\Carbon::parse($pemesanan->pasien->biodata->tanggal_lahir)->age . ' Tahun' 
                            : '-') }}
                </p>
            </div>
            <div>
                <p class="text-gray-500 text-xs">Jenis Kelamin</p>
                <p class="font-semibold">{{ $pemesanan->pasien->biodata->jenis_kelamin ?? '-' }}</p>
            </div>
            <div>
                <p class="text-gray-500 text-xs">Alamat</p>
                <p class="font-semibold">{{ $pemesanan->pasien->biodata->alamat ?? '-' }}</p>
            </div>
            <div>
                <p class="text-gray-500 text-xs">Pekerjaan</p>
                <p class="font-semibold">{{ $pemesanan->pasien->biodata->pekerjaan ?? '-' }}</p>
            </div>
            <div>
                <p class="text-gray-500 text-xs">Nama Orang Tua</p>
                <p class="font-semibold">{{ $pemesanan->pasien->biodata->nama_orang_tua ?? '-' }}</p>
            </div>
        </div>

        {{-- Kolom kanan --}}
        <div class="space-y-2">
            <div>
                <p class="text-gray-500 text-xs">Status Pasien Terakhir</p>
                <p class="font-semibold">{{ $pemesanan->pasien->biodata->status_pasien ?? '-' }}</p>
            </div>
            <div>
                <p class="text-gray-500 text-xs">Golongan Darah</p>
                <p class="font-semibold uppercase">{{ $pemesanan->pasien->biodata->golongan_darah ?? '-' }}</p>
            </div>
            <div>
                <p class="text-gray-500 text-xs">Riwayat Penyakit</p>
                <p class="font-semibold">{{ $pemesanan->pasien->biodata->riwayat_penyakit ?? '-' }}</p>
            </div>
            <div>
                <p class="text-gray-500 text-xs">Riwayat Alergi Obat</p>
                <p class="font-semibold">{{ $pemesanan->pasien->biodata->riwayat_alergi_obat ?? '-' }}</p>
            </div>
            <div>
                <p class="text-gray-500 text-xs">Riwayat Alergi Makanan</p>
                <p class="font-semibold">{{ $pemesanan->pasien->biodata->riwayat_alergi_makanan ?? '-' }}</p>
            </div>
            <div>
                <p class="text-gray-500 text-xs">Penyakit Penting Lainnya</p>
                <p class="font-semibold">{{ $pemesanan->pasien->biodata->penyakit_penting ?? '-' }}</p>
            </div>
        </div>

    </div>
</div>
@else
<div class="mt-6 p-4 bg-yellow-50 border border-yellow-300 rounded-lg text-sm text-yellow-700">
    Biodata lengkap pasien belum diisi oleh admin.
</div>
@endif
{{-- AKHIR MODIFIKASI --}}

                    <form method="POST" action="{{ route('dokter.rekam-medis.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_pemesanan" value="{{ $pemesanan->id }}">

                        {{-- Bagian Diagnosis, Perawatan, Catatan --}}
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
                                    if (
                                        count(
                                            array_intersect(
                                                $kategori->tindakanItems->pluck('id')->toArray(),
                                                $tindakanAwalIds,
                                            ),
                                        ) > 0
                                    ) {
                                        $openKategoriId = $kategori->id;
                                        break;
                                    }
                                }
                            }
                        @endphp

                        {{-- [MODIFIKASI] Blok untuk Tindakan yang Dipilih Pasien --}}
                        <div class="mt-6 border-t pt-6" x-data="{ openKategori: '{{ $openKategoriId }}_pasien' }">

                            <h3 class="text-lg font-bold mb-4">Tindakan Medis Dipilih Pasien</h3>
                            <div class="space-y-2">
                                @foreach ($daftarTindakans as $kategori)
                                    @php
                                        $pilihanPasien = $kategori->tindakanItems->whereIn('id', $tindakanAwalIds);
                                    @endphp
                                    @if ($pilihanPasien->isNotEmpty())
                                        <div class="border rounded-md overflow-hidden">
                                            <button type="button"
                                                @click="openKategori = (openKategori === '{{ $kategori->id }}_pasien' ? '' : '{{ $kategori->id }}_pasien')"
                                                class="w-full flex justify-between items-center p-3 text-left font-semibold text-gray-700 bg-gray-50 hover:bg-gray-100">
                                                <span>{{ $kategori->nama_kategori }}</span>
                                                <svg class="w-5 h-5 transform transition-transform"
                                                    :class="{ 'rotate-180': openKategori === '{{ $kategori->id }}_pasien' }"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </button>
                                            <div x-show="openKategori === '{{ $kategori->id }}_pasien'" x-collapse
                                                class="p-4 bg-blue-50">
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                                    @foreach ($pilihanPasien as $tindakan)
                                                        <label
                                                            class="flex items-center space-x-2 p-2 border rounded-md bg-white cursor-not-allowed">
                                                            <input type="checkbox" value="{{ $tindakan->id }}"
                                                                class="tindakan-checkbox rounded border-gray-300"
                                                                data-harga="{{ $tindakan->harga }}" checked disabled>
                                                            <input type="hidden" name="tindakans[]"
                                                                value="{{ $tindakan->id }}">
                                                            <span>{{ $tindakan->keterangan }} <span
                                                                    class="text-gray-500">(Rp
                                                                    {{ number_format($tindakan->harga, 0, ',', '.') }})</span></span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        {{-- [MODIFIKASI] Blok untuk Tindakan Tambahan Dokter --}}
                        <div class="mt-6 border-t pt-6" x-data="{ openKategori: '' }">
                            <h3 class="text-lg font-bold mb-4">Tindakan Medis Tambahan Dokter</h3>
                            <div class="space-y-2">
                                @foreach ($daftarTindakans as $kategori)
                                    @php
                                        $tindakanLain = $kategori->tindakanItems->whereNotIn('id', $tindakanAwalIds);
                                    @endphp
                                    @if ($tindakanLain->isNotEmpty())
                                        <div class="border rounded-md overflow-hidden">
                                            <button type="button"
                                                @click="openKategori = (openKategori === '{{ $kategori->id }}_dokter' ? '' : '{{ $kategori->id }}_dokter')"
                                                class="w-full flex justify-between items-center p-3 text-left font-semibold text-gray-700 bg-gray-50 hover:bg-gray-100">
                                                <span>{{ $kategori->nama_kategori }}</span>
                                                <svg class="w-5 h-5 transform transition-transform"
                                                    :class="{ 'rotate-180': openKategori === '{{ $kategori->id }}_dokter' }"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </button>
                                            <div x-show="openKategori === '{{ $kategori->id }}_dokter'" x-collapse
                                                class="p-4">
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                                    @foreach ($tindakanLain as $tindakan)
                                                        <label
                                                            class="flex items-center space-x-2 p-2 border rounded-md bg-white hover:bg-gray-100">
                                                            <input type="checkbox" name="tindakans[]"
                                                                value="{{ $tindakan->id }}"
                                                                class="tindakan-checkbox rounded border-gray-300"
                                                                data-harga="{{ $tindakan->harga }}"
                                                                {{ in_array($tindakan->id, old('tindakans', [])) ? 'checked' : '' }}>
                                                            <span>
                                                                {{ $tindakan->keterangan }}
                                                                <span class="text-gray-500">(Rp
                                                                    {{ number_format($tindakan->harga, 0, ',', '.') }})</span>
                                                            </span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        {{-- Bagian Resep, Foto, dan Total Biaya --}}
                        <div class="mt-6 border-t pt-6">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-bold">Resep Obat</h3>
                                <button type="button" id="tambah-resep"
                                    class="px-3 py-1 bg-green-500 text-white rounded-md text-sm hover:bg-green-600">Tambah
                                    Obat</button>
                            </div>
                            <div id="resep-container" class="space-y-4"></div>
                        </div>

                        <div class="mt-6 border-t pt-6">
                            <h3 class="text-lg font-bold mb-4">Foto Pendukung (Opsional)</h3>
                            <input type="file" name="foto[]" multiple
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100" />
                        </div>

                        <div class="mt-6 border-t pt-6">
                            <div class="space-y-3 max-w-md ml-auto">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Subtotal Tindakan</span>
                                    <span id="subtotal-tindakan" class="font-semibold text-gray-800">Rp 0</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Subtotal Obat</span>
                                    <span id="subtotal-obat" class="font-semibold text-gray-800">Rp 0</span>
                                </div>
                        
                                {{-- Potongan BPJS --}}
                                @if ($pemesanan->status_pasien == 'BPJS')
                                    <div id="baris-potongan-tindakan" 
                                        class="flex justify-between items-center text-red-600" style="display: none;">
                                        <span>Potongan BPJS Tindakan</span>
                                        <span id="potongan-tindakan-display">- Rp 0</span>
                                    </div>
                                    <div id="baris-potongan-obat" 
                                        class="flex justify-between items-center text-red-600" style="display: none;">
                                        <span>Potongan BPJS Obat</span>
                                        <span id="potongan-obat-display">- Rp 0</span>
                                    </div>
                                @endif
                        
                                {{-- Potongan Inhealth --}}
                                @if ($pemesanan->status_pasien == 'Inhealth')
                                    <div class="flex justify-between items-center">
                                        <label for="potongan" class="text-gray-600">Potongan Inhealth</label>
                                        <div class="flex items-center">
                                            <span class="mr-2 text-gray-500">Rp.</span>
                                            <x-text-input type="number" name="potongan" id="potongan"
                                                value="{{ old('potongan', 0) }}" min="0"
                                                class="text-right w-36" oninput="calculateTotal()" />
                                        </div>
                                    </div>
                                @endif
                        
                                {{-- Total Akhir --}}
                                <div class="flex justify-between items-center border-t pt-3">
                                    <h3 class="text-lg font-bold text-gray-800">Total Akhir</h3>
                                    <span id="total-biaya" class="text-xl font-bold text-purple-600">Rp 0</span>
                                </div>
                            </div>
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
        {{-- Script tidak berubah, karena logika kalkulasi tetap sama --}}
        <script>
            const obats = @json($obats);
            const statusPasien = @json($pemesanan->status_pasien);

            document.addEventListener('DOMContentLoaded', function() {
                const resepContainer = document.getElementById('resep-container');
                const addButton = document.getElementById('tambah-resep');
                const subtotalBiayaEl = document.getElementById('subtotal-biaya');
                const totalBiayaEl = document.getElementById('total-biaya');
                const barisPotonganBpjs = document.getElementById('baris-potongan-bpjs');
                const potonganBpjsDisplay = document.getElementById('potongan-bpjs-display');

                window.calculateTotal = function() {
    let subtotalTindakan = 0;
    let subtotalObat = 0;
    let potonganTindakan = 0;
    let potonganObat = 0;

    // === Hitung tindakan
    document.querySelectorAll('.tindakan-checkbox:not(:disabled):checked, .tindakan-checkbox:disabled')
        .forEach(checkbox => {
            let hargaTindakan = parseFloat(checkbox.dataset.harga) || 0;
            subtotalTindakan += hargaTindakan;

            if (statusPasien === 'BPJS') {
                potonganTindakan += 2500; // potongan per tindakan
            }
        });

    // === Hitung obat
    document.querySelectorAll('#resep-container .resep-row').forEach(row => {
        const obatSelect = row.querySelector('.obat-select');
        const jumlah = parseFloat(row.querySelector('.jumlah-input').value) || 0;
        const tipeHarga = row.querySelector('.tipe-harga-select').value;
        const hargaDisplay = row.querySelector('.harga-obat');

        if (obatSelect && obatSelect.value && jumlah > 0) {
            const selectedOption = obatSelect.options[obatSelect.selectedIndex];
            let hargaSatuan = tipeHarga === 'resep'
                ? parseFloat(selectedOption.dataset.hargaResep)
                : parseFloat(selectedOption.dataset.hargaNonresep);

            subtotalObat += hargaSatuan * jumlah;
            hargaDisplay.value = 'Rp ' + (hargaSatuan * jumlah).toLocaleString('id-ID');

            if (statusPasien === 'BPJS') {
                potonganObat += hargaSatuan * jumlah; // seluruh harga obat gratis
            }
        } else {
            hargaDisplay.value = 'Rp 0';
        }
    });

    // Update subtotal tampilan
    document.getElementById('subtotal-tindakan').textContent =
        'Rp ' + subtotalTindakan.toLocaleString('id-ID');
    document.getElementById('subtotal-obat').textContent =
        'Rp ' + subtotalObat.toLocaleString('id-ID');

    // Potongan BPJS
    if (statusPasien === 'BPJS') {
        // tampilkan potongan tindakan
        const barisPotTind = document.getElementById('baris-potongan-tindakan');
        const potTindDisp = document.getElementById('potongan-tindakan-display');
        if (potonganTindakan > 0) {
            barisPotTind.style.display = 'flex';
            potTindDisp.textContent = '- Rp ' + potonganTindakan.toLocaleString('id-ID');
        } else {
            barisPotTind.style.display = 'none';
        }

        // tampilkan potongan obat
        const barisPotObat = document.getElementById('baris-potongan-obat');
        const potObatDisp = document.getElementById('potongan-obat-display');
        if (potonganObat > 0) {
            barisPotObat.style.display = 'flex';
            potObatDisp.textContent = '- Rp ' + potonganObat.toLocaleString('id-ID');
        } else {
            barisPotObat.style.display = 'none';
        }
    }

    // Potongan Inhealth
    let potonganInhealth = 0;
    if (statusPasien === 'Inhealth') {
        const potonganEl = document.getElementById('potongan');
        if (potonganEl) {
            potonganInhealth = parseFloat(potonganEl.value) || 0;
        }
    }

    // Total akhir
    const totalAkhir = Math.max(0, subtotalTindakan + subtotalObat - potonganTindakan - potonganObat - potonganInhealth);
    document.getElementById('total-biaya').textContent = 'Rp ' + totalAkhir.toLocaleString('id-ID');
}





                let resepIndex = 0;


                function addResepRow() {
                    const selectId = `select-obat-${resepIndex}`;
                    const row = document.createElement('div');
                    row.classList.add('resep-row', 'p-4', 'border', 'rounded-md', 'bg-gray-50', 'space-y-3');
                    row.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
            <div>
                <label class="block text-sm font-medium text-gray-700">Pilih Obat</label>
                <select id="${selectId}" name="resep[${resepIndex}][obat_id]" class="obat-select" required>
                    <option value="">-- Pilih dari Stok --</option>
                    ${obats.map(obat =>
                        `<option value="${obat.id}" 
                                                                                                 data-harga-resep="${obat.harga_jual_resep}" 
                                                                                                 data-harga-nonresep="${obat.harga_jual_non_resep}">
                                                                                            ${obat.nama_obat} (Stok: ${obat.stok})
                                                                                         </option>`
                    ).join('')}
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Tipe Harga</label>
                <select name="resep[${resepIndex}][tipe_harga]" 
                        class="tipe-harga-select mt-1 block w-full rounded-md border-gray-300" required>
                    <option value="resep">Harga Resep</option>
                    <option value="non_resep">Harga Non-Resep</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                <input type="number" name="resep[${resepIndex}][jumlah]" 
                       class="jumlah-input mt-1 block w-full rounded-md border-gray-300" 
                       min="1" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="text" class="harga-obat mt-1 block w-full rounded-md border-gray-300 bg-gray-100 text-right" 
                       value="Rp 0" readonly>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Dosis</label>
                <input type="text" name="resep[${resepIndex}][dosis]" 
                       class="mt-1 block w-full rounded-md border-gray-300">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Instruksi</label>
                <input type="text" name="resep[${resepIndex}][instruksi]" 
                       class="mt-1 block w-full rounded-md border-gray-300">
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
                document.body.addEventListener('change', (e) => {
                    if (e.target.matches(
                            '.tindakan-checkbox, .obat-select, .tipe-harga-select, .jumlah-input')) {
                        calculateTotal();
                    }
                });
                document.body.addEventListener('input', (e) => {
                    if (e.target.matches('.jumlah-input')) {
                        calculateTotal();
                    }
                });
                document.body.addEventListener('click', (e) => {
                    if (e.target.classList.contains('hapus-resep')) {
                        e.target.closest('.resep-row').remove();
                        calculateTotal();
                    }
                });

                addResepRow();
                calculateTotal(); // <-- INI YANG AKTIFKAN
            });
        </script>
    @endpush
</x-app-layout>
