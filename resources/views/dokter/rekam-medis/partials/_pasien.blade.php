{{-- Data Pribadi & Medis Pasien --}}
@if ($pemesanan->pasien->biodata)
<div class="mt-6 p-5 bg-gray-50 border border-gray-200 rounded-lg">
    <h3 class="text-lg font-bold text-purple-800 mb-4 pb-2 border-b border-purple-200">
        Data Pribadi & Medis Pasien
    </h3>

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
