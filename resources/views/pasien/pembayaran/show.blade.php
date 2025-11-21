<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
             <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Rincian Tagihan') }}
            </h2>
             <a href="{{ route('pasien.pembayaran.index') }}" class="text-sm text-gray-600 hover:text-gray-900">&larr; Kembali</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    
                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-bold text-purple-800">Deliyana Dental Care</h3>
                        <p class="text-gray-500">Rincian Transaksi Pasien</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-6 text-sm">
                        <div><strong>Dokter:</strong> {{ $pemesanan->dokter->user->name }}</div>
                        <div><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($pemesanan->tanggal_pesan)->translatedFormat('d F Y') }}</div>
                        <div><strong>Status Pasien:</strong> {{ $pemesanan->status_pasien }}</div>
                        <div><strong>Metode Bayar:</strong> {{ $pemesanan->pembayaran->metode_pembayaran ?? '-' }}</div>
                    </div>

                    <div class="border-t pt-6">
                        <h4 class="font-bold text-gray-800 mb-4">Rincian Biaya</h4>
                        
                        {{-- Rincian Item --}}
                        <div class="space-y-2 mb-4 text-sm">
                            @foreach($rekamMedis->tindakan as $tindakan)
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">{{ $tindakan->keterangan }}</span>
                                <span class="font-medium text-gray-800">Rp {{ number_format($tindakan->pivot->harga_saat_itu, 0, ',', '.') }}</span>
                            </div>
                            @endforeach

                            @if($rekamMedis->resep->isNotEmpty())
                            <div class="pt-2 mt-2 border-t border-dashed">
                                @foreach($rekamMedis->resep as $item)
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Obat: {{ $item->obat->nama_obat }} ({{ $item->jumlah }}x)</span>
                                    <span class="font-medium text-gray-800">Rp {{ number_format($item->harga_saat_resep * $item->jumlah, 0, ',', '.') }}</span>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        
                        {{-- Rincian Kalkulasi --}}
                        <div class="mt-6 pt-4 border-t border-gray-200">
                            <div class="space-y-2 max-w-sm ml-auto">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Subtotal</span>
                                    <span class="font-semibold text-gray-800">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                                </div>

                                @if($pemesanan->status_pasien == 'BPJS')
                                    @if($potonganTindakan > 0)
                                    <div class="flex justify-between items-center text-red-600">
                                        <span>Potongan BPJS (Tindakan)</span>
                                        <span>- Rp {{ number_format($potonganTindakan, 0, ',', '.') }}</span>
                                    </div>
                                    @endif
                                    @if($potonganObat > 0)
                                    <div class="flex justify-between items-center text-red-600">
                                        <span>Potongan BPJS (Obat)</span>
                                        <span>- Rp {{ number_format($potonganObat, 0, ',', '.') }}</span>
                                    </div>
                                    @endif
                                @elseif($pemesanan->status_pasien == 'Inhealth' && $potonganInhealth > 0)
                                    <div class="flex justify-between items-center text-red-600">
                                        <span>Potongan Inhealth</span>
                                        <span>- Rp {{ number_format($potonganInhealth, 0, ',', '.') }}</span>
                                    </div>
                                @endif

                                <div class="flex justify-between items-center pt-4 border-t border-gray-300">
                                    <span class="font-bold text-lg text-gray-800">Total Bayar</span>
                                    <span class="font-bold text-xl text-purple-700">Rp {{ number_format($pemesanan->pembayaran->total_biaya, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Status Lunas --}}
                        @if($pemesanan->pembayaran->status == 'Lunas')
                        <div class="mt-8 text-center">
                             <span class="px-4 py-2 bg-green-100 text-green-800 font-bold rounded-full border border-green-200 text-lg">LUNAS</span>
                             <p class="text-xs text-gray-500 mt-2">Dibayar pada {{ \Carbon\Carbon::parse($pemesanan->pembayaran->tanggal_bayar)->format('d/m/Y H:i') }}</p>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>