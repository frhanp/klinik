<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Pembayaran & Keuangan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 border-b text-left">Tanggal Periksa</th>
                                    <th class="py-3 px-4 border-b text-left">Dokter</th>
                                    <th class="py-3 px-4 border-b text-left">Total Tagihan</th>
                                    <th class="py-3 px-4 border-b text-center">Status Pembayaran</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tagihans as $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3 px-4 border-b">
                                            {{ \Carbon\Carbon::parse($item->tanggal_pesan)->translatedFormat('d F Y') }}
                                        </td>
                                        <td class="py-3 px-4 border-b">{{ $item->dokter->user->name }}</td>
                                        <td class="py-3 px-4 border-b font-bold text-gray-700">
                                            Rp {{ number_format($item->pembayaran->total_biaya, 0, ',', '.') }}
                                        </td>
                                        <td class="py-3 px-4 border-b text-center">
                                            @if ($item->pembayaran->status == 'Lunas')
                                                <span
                                                    class="px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">Lunas</span>
                                            @else
                                                <span
                                                    class="px-2 py-1 text-xs font-semibold bg-yellow-100 text-yellow-800 rounded-full">Belum
                                                    Lunas</span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-4 border-b text-center">
                                            <a href="{{ route('pasien.pembayaran.show', $item->id) }}"
                                                class="text-purple-600 hover:text-purple-900 font-semibold text-sm">
                                                Lihat Rincian
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-4 px-4 text-center text-gray-500">Belum ada riwayat
                                            pembayaran.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $tagihans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
