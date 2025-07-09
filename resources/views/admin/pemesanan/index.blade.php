<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Semua Pemesanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-notification />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="py-2 px-4 border-b">Pasien</th>
                                    <th class="py-2 px-4 border-b">Dokter</th>
                                    <th class="py-2 px-4 border-b">Tanggal</th>
                                    <th class="py-2 px-4 border-b">Waktu</th>
                                    <th class="py-2 px-4 border-b">Status</th>
                                    <th class="py-2 px-4 border-b">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pemesanans as $pemesanan)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b">{{ $pemesanan->pasien->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $pemesanan->dokter->user->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($pemesanan->tanggal_pesan)->translatedFormat('d F Y') }}</td>
                                        <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($pemesanan->waktu_pesan)->format('H:i') }}</td>
                                        <td class="py-2 px-4 border-b">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if($pemesanan->status == 'Selesai') bg-green-100 text-green-800 
                                                @elseif($pemesanan->status == 'Dibatalkan') bg-red-100 text-red-800
                                                @elseif($pemesanan->status == 'Dikonfirmasi') bg-blue-100 text-blue-800
                                                @else bg-yellow-100 text-yellow-800 @endif">
                                                {{ $pemesanan->status }}
                                            </span>
                                        </td>
                                        <td class="py-2 px-4 border-b">
                                            <a href="{{ route('admin.pemesanan.edit', $pemesanan->id) }}" class="text-indigo-600 hover:text-indigo-900">Ubah Status</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-4 px-4 text-center">Tidak ada data pemesanan.</td>
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