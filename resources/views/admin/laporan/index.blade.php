<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Klinik') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Filter Tanggal -->
                    <form method="GET" action="{{ route('admin.laporan.index') }}" class="mb-6 p-4 border rounded-lg bg-gray-50">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                            <div>
                                <x-input-label for="tanggal_mulai" :value="__('Dari Tanggal')" />
                                <x-text-input id="tanggal_mulai" type="date" name="tanggal_mulai" class="w-full" value="{{ $tanggalMulai }}" />
                            </div>
                            <div>
                                <x-input-label for="tanggal_selesai" :value="__('Sampai Tanggal')" />
                                <x-text-input id="tanggal_selesai" type="date" name="tanggal_selesai" class="w-full" value="{{ $tanggalSelesai }}" />
                            </div>
                            <x-primary-button class="w-full md:w-auto justify-center">
                                Tampilkan Laporan
                            </x-primary-button>
                        </div>
                    </form>

                    <!-- Ringkasan Data -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="bg-purple-100 p-6 rounded-lg shadow">
                            <h3 class="text-sm font-medium text-purple-800">Total Pendapatan</h3>
                            <p class="mt-2 text-3xl font-bold text-purple-900">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                        </div>
                        <div class="bg-blue-100 p-6 rounded-lg shadow">
                            <h3 class="text-sm font-medium text-blue-800">Total Transaksi Lunas</h3>
                            <p class="mt-2 text-3xl font-bold text-blue-900">{{ $totalTransaksi }}</p>
                        </div>
                        <div class="bg-green-100 p-6 rounded-lg shadow">
                            <h3 class="text-sm font-medium text-green-800">Total Kunjungan Pasien</h3>
                            <p class="mt-2 text-3xl font-bold text-green-900">{{ $totalKunjungan }}</p>
                        </div>
                    </div>

                    <!-- Tabel Detail Transaksi -->
                    <h3 class="text-lg font-semibold mb-4">Detail Transaksi Lunas</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 border-b text-left">Tanggal Bayar</th>
                                    <th class="py-3 px-4 border-b text-left">Pasien</th>
                                    <th class="py-3 px-4 border-b text-left">Dokter</th>
                                    <th class="py-3 px-4 border-b text-right">Total Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($laporanPembayaran as $pembayaran)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3 px-4 border-b">{{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->translatedFormat('d M Y, H:i') }}</td>
                                        <td class="py-3 px-4 border-b">{{ $pembayaran->pemesanan->pasien->name }}</td>
                                        <td class="py-3 px-4 border-b">{{ $pembayaran->pemesanan->dokter->user->name }}</td>
                                        <td class="py-3 px-4 border-b text-right">Rp {{ number_format($pembayaran->total_biaya, 0, ',', '.') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-4 px-4 text-center text-gray-500">Tidak ada data transaksi lunas pada rentang tanggal ini.</td>
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