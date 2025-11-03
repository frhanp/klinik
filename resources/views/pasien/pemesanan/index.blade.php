
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Pemesanan Saya') }}
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
                                    <th class="py-2 px-4 border-b">Tanggal & Waktu</th>
                                    <th class="py-2 px-4 border-b">Antrian</th>
                                    <th class="py-2 px-4 border-b">Dokter</th>
                                    <th class="py-2 px-4 border-b">Status</th>
                                    <th class="py-2 px-4 border-b">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pemesanans as $pemesanan)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($pemesanan->tanggal_pesan)->translatedFormat('d M Y') }} - {{ \Carbon\Carbon::parse($pemesanan->waktu_pesan)->format('H:i') }}</td>
                                        <td class="py-2 px-4 border-b text-center font-bold text-purple-700">{{ $pemesanan->nomor_antrian ?? '-' }}</td>
                                        <td class="py-2 px-4 border-b">{{ $pemesanan->dokter->user->name }}</td>
                                        <td class="py-2 px-4 border-b">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if($pemesanan->status == 'Selesai') bg-green-100 text-green-800 
                                                @elseif($pemesanan->status == 'Dibatalkan') bg-red-100 text-red-800
                                                @elseif($pemesanan->status == 'Dijadwalkan Ulang') bg-yellow-100 text-yellow-800
                                                @else bg-blue-100 text-blue-800 @endif">
                                                {{ $pemesanan->status }}
                                            </span>
                                        </td>
                                        <td class="py-2 px-4 border-b">
                                            @if($pemesanan->status == 'Selesai' && $pemesanan->rekamMedis)
                                                <a href="{{ route('pasien.rekamMedis.show', $pemesanan->rekamMedis->id) }}" class="text-blue-600 hover:text-blue-900">Lihat Rekam Medis</a>
                                            @elseif(in_array($pemesanan->status, ['Dipesan', 'Dikonfirmasi']))
                                                <form action="{{ route('pasien.pemesanan.destroy', $pemesanan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan pemesanan ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-700">Batalkan</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @if($pemesanan->catatan_admin)
                                    <tr class="bg-yellow-50 hover:bg-yellow-100">
                                        <td colspan="5" class="py-3 px-4 border-b text-sm">
                                            <strong class="text-yellow-800">Catatan dari Klinik:</strong>
                                            <p class="mt-1 text-gray-700">{{ $pemesanan->catatan_admin}}</p>
                                        </td>
                                    </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-4 px-4 text-center">Anda belum pernah membuat pemesanan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $pemesanans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
