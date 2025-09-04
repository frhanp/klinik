<x-print-layout>
    <x-slot name="title">Struk Pembayaran {{ $pemesanan->pasien->name }}</x-slot>

    <div class="max-w-2xl mx-auto my-8 bg-white shadow-lg">
        <div class="p-8">
            <div class="flex justify-between items-start pb-4 border-b">
                <div>
                    <h1 class="text-2xl font-bold text-purple-700">INVOICE</h1>
                    <p class="text-gray-500">Klinik Sehat Selalu</p>
                    <p class="text-xs text-gray-500">Jl. Kesehatan No. 123, Kota Anda</p>
                </div>
                <div class="text-right">
                    <p class="font-semibold">Invoice #{{ str_pad($pemesanan->pembayaran->id, 6, '0', STR_PAD_LEFT) }}</p>
                    <p class="text-sm text-gray-600">Tanggal: {{ \Carbon\Carbon::parse($pemesanan->pembayaran->tanggal_bayar ?? now())->translatedFormat('d F Y') }}</p>
                </div>
            </div>

            <div class="mt-6">
                <p class="text-sm text-gray-500">Tagihan Untuk:</p>
                <p class="font-semibold text-gray-800">{{ $pemesanan->pasien->name }}</p>
            </div>

            <div class="mt-6">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="py-2 px-4 text-left text-sm font-semibold text-gray-600">Deskripsi Layanan</th>
                            <th class="py-2 px-4 text-right text-sm font-semibold text-gray-600">Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Rincian Tindakan --}}
                        @if($pemesanan->rekamMedis && $pemesanan->rekamMedis->tindakan->isNotEmpty())
                            @foreach($pemesanan->rekamMedis->tindakan as $tindakan)
                            <tr class="border-b">
                                {{-- [FIX] Menggunakan 'keterangan' --}}
                                <td class="py-3 px-4">{{ $tindakan->keterangan }}</td>
                                <td class="py-3 px-4 text-right">Rp {{ number_format($tindakan->pivot->harga_saat_itu, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        @endif

                        {{-- [BARU] Rincian Resep Obat --}}
                        @if($pemesanan->rekamMedis && $pemesanan->rekamMedis->resep->isNotEmpty())
                             @foreach($pemesanan->rekamMedis->resep as $item)
                            <tr class="border-b">
                                <td class="py-3 px-4">Obat: {{ $item->obat->nama_obat }} ({{ $item->jumlah }}x)</td>
                                <td class="py-3 px-4 text-right">Rp {{ number_format($item->jumlah * $item->harga_saat_resep, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex justify-end">
                <div class="w-full max-w-xs">
                    <div class="flex justify-between py-3 bg-purple-50 px-4 rounded-b-lg">
                        <span class="font-bold text-purple-800">TOTAL</span>
                        <span class="font-bold text-purple-800">Rp {{ number_format($pemesanan->pembayaran->total_biaya, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-center">
                @if($pemesanan->pembayaran->status == 'Lunas')
                    <p class="text-2xl font-bold text-green-600">LUNAS</p>
                    <p class="text-sm text-gray-500">Metode Pembayaran: {{ $pemesanan->pembayaran->metode_pembayaran }}</p>
                @endif
                <p class="mt-4 text-sm text-gray-600">Terima kasih atas kunjungan Anda!</p>
            </div>
        </div>
    </div>

    <div class="max-w-2xl mx-auto my-8 text-center no-print">
        <button onclick="window.print()" class="px-6 py-3 bg-purple-600 text-white font-semibold rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
            Cetak Struk
        </button>
        <a href="{{ route('admin.pembayaran.show', $pemesanan->id) }}" class="ml-4 text-gray-600 hover:text-gray-800">
            Kembali
        </a>
    </div>
</x-print-layout>