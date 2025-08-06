<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Rekam Medis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <!-- Informasi Pasien & Dokter -->
                    <div class="grid grid-cols-2 gap-4 mb-6 pb-6 border-b">
                        <div>
                            <h3 class="text-sm text-gray-500">Pasien</h3>
                            <p class="font-bold text-lg text-gray-800">{{ $rekamMedis->pemesanan->pasien->name }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm text-gray-500">Tanggal Perawatan</h3>
                            <p class="font-bold text-lg text-gray-800">{{ \Carbon\Carbon::parse($rekamMedis->created_at)->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>

                    <!-- Detail Medis -->
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
                            <h4 class="font-semibold text-gray-700">Catatan Tambahan</h4>
                            <p class="mt-1 text-gray-600">{{ $rekamMedis->catatan }}</p>
                        </div>
                        @endif
                    </div>

                    <!-- Rincian Biaya -->
                    @if($rekamMedis->tindakan->isNotEmpty())
                    <div class="mt-6 border-t pt-6">
                        <h4 class="text-lg font-semibold mb-4 text-gray-800">Tindakan & Biaya</h4>
                        <div class="space-y-2 mb-4">
                            @foreach($rekamMedis->tindakan as $tindakan)
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">{{ $tindakan->nama_tindakan }}</span>
                                <span class="font-medium text-gray-800">Rp {{ number_format($tindakan->pivot->harga_saat_itu, 0, ',', '.') }}</span>
                            </div>
                            @endforeach
                        </div>
                        <div class="flex justify-between items-center p-3 bg-purple-50 rounded-lg">
                            <span class="font-bold text-purple-800">Total Biaya</span>
                            <span class="font-bold text-lg text-purple-900">Rp {{ number_format($rekamMedis->tindakan->sum('pivot.harga_saat_itu'), 0, ',', '.') }}</span>
                        </div>
                    </div>
                    @endif

                    <!-- Resep Obat -->
                    @if($rekamMedis->resep->isNotEmpty())
                    <div class="mt-6 border-t pt-6">
                        <h4 class="text-lg font-semibold mb-4 text-gray-800">Resep Obat</h4>
                        <ul class="list-disc list-inside space-y-2 text-gray-600">
                            @foreach($rekamMedis->resep as $item)
                                <li><strong>{{ $item->nama_obat }}</strong> ({{ $item->dosis }}) - {{ $item->instruksi }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Foto Pendukung -->
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

                    <div class="mt-8 border-t pt-6 text-right">
                        <a href="{{ route('dokter.rekam-medis.index') }}" class="text-purple-600 hover:text-purple-800 font-semibold">
                            &larr; Kembali ke Riwayat
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>