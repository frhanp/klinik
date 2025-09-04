<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Riwayat Rekam Medis Pasien: <span class="font-bold">{{ $pasien->name }}</span>
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
                                    <th class="py-3 px-4 border-b text-left w-16">No.</th>
                                    <th class="py-3 px-4 border-b text-left">Tanggal Kunjungan</th>
                                    <th class="py-3 px-4 border-b text-left">Diagnosis / Perawatan</th>
                                    <th class="py-3 px-4 border-b text-left">Tindakan</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($rekamMedisList as $index => $rekamMedis)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3 px-4 border-b">{{ $rekamMedisList->firstItem() + $index }}</td>
                                        <td class="py-3 px-4 border-b">{{ $rekamMedis->created_at->isoFormat('D MMMM YYYY') }}</td>
                                        <td class="py-3 px-4 border-b">{{ $rekamMedis->diagnosis }}</td>
                                        <td class="py-3 px-4 border-b">
                                            @if($rekamMedis->tindakan->isNotEmpty())
                                                <ul class="list-disc list-inside text-sm">
                                                    @foreach($rekamMedis->tindakan as $tindakan)
                                                        {{-- [FIX] Menggunakan 'keterangan' sesuai struktur database baru --}}
                                                        <li>{{ $tindakan->keterangan }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="py-3 px-4 border-b text-center">
                                            <a href="{{ route('dokter.rekam-medis.show', $rekamMedis->id) }}" class="text-purple-600 hover:text-purple-800 font-semibold">
                                                Lihat Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-4 px-4 text-center text-gray-500">
                                            Pasien ini belum memiliki riwayat rekam medis.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $rekamMedisList->links() }}
                    </div>
                    <div class="mt-8 pt-6 text-right">
                        <a href="{{ route('dokter.rekam-medis.index') }}" class="text-purple-600 hover:text-purple-800 font-semibold">
                            &larr; Kembali ke Riwayat
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>