<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Pendapatan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-gray-500 text-sm font-medium">Total Pendapatan</h3>
                    <p class="text-3xl font-semibold text-gray-800">Rp.
                        {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-gray-500 text-sm font-medium">Total Transaksi</h3>
                    <p class="text-3xl font-semibold text-gray-800">{{ $totalTransaksi }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-gray-500 text-sm font-medium">Pasien Unik</h3>
                    <p class="text-3xl font-semibold text-gray-800">{{ $pasienUnik }}</p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg mb-4">Grafik Pendapatan Harian</h3>
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg mb-4">Filter Laporan</h3>
                    <form action="{{ route('admin.laporan.index') }}" method="GET">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                            {{-- [MODIFIKASI] Form filter dibuat lebih rapi --}}
                            <div>
                                <x-input-label for="start_date" :value="__('Tanggal Mulai')" />
                                <x-text-input type="date" id="start_date" name="start_date" class="mt-1 block w-full"
                                    value="{{ request('start_date', now()->subMonth()->format('Y-m-d')) }}" />
                            </div>
                            <div>
                                <x-input-label for="end_date" :value="__('Tanggal Selesai')" />
                                <x-text-input type="date" id="end_date" name="end_date" class="mt-1 block w-full"
                                    value="{{ request('end_date', now()->format('Y-m-d')) }}" />
                            </div>
                            <div>
                                <x-input-label for="metode_pembayaran" :value="__('Metode Pembayaran')" />
                                <select name="metode_pembayaran" id="metode_pembayaran"
                                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300">
                                    <option value="">Semua</option>
                                    @foreach ($metodePembayaranOptions as $metode)
                                        <option value="{{ $metode }}" @selected(request('metode_pembayaran') == $metode)>
                                            {{ ucfirst($metode) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <x-input-label for="status" :value="__('Status')" />
                                <select name="status" id="status"
                                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300">
                                    <option value="">Semua</option>
                                    @foreach ($statusOptions as $status)
                                        <option value="{{ $status }}" @selected(request('status') == $status)>
                                            {{ ucfirst($status) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 mt-4">
                            <x-primary-button type="submit">{{ __('Filter') }}</x-primary-button>
                            @if (request()->filled('start_date') && request()->filled('end_date'))
                                <a href="{{ route('admin.laporan.cetak', request()->all()) }}"
                                    class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500">
                                    Cetak Laporan
                                </a>
                            @endif
                        </div>
                    </form>

                    <div class="mt-6 overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    {{-- [MODIFIKASI] Kolom tabel disesuaikan --}}
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pasien
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dokter
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tgl.
                                        Bayar</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Metode
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status
                                    </th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Total
                                        Biaya</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($laporan as $item)
                                    <tr>
                                        {{-- [TETAP] Data Pasien dan Dokter --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $item->pasien->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $item->dokter->user->name }}</td>

                                        {{-- [MODIFIKASI] Cek jika pembayaran ada, tampilkan tanggal bayar --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @if ($item->status !== 'Menunggu Pembayaran' && $item->pembayaran)
                                                {{ \Carbon\Carbon::parse($item->pembayaran->tanggal_bayar)->format('d/m/Y') }}
                                            @else
                                                -
                                            @endif
                                        </td>

                                        {{-- [MODIFIKASI] Cek jika pembayaran ada, tampilkan metode --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $item->pembayaran ? ucfirst($item->pembayaran->metode_pembayaran) : '-' }}
                                        </td>

                                        {{-- [MODIFIKASI] Badge warna disesuaikan --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @php
                                                $status = $item->status;
                                                $badgeColor =
                                                    [
                                                        'Selesai' => 'bg-green-100 text-green-800',
                                                        'Menunggu Pembayaran' => 'bg-yellow-100 text-yellow-800',
                                                        'dikonfirmasi' => 'bg-blue-100 text-blue-800',
                                                        'dibatalkan' => 'bg-red-100 text-red-800',
                                                    ][$status] ?? 'bg-gray-100 text-gray-800';
                                            @endphp
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $badgeColor }}">
                                                {{ $status }}
                                            </span>
                                        </td>

                                        {{-- [MODIFIKASI] Cek jika pembayaran ada, tampilkan total biaya --}}
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium text-right">
                                            {{ $item->pembayaran ? 'Rp. ' . number_format($item->pembayaran->total_biaya, 0, ',', '.') : '-' }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                                            Tidak ada data untuk filter yang dipilih.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(ctx, {
                type: 'line', // Tipe grafik: line, bar, pie, etc.
                data: {
                    labels: @json($chartData['labels']),
                    datasets: [{
                        label: 'Pendapatan',
                        data: @json($chartData['data']),
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        tension: 0.3
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endpush
</x-app-layout>
