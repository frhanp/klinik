<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kelola Janji Temu Pasien
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">

                    <div class="mb-6 pb-6 border-b">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Detail Janji Temu</h3>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div><strong>Pasien:</strong> {{ $pemesanan->nama_pasien_booking }}</div>
                            <div><strong>Dokter:</strong> {{ $pemesanan->dokter->user->name }}</div>
                            <div><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($pemesanan->tanggal_pesan)->isoFormat('D MMMM YYYY') }}</div>
                            <div><strong>Waktu:</strong> {{ \Carbon\Carbon::parse($pemesanan->waktu_pesan)->format('H:i') }}</div>
                            <div class="col-span-2"><strong>Status Saat Ini:</strong> {{ $pemesanan->status }}</div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('admin.pemesanan.update', $pemesanan->id) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="status" :value="__('Ubah Status')" class="font-bold" />
                            <select name="status" id="status" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50">
                                <option value="Dikonfirmasi" @selected(old('status', $pemesanan->status) == 'Dikonfirmasi')>Konfirmasi Janji Temu</option>
                                <option value="Dijadwalkan Ulang" @selected(old('status', $pemesanan->status) == 'Dijadwalkan Ulang')>Jadwalkan Ulang</option>
                                <option value="Dibatalkan" @selected(old('status', $pemesanan->status) == 'Dibatalkan')>Batalkan Janji Temu</option>
                                <option value="Selesai" @selected(old('status', $pemesanan->status) == 'Selesai')>Selesaikan (Telah Diperiksa)</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="catatan_admin">
                                Catatan untuk Pasien <span class="text-gray-500 text-xs">(Wajib diisi jika dibatalkan/dijadwalkan ulang)</span>
                            </x-input-label>
                            <textarea id="catatan_admin" name="catatan_admin" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50" rows="4">{{ old('catatan_admin', $pemesanan->catatan_admin) }}</textarea>
                            <x-input-error :messages="$errors->get('catatan_admin')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.pemesanan.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                                Kembali
                            </a>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">
                                {{ __('Simpan Perubahan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>