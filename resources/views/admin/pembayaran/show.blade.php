<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail & Konfirmasi Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <div class="flex items-center mb-6">
                        <img src="{{ asset('images/logodeliyana.png') }}" 
                             alt="Logo Deliyana Dental Care" 
                             class="w-16 h-16 object-contain mr-4">
                        <div>
                            <h2 class="text-2xl font-bold text-purple-800 leading-tight">Deliyana Dental Care</h2>
                        </div>
                    </div>
                    
                    


                    {{-- AWAL MODIFIKASI: Mengadopsi Tampilan Detail dari Sisi Dokter --}}

                    <div class="grid grid-cols-2 gap-4 mb-6 pb-6 border-b">
                        <div>
                            <h3 class="text-sm text-gray-500">Pasien</h3>
                            <p class="font-bold text-lg text-gray-800">{{ $pemesanan->pasien->name }}
                                ({{ $pemesanan->status_pasien }})</p>
                        </div>
                        <div>
                            <h3 class="text-sm text-gray-500">Tanggal Perawatan</h3>
                            <p class="font-bold text-lg text-gray-800">
                                {{ $rekamMedis->created_at->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <h4 class="font-semibold text-gray-700">Diagnosis</h4>
                            <p class="mt-1 text-gray-600">{{ $rekamMedis->diagnosis }}</p>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-700">Perawatan</h4>
                            <p class="mt-1 text-gray-600">{{ $rekamMedis->perawatan }}</p>
                        </div>
                        @if ($rekamMedis->catatan)
                            <div>
                                <h4 class="font-semibold text-gray-700">Catatan Tambahan</h4>
                                <p class="mt-1 text-gray-600">{{ $rekamMedis->catatan }}</p>
                            </div>
                        @endif
                    </div>

                    <div class="mt-6 border-t pt-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Rincian Tagihan</h3>

                        @php
    $tindakanPasien = $rekamMedis->tindakan->whereIn('id', $tindakanAwalIds);
    $tindakanDokter = $rekamMedis->tindakan->whereNotIn('id', $tindakanAwalIds);
@endphp

@if ($tindakanPasien->isNotEmpty())
    <div class="mb-4">
        <h4 class="text-md font-semibold text-gray-700 mb-2">Tindakan Pilihan Pasien</h4>
        <div class="space-y-2">
            @foreach ($tindakanPasien as $tindakan)
                <div class="flex justify-between items-center">
                    <span class="text-gray-600">
                        {{-- tampilkan kategori (jika ada) dan keterangan tindakan --}}
                        {{ $tindakan->daftarTindakan->nama_kategori ?? '-' }} — {{ $tindakan->keterangan }}
                    </span>
                    <span class="font-medium text-gray-800">
                        Rp {{ number_format($tindakan->pivot->harga_saat_itu, 0, ',', '.') }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>
@endif

@if ($tindakanDokter->isNotEmpty())
    <div class="mb-4 pt-4 border-t border-dashed">
        <h4 class="text-md font-semibold text-gray-700 mb-2">Tindakan Tambahan Dokter</h4>
        <div class="space-y-2">
            @foreach ($tindakanDokter as $tindakan)
                <div class="flex justify-between items-center">
                    <span class="text-gray-600">
                        {{ $tindakan->daftarTindakan->nama_kategori ?? '-' }} — {{ $tindakan->keterangan }}
                    </span>
                    <span class="font-medium text-gray-800">
                        Rp {{ number_format($tindakan->pivot->harga_saat_itu, 0, ',', '.') }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>
@endif


                        @if ($rekamMedis->resep->isNotEmpty())
                            <div class="pt-4 mt-4 border-t border-dashed">
                                <h4 class="text-md font-semibold text-gray-700 mb-2">Biaya Obat</h4>
                                @foreach ($rekamMedis->resep as $item)
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Obat: {{ $item->obat->nama_obat }}
                                            ({{ $item->jumlah }} x Rp
                                            {{ number_format($item->harga_saat_resep, 0, ',', '.') }})
                                        </span>
                                        <span class="font-medium text-gray-800">Rp
                                            {{ number_format($item->jumlah * $item->harga_saat_resep, 0, ',', '.') }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if ($pemesanan->status_pasien == 'BPJS')
                            @if ($potonganTindakan > 0)
                                <div class="flex justify-between items-center text-red-600">
                                    <span>Potongan Tindakan BPJS</span>
                                    <span>- Rp {{ number_format($potonganTindakan, 0, ',', '.') }}</span>
                                </div>
                            @endif
                            @if ($potonganObat > 0)
                                <div class="flex justify-between items-center text-red-600">
                                    <span>Potongan Obat BPJS (Gratis)</span>
                                    <span>- Rp {{ number_format($potonganObat, 0, ',', '.') }}</span>
                                </div>
                            @endif
                        @elseif($pemesanan->status_pasien == 'Inhealth' && $potonganInhealth > 0)
                            <div class="flex justify-between items-center text-red-600">
                                <span>Potongan Inhealth</span>
                                <span>- Rp {{ number_format($potonganInhealth, 0, ',', '.') }}</span>
                            </div>
                        @endif

                        @if ($rekamMedis->pemesanan->pembayaran)
                            <div class="flex justify-between items-center p-3 mt-6 bg-purple-50 rounded-lg">
                                <span class="font-bold text-purple-800">Total Biaya Keseluruhan</span>
                                <span class="font-bold text-lg text-purple-900">
                                    Rp
                                    {{ number_format($rekamMedis->pemesanan->pembayaran->total_biaya, 0, ',', '.') }}
                                </span>
                            </div>
                        @endif
                    </div>

                    @if ($rekamMedis->resep->isNotEmpty())
                        <div class="mt-6 border-t pt-6">
                            <h4 class="text-lg font-semibold mb-4 text-gray-800">Detail Resep Obat</h4>
                            <ul class="list-disc list-inside space-y-2 text-gray-600">
                                @foreach ($rekamMedis->resep as $item)
                                    <li><strong>{{ $item->obat->nama_obat }}</strong> - {{ $item->jumlah }}
                                        {{ $item->obat->kemasan }}. Dosis: {{ $item->dosis }}. Instruksi:
                                        {{ $item->instruksi }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ($rekamMedis->foto->isNotEmpty())
                        <div class="mt-6 border-t pt-6">
                            <h4 class="text-lg font-semibold mb-4 text-gray-800">Foto Pendukung</h4>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                @foreach ($rekamMedis->foto as $foto)
                                    <a href="{{ asset('storage/' . $foto->path_foto) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $foto->path_foto) }}" alt="Foto Rekam Medis"
                                            class="rounded-lg object-cover w-full h-32 hover:opacity-80 transition">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- AKHIR MODIFIKASI --}}


                    {{-- Form Konfirmasi Pembayaran dari Kode Lama (Tetap Ada) --}}
                    @if ($pemesanan->pembayaran->status == 'Belum Lunas')
                        <form method="POST" action="{{ route('admin.pembayaran.store', $pemesanan->id) }}">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                                <div>
                                    <x-input-label for="metode_pembayaran" :value="__('Pilih Metode Pembayaran')" />
                                    <select id="metode_pembayaran" name="metode_pembayaran"
                                        class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm"
                                        required>
                                        <option value="Tunai">Tunai</option>
                                        <option value="Transfer">Transfer</option>
                                        <option value="Kartu Debit/Kredit">Kartu Debit/Kredit</option>
                                    </select>
                                </div>
                                <div class="md:text-right mt-4 md:mt-0">
                                    <x-primary-button
                                        class="w-full md:w-auto justify-center bg-green-600 hover:bg-green-700 text-lg px-8 py-3">
                                        {{ __('Konfirmasi Pembayaran') }}
                                    </x-primary-button>
                                </div>
                            </div>
                        </form>
                    @else
                        <!-- Status Lunas -->
                        <div class="text-center p-6 bg-green-50 rounded-lg">
                            <h3 class="text-xl font-bold text-green-800">LUNAS</h3>
                            <p class="text-green-700 mt-1">
                                Dibayar pada
                                {{ \Carbon\Carbon::parse($pemesanan->pembayaran->tanggal_bayar)->translatedFormat('d F Y, H:i') }}
                                melalui {{ $pemesanan->pembayaran->metode_pembayaran }}.
                            </p>
                            <div class="mt-4">
                                <a href="{{ route('admin.pembayaran.cetak', $pemesanan->id) }}" target="_blank"
                                    class="inline-block px-5 py-2 bg-gray-600 text-white text-sm font-semibold rounded-md hover:bg-gray-700">
                                    Cetak Struk
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
