<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Rekam Medis - ' . $pasien->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Tabel Rekam Medis -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 border-b text-left">Tanggal</th>
                                    <th class="py-3 px-4 border-b text-left">Diagnosis</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($rekamMedisList as $rekamMedis)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3 px-4 border-b">{{ $rekamMedis->created_at->translatedFormat('d F Y') }}</td>
                                        <td class="py-3 px-4 border-b">{{ Str::limit($rekamMedis->diagnosis, 50) }}</td>
                                        <td class="py-3 px-4 border-b text-center">
                                            <a href="{{ route('dokter.rekam-medis.show', $rekamMedis->id) }}"
                                                class="text-purple-600 hover:text-purple-800 font-semibold">
                                                Lihat Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="py-4 px-4 text-center text-gray-500">
                                            Belum ada riwayat rekam medis untuk pasien ini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginasi -->
                    <div class="mt-6">
                        {{ $rekamMedisList->links() }}
                    </div>

                    <div class="mt-6 text-right">
                        <a href="{{ route('dokter.rekam-medis.index') }}" class="text-purple-600 hover:text-purple-800 font-semibold">
                            &larr; Kembali ke Ringkasan Pasien
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
