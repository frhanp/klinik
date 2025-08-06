<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Tindakan & Layanan') }}
            </h2>
            <a href="{{ route('admin.tindakan.create') }}" class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 shadow-md">
                Tambah Tindakan Baru
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
                                    <th class="py-3 px-4 border-b text-left">Nama Tindakan</th>
                                    <th class="py-3 px-4 border-b text-left">Harga</th>
                                    <th class="py-3 px-4 border-b text-left">Deskripsi</th>
                                    <th class="py-3 px-4 border-b">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tindakans as $tindakan)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3 px-4 border-b">{{ $tindakan->nama_tindakan }}</td>
                                        <td class="py-3 px-4 border-b">Rp {{ number_format($tindakan->harga, 0, ',', '.') }}</td>
                                        <td class="py-3 px-4 border-b">{{ $tindakan->deskripsi ?? '-' }}</td>
                                        <td class="py-3 px-4 border-b text-center">
                                            <div class="flex justify-center gap-4">
                                                <a href="{{ route('admin.tindakan.edit', $tindakan->id) }}" class="text-yellow-500 hover:text-yellow-700 font-semibold">Edit</a>
                                                <form action="{{ route('admin.tindakan.destroy', $tindakan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tindakan ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-4 px-4 text-center text-gray-500">Belum ada data tindakan. Silakan tambahkan tindakan baru.</td>
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