<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Status Pemesanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <p><strong>Pasien:</strong> {{ $pemesanan->pasien->name }}</p>
                        <p><strong>Dokter:</strong> {{ $pemesanan->dokter->user->name }}</p>
                        <p><strong>Jadwal:</strong> {{ \Carbon\Carbon::parse($pemesanan->tanggal_pesan)->translatedFormat('d F Y') }} pukul {{ \Carbon\Carbon::parse($pemesanan->waktu_pesan)->format('H:i') }}</p>
                    </div>
                    <form method="POST" action="{{ route('admin.pemesanan.update', $pemesanan->id) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="status" :value="__('Status Pemesanan')" />
                            <select id="status" name="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="Dipesan" @selected($pemesanan->status == 'Dipesan')>Dipesan</option>
                                <option value="Dikonfirmasi" @selected($pemesanan->status == 'Dikonfirmasi')>Dikonfirmasi</option>
                                <option value="Dibatalkan" @selected($pemesanan->status == 'Dibatalkan')>Dibatalkan</option>
                                <option value="Selesai" @selected($pemesanan->status == 'Selesai')>Selesai</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Perbarui Status') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>