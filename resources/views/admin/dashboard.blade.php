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

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold mb-4">Distribusi Status Pasien</h3>
                        <canvas id="statusPasienChart"></canvas>
                    </div>
                </div>
                
                {{-- Grafik Kunjungan Pasien (Baru) --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold mb-4">Kunjungan Selesai (30 Hari Terakhir)</h3>
                        <canvas id="kunjunganChart"></canvas>
                    </div>
                </div>
            </div>

            {{-- Grafik Top Dokter (Baru) --}}
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Top 5 Dokter (Berdasarkan Tindakan)</h3>
                    <canvas id="dokterChart"></canvas>
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
                        {{-- [MODIFIKASI] Ubah warna menjadi berbeda --}}
                        backgroundColor: [
                            'rgba(139, 92, 246, 0.7)',  // Ungu
                            'rgba(16, 185, 129, 0.7)', // Hijau
                            'rgba(239, 68, 68, 0.7)',   // Merah
                            'rgba(234, 179, 8, 0.7)',  // Kuning
                            'rgba(59, 130, 246, 0.7)'   // Biru
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

            const statusPasienCtx = document.getElementById('statusPasienChart').getContext('2d');
            new Chart(statusPasienCtx, {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($statusPasienLabels) !!},
                    datasets: [{
                        label: 'Jumlah Pasien',
                        data: {!! json_encode($statusPasienData) !!},
                        backgroundColor: [
                            'rgba(59, 130, 246, 0.7)',  // Biru (misal: BPJS)
                            'rgba(16, 185, 129, 0.7)', // Hijau (misal: Umum)
                            'rgba(234, 179, 8, 0.7)',  // Kuning (misal: Inhealth)
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
                                        label += context.parsed + ' pasien';
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            });

            // 4. [BARU] Grafik Kunjungan Pasien (Line Chart)
            const kunjunganCtx = document.getElementById('kunjunganChart').getContext('2d');
            new Chart(kunjunganCtx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($kunjunganLabels) !!},
                    datasets: [{
                        label: 'Jumlah Kunjungan Selesai',
                        data: {!! json_encode($kunjunganData) !!},
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        borderColor: 'rgba(16, 185, 129, 1)',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: { scales: { y: { beginAtZero: true } }, plugins: { tooltip: { callbacks: { label: context => `${context.parsed.y} kunjungan` } } } }
            });

            // 5. [BARU] Grafik Top Dokter (Horizontal Bar Chart)
            const dokterCtx = document.getElementById('dokterChart').getContext('2d');
            new Chart(dokterCtx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($dokterLabels) !!},
                    datasets: [{
                        label: 'Jumlah Tindakan Dilakukan',
                        data: {!! json_encode($dokterData) !!},
                        backgroundColor: 'rgba(239, 68, 68, 0.5)',
                        borderColor: 'rgba(239, 68, 68, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y', // <-- Ini membuatnya horizontal
                    scales: { x: { beginAtZero: true } },
                    plugins: { legend: { display: false }, tooltip: { callbacks: { label: context => `${context.parsed.x} tindakan` } } }
                }
            });
        });
    </script>
</x-app-layout>