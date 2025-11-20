<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Dokter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-notification />
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                {{-- Grafik Layanan --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4 text-gray-700">Layanan Paling Sering Dilakukan</h3>
                    <div class="relative h-64">
                        <canvas id="layananChart"></canvas>
                    </div>
                </div>

                {{-- Grafik Metode Pembayaran --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4 text-gray-700">Metode Pembayaran Pasien</h3>
                    <div class="relative h-64">
                        <canvas id="metodeChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Header Judul --}}
                    <h3 class="text-lg font-semibold mb-4">
                        Antrian Pasien
                        ({{ \Carbon\Carbon::parse(request('tanggal', now()))->translatedFormat('d F Y') }})
                    </h3>

                    {{-- Form filter tanggal --}}
                    <form method="GET" action="{{ route('dokter.dashboard') }}"
                        class="flex flex-wrap items-end gap-4 mb-6">
                        <div>
                            <x-input-label for="tanggal" value="Tanggal" />
                            <x-text-input id="tanggal" name="tanggal" type="date"
                                value="{{ request('tanggal') ?? now()->toDateString() }}" class="mt-1 block w-full" />
                        </div>

                        <div>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">
                                Tampilkan
                            </x-primary-button>

                            @if (request()->has('tanggal'))
                                <a href="{{ route('dokter.dashboard') }}"
                                    class="ml-2 text-sm text-gray-600 hover:text-purple-700">
                                    Reset
                                </a>
                            @endif
                        </div>
                    </form>

                    {{-- Tabel antrian pasien dirapikan --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-200 rounded-lg shadow-sm">
                            <thead class="bg-purple-100 text-purple-800">
                                <tr>
                                    {{-- [MODIFIKASI] Tambah Kolom Antrian --}}
                                    <th class="py-3 px-4 text-left text-sm font-semibold border-b border-gray-200">
                                        Antrian</th>
                                    <th class="py-3 px-4 text-left text-sm font-semibold border-b border-gray-200">Waktu
                                    </th>
                                    <th class="py-3 px-4 text-left text-sm font-semibold border-b border-gray-200">Nama
                                        Pasien & Keluhan</th>
                                    <th class="py-3 px-4 text-left text-sm font-semibold border-b border-gray-200">
                                        Status</th>
                                    <th class="py-3 px-4 text-center text-sm font-semibold border-b border-gray-200">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($pemesananHariIni as $pemesanan)
                                    <tr class="hover:bg-purple-50 transition-colors">
                                        {{-- [MODIFIKASI] Tampilkan Nomor Antrian --}}
                                        <td class="py-3 px-4 align-top text-center font-bold text-lg text-purple-700">
                                            {{ $pemesanan->nomor_antrian ?? '-' }}
                                        </td>
                                        <td class="py-3 px-4 align-top text-gray-700 whitespace-nowrap">
                                            {{ \Carbon\Carbon::parse($pemesanan->waktu_pesan)->format('H:i') }}
                                        </td>

                                        <td class="py-3 px-4 align-top">
                                            {{-- [MODIFIKASI] Tampilkan Status Pasien --}}
                                            <div class="font-semibold text-gray-900">{{ $pemesanan->pasien->name }}
                                                ({{ $pemesanan->status_pasien }})
                                            </div>

                                            {{-- Keluhan Awal --}}
                                            @if ($pemesanan->tindakanAwal->isNotEmpty())
                                                <div class="text-xs text-gray-600 mt-1 space-x-1">
                                                    <span class="font-medium text-gray-500">Keluhan:</span>
                                                    @foreach ($pemesanan->tindakanAwal as $tindakan)
                                                        <span
                                                            class="inline-block bg-purple-100 text-purple-800 px-2 py-0.5 rounded-full mb-1">
                                                            {{ $tindakan->daftarTindakan->nama_kategori ?? '-' }} —
                                                            {{ $tindakan->keterangan }} —
                                                            Rp {{ number_format($tindakan->harga, 0, ',', '.') }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </td>

                                        <td class="py-3 px-4 align-top">
                                            <span
                                                class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                                                {{ $pemesanan->status === 'Dikonfirmasi' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                                                {{ $pemesanan->status }}
                                            </span>
                                        </td>

                                        <td class="py-3 px-4 align-top text-center">
                                            <div class="flex justify-center items-center gap-2">

                                                {{-- Tombol Proses --}}
                                                <a href="{{ route('dokter.rekam-medis.create', ['id_pemesanan' => $pemesanan->id]) }}"
                                                    class="inline-block text-xs font-semibold text-white bg-green-600 hover:bg-green-700 px-3 py-1.5 rounded-md shadow-sm transition">
                                                    Proses
                                                </a>

                                                {{-- Tombol Batalkan --}}
                                                @if ($pemesanan->status === 'Dikonfirmasi')
                                                    <form
                                                        action="{{ route('dokter.pemesanan.cancel', $pemesanan->id) }}"
                                                        method="POST" class="inline-flex items-center gap-2">
                                                        @csrf
                                                        @method('PUT')

                                                        <input type="text" name="reason"
                                                            placeholder="Alasan (opsional)"
                                                            class="border text-xs px-2 py-1 rounded"
                                                            style="width:120px" />

                                                        <button type="submit"
                                                            onclick="return confirm('Batalkan pemesanan ini?')"
                                                            class="text-xs font-semibold px-3 py-1.5 rounded-md shadow-sm bg-red-600 text-white hover:bg-red-700 transition">
                                                            Batalkan
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        {{-- [MODIFIKASI] Colspan diubah jadi 5 --}}
                                        <td colspan="5" class="py-6 px-4 text-center text-gray-600">
                                            Tidak ada antrian untuk tanggal ini.
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // 1. Grafik Layanan (Bar Chart Horizontal)
            const layananCtx = document.getElementById('layananChart').getContext('2d');
            new Chart(layananCtx, {
                type: 'bar',
                data: {
                    labels: @json($layananLabels),
                    datasets: [{
                        label: 'Jumlah Tindakan',
                        data: @json($layananData),
                        backgroundColor: 'rgba(147, 51, 234, 0.6)',
                        borderColor: 'rgba(147, 51, 234, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y', // Horizontal agar label panjang terbaca
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                // Kustomisasi tooltip agar lebih jelas
                                title: function(context) {
                                    return context[0].label; // Tampilkan nama lengkap layanan
                                }
                            }
                        }
                    }
                }
            });

            // 2. Grafik Metode Pembayaran (Doughnut Chart)
            const metodeCtx = document.getElementById('metodeChart').getContext('2d');
            new Chart(metodeCtx, {
                type: 'doughnut',
                data: {
                    labels: @json($metodeLabels),
                    datasets: [{
                        data: @json($metodeData),
                        backgroundColor: [
                            'rgba(34, 197, 94, 0.7)', // Hijau (Tunai)
                            'rgba(59, 130, 246, 0.7)', // Biru (Transfer)
                            'rgba(234, 179, 8, 0.7)', // Kuning (Debit/Kredit)
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right'
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
