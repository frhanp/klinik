<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Stok Obat') }}
            </h2>
            <a href="{{ route('admin.obat.create') }}" class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 shadow-md">
                Tambah Obat Baru
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
                                    <th class="py-3 px-4 border-b text-left">Nama Obat</th>
                                    <th class="py-3 px-4 border-b text-left">Satuan</th>
                                    <th class="py-3 px-4 border-b text-left">Stok</th>
                                    <th class="py-3 px-4 border-b">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($obats as $obat)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3 px-4 border-b">{{ $obat->nama_obat }}</td>
                                        <td class="py-3 px-4 border-b">{{ $obat->satuan }}</td>
                                        <td class="py-3 px-4 border-b">{{ $obat->stok }}</td>
                                        <td class="py-3 px-4 border-b text-center">
                                            <div class="flex justify-center gap-4">
                                                <a href="{{ route('admin.obat.edit', $obat->id) }}" class="text-yellow-500 hover:text-yellow-700 font-semibold">Edit</a>
                                                <form action="{{ route('admin.obat.destroy', $obat->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus obat ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-4 px-4 text-center text-gray-500">Belum ada data obat. Silakan tambahkan data baru.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $obats->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
