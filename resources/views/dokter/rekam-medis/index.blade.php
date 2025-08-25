<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ringkasan Rekam Medis per Pasien') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Form Pencarian -->
                    <form method="GET" action="{{ route('dokter.rekam-medis.index') }}" class="mb-6">
                        <div class="flex items-center">
                            <x-text-input type="text" name="search" placeholder="Cari nama pasien..."
                                class="w-full md:w-1/3" value="{{ request('search') }}" />
                            <x-primary-button class="ms-3">Cari</x-primary-button>
                        </div>
                    </form>

                    <!-- Tabel Ringkasan -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 border-b text-left">Nama Pasien</th>
                                    <th class="py-3 px-4 border-b text-center">Jumlah Kunjungan</th>
                                    <th class="py-3 px-4 border-b text-left">Diagnosis Terakhir</th>
                                    <th class="py-3 px-4 border-b text-left">Terakhir Kunjungan</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pasienRingkas as $row)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3 px-4 border-b">{{ $row->nama_pasien }}</td>
                                        <td class="py-3 px-4 border-b text-center">{{ $row->jumlah_kunjungan }}</td>
                                        <td class="py-3 px-4 border-b">{{ Str::limit($row->diagnosis_terakhir, 50) }}</td>
                                        <td class="py-3 px-4 border-b">
                                            {{ \Carbon\Carbon::parse($row->terakhir_kunjungan)->translatedFormat('d F Y') }}
                                        </td>
                                        <td class="py-3 px-4 border-b text-center">
                                            <a href="{{ route('dokter.rekam-medis.pasien', $row->pasien_id) }}"
                                                class="text-purple-600 hover:text-purple-800 font-semibold">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-4 px-4 text-center text-gray-500">
                                            Tidak ada data rekam medis.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginasi -->
                    <div class="mt-6">
                        {{ $pasienRingkas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
