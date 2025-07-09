<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Jadwal Dokter') }}
            </h2>
            <a href="{{ route('admin.jadwal.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                Tambah Jadwal
            </a>
        </div>
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
                                    <th class="py-2 px-4 border-b">Nama Dokter</th>
                                    <th class="py-2 px-4 border-b">Hari</th>
                                    <th class="py-2 px-4 border-b">Jam Praktek</th>
                                    <th class="py-2 px-4 border-b">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jadwals as $jadwal)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b">{{ $jadwal->dokter->user->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $jadwal->hari }}</td>
                                        <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</td>
                                        <td class="py-2 px-4 border-b flex gap-2">
                                            <a href="{{ route('admin.jadwal.edit', $jadwal->id) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a>
                                            <form action="{{ route('admin.jadwal.destroy', $jadwal->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-4 px-4 text-center">Tidak ada data jadwal.</td>
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