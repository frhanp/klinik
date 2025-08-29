<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ringkasan Jadwal Dokter') }}
            </h2>
    
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.jadwal.generate') }}" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 shadow-sm text-sm font-medium">
                    Generate Mingguan
                </a>
                <a href="{{ route('admin.jadwal.create') }}" class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 shadow-sm text-sm font-medium">
                    Tambah Jadwal Baru
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-notification />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 border-b text-left">Nama Dokter</th>
                                    <th class="py-3 px-4 border-b text-left">Hari Praktek</th>
                                    <th class="py-3 px-4 border-b text-left">Jam Praktek (Umum)</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dokters as $dokter)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3 px-4 border-b font-semibold">{{ $dokter->user->name }}</td>
                                        <td class="py-3 px-4 border-b">{{ $dokter->hari_praktek }}</td>
                                        <td class="py-3 px-4 border-b">{{ $dokter->jam_praktek }}</td>
                                        <td class="py-3 px-4 border-b text-center">
                                            <a href="{{ route('admin.jadwal.show', $dokter->id) }}" class="text-purple-600 hover:text-purple-800 font-semibold">
                                                Kelola Jadwal
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-4 px-4 text-center text-gray-500">Belum ada data dokter. Silakan tambahkan dokter terlebih dahulu.</td>
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