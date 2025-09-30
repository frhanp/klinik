<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-700">Jumlah Pasien</h3>
                    <p class="mt-2 text-3xl font-bold text-gray-900">{{ $jumlahPasien }}</p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-700">Jumlah Dokter</h3>
                    <p class="mt-2 text-3xl font-bold text-gray-900">{{ $jumlahDokter }}</p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-700">Pemesanan Hari Ini</h3>
                    <p class="mt-2 text-3xl font-bold text-gray-900">{{ $pemesananHariIni }}</p>
                </div>
            </div>

            {{-- [MODIFIKASI] Grid untuk dua grafik --}}
            <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold mb-4">Grafik Pendapatan (6 Bulan Terakhir)</h3>
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold mb-4">5 Tindakan Paling Populer</h3>
                        <canvas id="tindakanChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Script untuk Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Grafik Pendapatan (Bar Chart)
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            new Chart(revenueCtx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($labels) !!},
                    datasets: [{
                        label: 'Pendapatan (Rp)',
                        data: {!! json_encode($data) !!},
                        backgroundColor: 'rgba(139, 92, 246, 0.5)',
                        borderColor: 'rgba(139, 92, 246, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                                }
                            }
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) { label += ': '; }
                                    if (context.parsed.y !== null) {
                                        label += 'Rp ' + new Intl.NumberFormat('id-ID').format(context.parsed.y);
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            });

            // [MODIFIKASI] Grafik Tindakan Populer (Pie Chart)
            const tindakanCtx = document.getElementById('tindakanChart').getContext('2d');
            new Chart(tindakanCtx, {
                type: 'pie', // Tipe grafik diubah menjadi 'pie'
                data: {
                    labels: {!! json_encode($tindakanLabels) !!},
                    datasets: [{
                        label: 'Jumlah Dilakukan',
                        data: {!! json_encode($tindakanData) !!},
                        backgroundColor: [
                            'rgba(139, 92, 246, 0.7)',
                            'rgba(124, 58, 237, 0.7)',
                            'rgba(109, 40, 217, 0.7)',
                            'rgba(91, 33, 182, 0.7)',
                            'rgba(76, 29, 149, 0.7)'
                        ],
                        borderColor: '#ffffff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) { label += ': '; }
                                    if (context.parsed !== null) {
                                        label += context.parsed + ' kali';
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>