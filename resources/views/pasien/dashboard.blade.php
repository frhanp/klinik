<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Selamat Datang, ') . Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Pemesanan Aktif Anda</h3>
                    @if ($pemesananAktif->isNotEmpty())
                        @foreach ($pemesananAktif as $pemesanan)
                            <div class="border p-4 rounded-lg mb-4">
                                <p><strong>Dokter:</strong> {{ $pemesanan->dokter->user->name }}</p>
                                <p><strong>Jadwal:</strong>
                                    {{ \Carbon\Carbon::parse($pemesanan->tanggal_pesan)->translatedFormat('l, d F Y') }}
                                    pukul {{ \Carbon\Carbon::parse($pemesanan->waktu_pesan)->format('H:i') }}
                                </p>
                                <p><strong>Status:</strong>
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $pemesanan->status == 'Menunggu Konfirmasi Pasien' ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800' }}">
                                        {{ $pemesanan->status }}
                                    </span>
                                </p>

                                {{-- AWAL MODIFIKASI: Konfirmasi Jadwal Baru --}}
                                @if ($pemesanan->status == 'Menunggu Konfirmasi Pasien')
                                    <div class="mt-4 p-4 bg-yellow-100 border border-yellow-400 rounded-lg">
                                        <p class="font-semibold text-yellow-700">
                                            Jadwal Anda telah diubah oleh klinik. Silakan konfirmasi jadwal baru.
                                        </p>

                                        <p class="mt-1 text-sm text-gray-700">
                                            Tanggal baru:
                                            {{ \Carbon\Carbon::parse($pemesanan->tanggal_pesan)->isoFormat('D MMMM YYYY') }}<br>
                                            Waktu baru:
                                            {{ \Carbon\Carbon::parse($pemesanan->waktu_pesan)->format('H:i') }}
                                        </p>

                                        <div class="flex space-x-2 mt-3">

                                            {{-- Tombol Setuju --}}
                                            <form method="POST"
                                                action="{{ route('pasien.pemesanan.update', $pemesanan->id) }}">
                                                @csrf @method('PUT')
                                                <input type="hidden" name="aksi" value="setuju_reschedule">
                                                <button class="px-3 py-1 bg-green-600 text-white text-xs rounded">
                                                    Setuju
                                                </button>
                                            </form>

                                            {{-- Tombol Tolak --}}
                                            <form method="POST"
                                                action="{{ route('pasien.pemesanan.update', $pemesanan->id) }}">
                                                @csrf @method('PUT')
                                                <input type="hidden" name="aksi" value="tolak_reschedule">
                                                <button class="px-3 py-1 bg-red-600 text-white text-xs rounded">
                                                    Tolak
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                @endif
                                {{-- AKHIR MODIFIKASI --}}
                            </div>
                        @endforeach
                    @else
                        <p>Anda tidak memiliki pemesanan yang aktif saat ini.</p>
                        <a href="{{ route('pasien.pemesanan.create') }}"
                            class="inline-block mt-4 px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                            Buat Pemesanan Baru
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
