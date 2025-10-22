<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Daftar Pasien') }}
            </h2>
            <a href="{{ route('admin.pasien.create') }}" class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 shadow-md">
                Daftarkan Pasien Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-notification />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="GET" action="{{ route('admin.pasien.index') }}" class="mb-6">
                        <div class="flex items-center">
                            <x-text-input type="text" name="search" placeholder="Cari nama pasien..." class="w-full md:w-1/3" value="{{ request('search') }}" />
                            <x-primary-button class="ms-3">
                                Cari
                            </x-primary-button>
                        </div>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 border-b text-left">Nama Pasien</th>
                                    <th class="py-3 px-4 border-b text-left">Kontak</th>
                                    <th class="py-3 px-4 border-b text-left">NIK</th>
                                    <th class="py-3 px-4 border-b text-left">Status Pasien</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pasiens as $pasien)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3 px-4 border-b">{{ $pasien->name }}</td>
                                        <td class="py-3 px-4 border-b">{{ $pasien->email }} <br> <span class="text-sm text-gray-500">{{ $pasien->nomor_telepon }}</span></td>
                                        <td class="py-3 px-4 border-b">{{ $pasien->biodata->nik ?? '-' }}</td>

                                        <td class="py-3 px-4 border-b">
                                            {{-- [MODIFIKASI] Ambil status dari biodata --}}
                                            @php
                                                // Ambil status langsung dari relasi biodata
                                                $status = $pasien->biodata->status_pasien ?? null;
                                                $badgeColor = [
                                                    'BPJS' => 'bg-blue-100 text-blue-800',
                                                    'Inhealth' => 'bg-yellow-100 text-yellow-800',
                                                    'Umum' => 'bg-green-100 text-green-800',
                                                ][$status] ?? 'bg-gray-100 text-gray-800';
                                            @endphp
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $badgeColor }}">
                                                {{ $status ?? '-' }}
                                            </span>
                                        </td>
                                        {{-- <td class="py-3 px-4 border-b">
                                            @php
                                                $latestPemesanan = $pasien->pemesanan->first();
                                                $status = $latestPemesanan->status_pasien ?? null;
                                                $badgeColor = [
                                                    'BPJS' => 'bg-blue-100 text-blue-800',
                                                    'Inhealth' => 'bg-yellow-100 text-yellow-800',
                                                    'Umum' => 'bg-green-100 text-green-800',
                                                ][$status] ?? 'bg-gray-100 text-gray-800';
                                            @endphp
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $badgeColor }}">
                                                {{ $status ?? '-' }}
                                            </span>
                                        </td> --}}
                                        <td class="py-3 px-4 border-b text-center">
                                            <a href="{{ route('admin.pasien.show', $pasien->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold mr-3">
                                                Lihat Detail
                                            </a>
                                            <a href="{{ route('admin.pasien.edit', $pasien->id) }}" class="text-purple-600 hover:text-purple-800 font-semibold">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-4 px-4 text-center text-gray-500">Tidak ada data pasien.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $pasiens->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>