<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Dokter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-notification />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Antrian Pasien Hari Ini ({{ \Carbon\Carbon::now()->translatedFormat('d F Y') }})</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="py-2 px-4 border-b">Waktu</th>
                                    <th class="py-2 px-4 border-b">Nama Pasien</th>
                                    <th class="py-2 px-4 border-b">Status</th>
                                    <th class="py-2 px-4 border-b">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pemesananHariIni as $pemesanan)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($pemesanan->waktu_pesan)->format('H:i') }}</td>
                                        <td class="py-2 px-4 border-b">{{ $pemesanan->pasien->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $pemesanan->status }}</td>
                                        <td class="py-2 px-4 border-b">
                                            <a href="{{ route('dokter.rekam-medis.create', ['id_pemesanan' => $pemesanan->id]) }}" class="text-green-600 hover:text-green-900">
                                                Buat Rekam Medis
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-4 px-4 text-center">Tidak ada antrian untuk hari ini.</td>
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