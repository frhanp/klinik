<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-notification />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Daftar Transaksi Pasien</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 border-b text-left">Tanggal</th>
                                    <th class="py-3 px-4 border-b text-left">Nama Pasien</th>
                                    <th class="py-3 px-4 border-b text-left">Total Biaya</th>
                                    <th class="py-3 px-4 border-b text-center">Status Pembayaran</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pemesanans as $pemesanan)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3 px-4 border-b">{{ $pemesanan->tanggal_pesan }}</td>
                                        <td class="py-3 px-4 border-b">{{ $pemesanan->pasien->name }}</td>
                                        <td class="py-3 px-4 border-b">
                                            @if($pemesanan->pembayaran)
                                                Rp {{ number_format($pemesanan->pembayaran->total_biaya, 0, ',', '.') }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="py-3 px-4 border-b text-center">
                                            @if($pemesanan->pembayaran && $pemesanan->pembayaran->status == 'Lunas')
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Lunas
                                                </span>
                                            @else
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Belum Lunas
                                                </span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-4 border-b text-center">
                                            @if($pemesanan->pembayaran && $pemesanan->pembayaran->status == 'Belum Lunas')
                                                <a href="{{ route('admin.pembayaran.show', $pemesanan->id) }}" class="px-4 py-2 bg-purple-600 text-white text-xs font-semibold rounded-md hover:bg-purple-700">
                                                    Proses Bayar
                                                </a>
                                            @else
                                                <a href="{{ route('admin.pembayaran.show', $pemesanan->id) }}" class="text-gray-500 hover:text-gray-700 text-xs font-semibold">
                                                    Lihat Detail
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-4 px-4 text-center text-gray-500">Tidak ada transaksi yang perlu diproses.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>