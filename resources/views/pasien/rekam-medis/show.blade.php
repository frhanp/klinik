<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Riwayat Kunjungan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="flex items-center  pl-4 pt-4">
                    <img src="{{ asset('images/logodeliyana.png') }}" alt="Logo Deliyana Dental Care"
                        class="w-14 h-14 object-contain mr-4">
                    <div>
                        <h1 class="text-2xl font-bold text-purple-700 leading-tight">Deliyana Dental Care</h1>
                    </div>
                </div>

                <div class="p-6 md:p-8 bg-white border-b border-gray-200">

                    {{-- Informasi Kunjungan --}}
                    <div class="grid grid-cols-2 gap-4 mb-6 pb-6 border-b">
                        <div>
                            <h3 class="text-sm text-gray-500">Status Pasien</h3>
                            <p class="font-bold text-lg text-gray-800">{{ $rekamMedis->pemesanan->status_pasien }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm text-gray-500">Nomor BPJS</h3>
                            <p class="font-bold text-lg text-gray-800">{{ $rekamMedis->pemesanan->nomor_bpjs }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm text-gray-500">Tanggal Perawatan</h3>
                            <p class="font-bold text-lg text-gray-800">
                                {{ \Carbon\Carbon::parse($rekamMedis->created_at)->translatedFormat('d F Y') }}
                            </p>
                        </div>
                        <div>
                            <h3 class="text-sm text-gray-500">Dokter</h3>
                            <p class="font-bold text-lg text-gray-800">
                                {{ $rekamMedis->pemesanan->dokter->user->name }}
                            </p>
                        </div>
                    </div>

                    {{-- Detail Medis --}}
                    <div class="space-y-6">
                        @if ($rekamMedis->subject)
                            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                                <h4 class="font-bold text-purple-800 mb-3 border-b pb-2">Pemeriksaan Medis (SOAP)</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <span class="block font-semibold text-gray-700 text-sm">S - Subjective</span>
                                        <p class="mt-1 text-gray-800">{{ $rekamMedis->subject }}</p>
                                    </div>
                                    <div>
                                        <span class="block font-semibold text-gray-700 text-sm">O - Objective</span>
                                        <p class="mt-1 text-gray-800">{{ $rekamMedis->object }}</p>
                                    </div>
                                    <div>
                                        <span class="block font-semibold text-gray-700 text-sm">A - Assessment</span>
                                        <p class="mt-1 text-gray-800">{{ $rekamMedis->assessment }}</p>
                                    </div>
                                    <div>
                                        <span class="block font-semibold text-gray-700 text-sm">P - Plan</span>
                                        <p class="mt-1 text-gray-800">{{ $rekamMedis->plan }}</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div>
                                <h4 class="font-semibold text-gray-700">Diagnosis</h4>
                                <p class="mt-1 text-gray-600">{{ $rekamMedis->diagnosis }}</p>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-700">Perawatan</h4>
                                <p class="mt-1 text-gray-600">{{ $rekamMedis->perawatan }}</p>
                            </div>
                        @endif
                        @if ($rekamMedis->catatan)
                            <div>
                                <h4 class="font-semibold text-gray-700">Catatan Dokter</h4>
                                <p class="mt-1 text-gray-600">{{ $rekamMedis->catatan }}</p>
                            </div>
                        @endif
                    </div>
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

                    {{-- <div class="mt-6 border-t pt-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Rincian Tagihan</h3>

                        @php
                            $tindakanPasien = $rekamMedis->tindakan->whereIn(
                                'id',
                                $rekamMedis->pemesanan->tindakanAwal->pluck('id')->toArray(),
                            );
                            $tindakanDokter = $rekamMedis->tindakan->whereNotIn(
                                'id',
                                $rekamMedis->pemesanan->tindakanAwal->pluck('id')->toArray(),
                            );

                            $subtotalTindakan = $rekamMedis->tindakan->sum(fn($t) => $t->pivot->harga_saat_itu);
                            $subtotalObat = $rekamMedis->resep->sum(fn($r) => $r->jumlah * $r->harga_saat_resep);
                            $jumlahTindakan = $rekamMedis->tindakan->count();
                            $pembayaran = $rekamMedis->pemesanan->pembayaran;

                            $potonganTindakan = 0;
                            $potonganObat = 0;
                            $potonganInhealth = 0;

                            if ($rekamMedis->pemesanan->status_pasien == 'BPJS') {
                                $potonganTindakan = $jumlahTindakan * 2500;
                                $potonganObat = $subtotalObat;
                            }

                            if ($rekamMedis->pemesanan->status_pasien == 'Inhealth' && $pembayaran) {
                                $potonganInhealth = $pembayaran->potongan;
                            }
                        @endphp

                <!-- Tindakan Pasien -->
                        @if ($tindakanPasien->isNotEmpty())
                            <div class="mb-4">
                                <h4 class="text-md font-semibold text-gray-700 mb-2">Tindakan Pilihan Pasien</h4>
                                <div class="space-y-1">
                                    @foreach ($tindakanPasien as $tindakan)
                                        <div class="flex justify-between items-center text-sm">
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

                        <!-- Tindakan Tambahan Dokter -->
                        @if ($tindakanDokter->isNotEmpty())
                            <div class="mb-4 pt-4 border-t border-dashed">
                                <h4 class="text-md font-semibold text-gray-700 mb-2">Tindakan Tambahan Dokter</h4>
                                <div class="space-y-1">
                                    @foreach ($tindakanDokter as $tindakan)
                                        <div class="flex justify-between items-center text-sm">
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

                        <!-- Obat -->
                        @if ($rekamMedis->resep->isNotEmpty())
                            <div class="pt-4 mt-4 border-t border-dashed">
                                <h4 class="text-md font-semibold text-gray-700 mb-2">Biaya Obat</h4>
                                @foreach ($rekamMedis->resep as $item)
                                    <div class="flex justify-between items-center text-sm">
                                        <span class="text-gray-600">
                                            {{ $item->obat->nama_obat }} ({{ $item->jumlah }} x Rp {{ number_format($item->harga_saat_resep, 0, ',', '.') }})
                                        </span>
                                        <span class="font-medium text-gray-800">
                                            Rp {{ number_format($item->jumlah * $item->harga_saat_resep, 0, ',', '.') }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <!-- Subtotal -->
                        <div class="mt-4">
                            <div class="pt-4 mt-4 border-t border-dashed">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Subtotal Tindakan</span>
                                    <span class="font-medium text-gray-800">Rp {{ number_format($subtotalTindakan, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Subtotal Obat</span>
                                    <span class="font-medium text-gray-800">Rp {{ number_format($subtotalObat, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Potongan -->
                        @if ($rekamMedis->pemesanan->status_pasien == 'BPJS')
                            <div class="flex justify-between items-center text-red-600">
                                <span>Potongan BPJS Tindakan</span>
                                <span>- Rp {{ number_format($potonganTindakan, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between items-center text-red-600">
                                <span>Potongan BPJS Obat</span>
                                <span>- Rp {{ number_format($potonganObat, 0, ',', '.') }}</span>
                            </div>
                        @elseif ($rekamMedis->pemesanan->status_pasien == 'Inhealth' && $potonganInhealth > 0)
                            <div class="flex justify-between items-center text-red-600">
                                <span>Potongan Inhealth</span>
                                <span>- Rp {{ number_format($potonganInhealth, 0, ',', '.') }}</span>
                            </div>
                        @endif

                        <!-- Total -->
                        @if ($pembayaran)
                            <div class="flex justify-between items-center p-3 mt-4 bg-purple-50 rounded-lg">
                                <span class="font-bold text-purple-800">Total Biaya Keseluruhan</span>
                                <span class="font-bold text-lg text-purple-900">
                                    Rp {{ number_format($pembayaran->total_biaya, 0, ',', '.') }}
                                </span>
                            </div>
                        @endif
                    </div> --}}

                    <!-- Resep & Foto -->
                    @if ($rekamMedis->resep->isNotEmpty())
                        <div class="mt-6 border-t pt-6">
                            <h4 class="text-lg font-semibold mb-4 text-gray-800">Detail Resep Obat</h4>
                            <ul class="list-disc list-inside space-y-2 text-gray-600">
                                @foreach ($rekamMedis->resep as $item)
                                    <li>
                                        <strong>{{ $item->obat->nama_obat }}</strong> - {{ $item->jumlah }}
                                        {{ $item->obat->kemasan }}.
                                        Dosis: {{ $item->dosis }}. Instruksi: {{ $item->instruksi }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif



                    <!-- Tombol Kembali -->
                    <div class="mt-8 border-t pt-6 text-right">
                        <a href="{{ route('pasien.pemesanan.index') }}"
                            class="text-purple-600 hover:text-purple-800 font-semibold">
                            &larr; Kembali ke Riwayat Pemesanan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
