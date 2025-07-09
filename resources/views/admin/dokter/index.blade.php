<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Dokter') }}
            </h2>
            <a href="{{ route('admin.dokter.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                Tambah Dokter
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
                                    <th class="py-2 px-4 border-b">Nama</th>
                                    <th class="py-2 px-4 border-b">Email</th>
                                    <th class="py-2 px-4 border-b">Spesialisasi</th>
                                    <th class="py-2 px-4 border-b">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dokters as $dokter)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b">{{ $dokter->user->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $dokter->user->email }}</td>
                                        <td class="py-2 px-4 border-b">{{ $dokter->spesialisasi }}</td>
                                        <td class="py-2 px-4 border-b flex gap-2">
                                            <a href="{{ route('admin.dokter.edit', $dokter->id) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a>
                                            <form action="{{ route('admin.dokter.destroy', $dokter->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokter ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-4 px-4 text-center">Tidak ada data dokter.</td>
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