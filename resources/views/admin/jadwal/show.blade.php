<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Kelola Jadwal: <span class="font-bold">{{ $dokter->user->name }}</span>
                </h2>
            </div>
            <a href="{{ route('admin.jadwal.create', ['dokter_id' => $dokter->id]) }}" class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 shadow-md">
                Tambah Jadwal untuk Dokter Ini
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
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 border-b text-left">Hari</th>
                                    <th class="py-3 px-4 border-b text-left">Jam Mulai</th>
                                    <th class="py-3 px-4 border-b text-left">Jam Selesai</th>
                                    <th class="py-3 px-4 border-b text-left">Durasi Slot</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dokter->jadwal as $jadwal)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3 px-4 border-b">{{ $jadwal->hari }}</td>
                                        <td class="py-3 px-4 border-b">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}</td>
                                        <td class="py-3 px-4 border-b">{{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</td>
                                        <td class="py-3 px-4 border-b">{{ $jadwal->durasi_slot_menit }} Menit</td>
                                        <td class="py-3 px-4 border-b text-center">
                                            <div class="flex justify-center gap-4">
                                                <a href="{{ route('admin.jadwal.edit', $jadwal->id) }}" class="text-yellow-500 hover:text-yellow-700 font-semibold">Edit</a>
                                                <form action="{{ route('admin.jadwal.destroy', $jadwal->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-4 px-4 text-center text-gray-500">Dokter ini belum memiliki jadwal.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="mt-6">
                <a href="{{ route('admin.jadwal.index') }}" class="text-purple-600 hover:text-purple-800 font-semibold">
                    &larr; Kembali ke Ringkasan Jadwal
                </a>
            </div>
        </div>
    </div>
</x-app-layout>