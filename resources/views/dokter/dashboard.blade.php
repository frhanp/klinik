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

                    {{-- Header Judul --}}
                    <h3 class="text-lg font-semibold mb-4">
                        Antrian Pasien ({{ \Carbon\Carbon::now()->translatedFormat('d F Y') }})
                    </h3>

                    {{-- AWAL MODIFIKASI: Tambah filter tanggal --}}
                    <form method="GET" action="{{ route('dokter.dashboard') }}" class="flex flex-wrap items-end gap-4 mb-6">
                        <div>
                            <x-input-label for="tanggal" value="Tanggal" />
                            <x-text-input id="tanggal" name="tanggal" type="date"
                                value="{{ request('tanggal') ?? now()->toDateString() }}"
                                class="mt-1 block w-full" />
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
                    {{-- AKHIR MODIFIKASI --}}

                    {{-- AWAL MODIFIKASI: Tabel antrian pasien dirapikan --}}
<div class="overflow-x-auto">
    <table class="min-w-full border border-gray-200 rounded-lg shadow-sm">
        <thead class="bg-purple-100 text-purple-800">
            <tr>
                <th class="py-3 px-4 text-left text-sm font-semibold border-b border-gray-200">Waktu</th>
                <th class="py-3 px-4 text-left text-sm font-semibold border-b border-gray-200">Nama Pasien & Keluhan</th>
                <th class="py-3 px-4 text-left text-sm font-semibold border-b border-gray-200">Status</th>
                <th class="py-3 px-4 text-center text-sm font-semibold border-b border-gray-200">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse ($pemesananHariIni as $pemesanan)
                <tr class="hover:bg-purple-50 transition-colors">
                    <td class="py-3 px-4 align-top text-gray-700 whitespace-nowrap">
                        {{ \Carbon\Carbon::parse($pemesanan->waktu_pesan)->format('H:i') }}
                    </td>

                    <td class="py-3 px-4 align-top">
                        {{-- Nama Pasien --}}
                        <div class="font-semibold text-gray-900">{{ $pemesanan->pasien->name }}</div>

                        {{-- Keluhan Awal --}}
                        {{-- AWAL MODIFIKASI: tampilkan kategori + keterangan + harga tindakan --}}
@if ($pemesanan->tindakanAwal->isNotEmpty())
<div class="text-xs text-gray-600 mt-1 space-x-1">
    <span class="font-medium text-gray-500">Keluhan:</span>
    @foreach ($pemesanan->tindakanAwal as $tindakan)
        <span class="inline-block bg-purple-100 text-purple-800 px-2 py-0.5 rounded-full mb-1">
            {{ $tindakan->daftarTindakan->nama_kategori ?? '-' }} — {{ $tindakan->keterangan }} —
            Rp {{ number_format($tindakan->harga, 0, ',', '.') }}
        </span>
    @endforeach
</div>
@endif
{{-- AKHIR MODIFIKASI --}}

                    </td>

                    <td class="py-3 px-4 align-top">
                        <span
                            class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                            {{ $pemesanan->status === 'Dikonfirmasi' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                            {{ $pemesanan->status }}
                        </span>
                    </td>

                    <td class="py-3 px-4 align-top text-center">
                        <a href="{{ route('dokter.rekam-medis.create', ['id_pemesanan' => $pemesanan->id]) }}"
                            class="inline-block text-sm font-semibold text-white bg-green-600 hover:bg-green-700 px-4 py-1.5 rounded-md shadow-sm transition">
                            Proses
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="py-6 px-4 text-center text-gray-600">
                        Tidak ada antrian untuk tanggal ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
{{-- AKHIR MODIFIKASI --}}


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
