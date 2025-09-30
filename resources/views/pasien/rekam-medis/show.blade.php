<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Riwayat Kunjungan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    {{-- Informasi Kunjungan --}}
                    <div class="grid grid-cols-2 gap-4 mb-6 pb-6 border-b">
                        <div>
                            <h3 class="text-sm text-gray-500">Tanggal Perawatan</h3>
                            <p class="font-bold text-lg text-gray-800">{{ \Carbon\Carbon::parse($rekamMedis->created_at)->translatedFormat('d F Y') }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm text-gray-500">Dokter</h3>
                            <p class="font-bold text-lg text-gray-800">{{ $rekamMedis->pemesanan->dokter->user->name }}</p>
                        </div>
                    </div>

                    {{-- Detail Medis --}}
                    <div class="space-y-6">
                        <div>
                            <h4 class="font-semibold text-gray-700">Diagnosis</h4>
                            <p class="mt-1 text-gray-600">{{ $rekamMedis->diagnosis }}</p>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-700">Perawatan</h4>
                            <p class="mt-1 text-gray-600">{{ $rekamMedis->perawatan }}</p>
                        </div>
                        @if($rekamMedis->catatan)
                        <div>
                            <h4 class="font-semibold text-gray-700">Catatan Dokter</h4>
                            <p class="mt-1 text-gray-600">{{ $rekamMedis->catatan }}</p>
                        </div>
                        @endif
                    </div>

                    {{-- Rincian Pembayaran --}}
                    @if($rekamMedis->pemesanan->pembayaran)
                    <div class="mt-6 border-t pt-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Rincian Pembayaran</h3>
                        
                        @php
                            $tindakanPasien = $rekamMedis->tindakan->whereIn('id', $tindakanAwalIds);
                            $tindakanDokter = $rekamMedis->tindakan->whereNotIn('id', $tindakanAwalIds);
                        @endphp

                        {{-- [MODIFIKASI] Blok untuk Tindakan Pilihan Pasien --}}
                        @if($tindakanPasien->isNotEmpty())
                            <div class="mb-4">
                                <h4 class="text-md font-semibold text-gray-700 mb-2">Tindakan Pilihan Anda</h4>
                                <div class="space-y-2">
                                    @foreach($tindakanPasien as $tindakan)
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">{{ $tindakan->keterangan }}</span>
                                        <span class="font-medium text-gray-800">Rp {{ number_format($tindakan->pivot->harga_saat_itu, 0, ',', '.') }}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- [MODIFIKASI] Blok untuk Tindakan Tambahan Dokter --}}
                        @if($tindakanDokter->isNotEmpty())
                             <div class="mb-4 pt-4 border-t border-dashed">
                                <h4 class="text-md font-semibold text-gray-700 mb-2">Tindakan Tambahan Dokter</h4>
                                <div class="space-y-2">
                                    @foreach($tindakanDokter as $tindakan)
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">{{ $tindakan->keterangan }}</span>
                                        <span class="font-medium text-gray-800">Rp {{ number_format($tindakan->pivot->harga_saat_itu, 0, ',', '.') }}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        
                        {{-- Rincian Obat --}}
                        @if($rekamMedis->resep->isNotEmpty())
                            <div class="pt-4 mt-4 border-t border-dashed">
                                <h4 class="text-md font-semibold text-gray-700 mb-2">Biaya Obat</h4>
                                @foreach($rekamMedis->resep as $item)
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Obat: {{ $item->obat->nama_obat }} ({{ $item->jumlah }} x Rp {{ number_format($item->harga_saat_resep, 0, ',', '.') }})</span>
                                    <span class="font-medium text-gray-800">Rp {{ number_format($item->jumlah * $item->harga_saat_resep, 0, ',', '.') }}</span>
                                </div>
                                @endforeach
                            </div>
                        @endif
                    
                        {{-- Total Biaya --}}
                        <div class="flex justify-between items-center p-3 mt-6 bg-purple-50 rounded-lg">
                            <span class="font-bold text-purple-800">Total Biaya Keseluruhan</span>
                            <span class="font-bold text-lg text-purple-900">
                                Rp {{ number_format($rekamMedis->pemesanan->pembayaran->total_biaya, 0, ',', '.') }}
                            </span>
                        </div>
                         <div class="mt-4 text-right">
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                LUNAS
                            </span>
                        </div>
                    </div>
                    @endif

                    {{-- Detail Resep & Foto (jika ada) --}}
                    @if($rekamMedis->resep->isNotEmpty())
                    <div class="mt-6 border-t pt-6">
                        <h4 class="text-lg font-semibold mb-4 text-gray-800">Detail Resep Obat</h4>
                        <ul class="list-disc list-inside space-y-2 text-gray-600">
                            @foreach($rekamMedis->resep as $item)
                                <li><strong>{{ $item->obat->nama_obat }}</strong> - {{ $item->jumlah }} {{ $item->obat->kemasan }}. Dosis: {{ $item->dosis }}. Instruksi: {{ $item->instruksi }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if($rekamMedis->foto->isNotEmpty())
                    <div class="mt-6 border-t pt-6">
                        <h4 class="text-lg font-semibold mb-4 text-gray-800">Foto Pendukung</h4>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach($rekamMedis->foto as $foto)
                                <a href="{{ asset('storage/' . $foto->path_foto) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $foto->path_foto) }}" alt="Foto Rekam Medis" class="rounded-lg object-cover w-full h-32 hover:opacity-80 transition">
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- Tombol Kembali --}}
                    <div class="mt-8 border-t pt-6 text-right">
                        <a href="{{ route('pasien.pemesanan.index') }}" class="text-purple-600 hover:text-purple-800 font-semibold">
                            &larr; Kembali ke Riwayat Pemesanan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>