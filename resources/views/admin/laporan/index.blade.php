<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Pendapatan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Card Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-gray-500 text-sm font-medium">Total Pendapatan</h3>
                    <p class="text-3xl font-semibold text-gray-800">
                        Rp. {{ number_format($totalPendapatan, 0, ',', '.') }}
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-gray-500 text-sm font-medium">Total Transaksi</h3>
                    <p class="text-3xl font-semibold text-gray-800">{{ $totalTransaksi }}</p>
                </div>
            </div>           

            {{-- Grafik --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg mb-4">Grafik Pendapatan Harian</h3>
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>

            {{-- Laporan & Filter --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg mb-4">Filter Laporan</h3>
                    <form action="{{ route('admin.laporan.index') }}" method="GET">
                        {{-- [MODIFIKASI] Ubah grid layout untuk 5 item --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
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
                            {{-- <div>
                                <x-input-label for="status" :value="__('Status Janji')" />
                                <select name="status" id="status"
                                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300">
                                    <option value="">Semua</option>
                                    @foreach ($statusOptions as $status)
                                        <option value="{{ $status }}" @selected(request('status') == $status)>
                                            {{ ucfirst($status) }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            {{-- [MODIFIKASI] Tambahkan dropdown Status Pasien --}}
                            <div>
                                <x-input-label for="status_pasien" :value="__('Status Pasien')" />
                                <select name="status_pasien" id="status_pasien"
                                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300">
                                    <option value="">Semua</option>
                                    @foreach ($statusPasienOptions as $status)
                                        <option value="{{ $status }}" @selected(request('status_pasien') == $status)>
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

                    {{-- [MODIFIKASI] Tambahkan div dengan class 'overflow-x-auto' di sini --}}
                    <div class="mt-6 overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">NIK</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pasien
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status Pasien
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dokter
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tindakan
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Resep
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
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $item->pasien->biodata->nik ?? '-' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $item->pasien->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $item->pasien->biodata->status_pasien ?? '-' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $item->dokter->user->name }}</td>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            @if ($item->rekamMedis && $item->rekamMedis->tindakan->isNotEmpty())
                                                <ul class="list-disc list-inside">
                                                    @foreach ($item->rekamMedis->tindakan as $tindakan)
                                                        <li>{{ $tindakan->keterangan }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            @if ($item->rekamMedis && $item->rekamMedis->resep->isNotEmpty())
                                                <ul class="list-disc list-inside">
                                                    @foreach ($item->rekamMedis->resep as $resep)
                                                        <li>{{ $resep->obat->nama_obat }} ({{ $resep->jumlah }})</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @if ($item->status !== 'Menunggu Pembayaran' && $item->pembayaran)
                                                {{ \Carbon\Carbon::parse($item->pembayaran->tanggal_bayar)->format('d/m/Y') }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $item->pembayaran ? ucfirst($item->pembayaran->metode_pembayaran) : '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @php
                                                $status = $item->status;
                                                $badgeColor =
                                                    [
                                                        'Selesai' => 'bg-green-100 text-green-800',
                                                        'Menunggu Pembayaran' => 'bg-yellow-100 text-yellow-800',
                                                        'Dikonfirmasi' => 'bg-blue-100 text-blue-800',
                                                    ][$status] ?? 'bg-gray-100 text-gray-800';
                                            @endphp
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $badgeColor }}">
                                                {{ $status }}
                                            </span>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium text-right">
                                            {{ $item->pembayaran ? 'Rp. ' . number_format($item->pembayaran->total_biaya, 0, ',', '.') : '-' }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="px-6 py-4 text-center text-sm text-gray-500">
                                            Tidak ada data untuk filter yang dipilih.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div> {{-- Penutup div overflow --}}
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(ctx, {
                type: 'line',
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
