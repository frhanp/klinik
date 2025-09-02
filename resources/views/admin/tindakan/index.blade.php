<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Daftar Tindakan') }}
            </h2>
            <a href="{{ route('admin.tindakan.create') }}"
                class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 shadow-md">
                Tambah Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-notification />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @forelse ($daftarTindakans as $kategori)
                        <div class="mb-6 pb-4 border-b">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="text-lg font-bold text-gray-800">{{ $kategori->nama_kategori }}</h3>
                                <form action="{{ route('admin.tindakan.destroy', $kategori->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus kategori ini beserta semua detailnya?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm">Hapus
                                        Kategori</button>
                                </form>
                            </div>
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="py-2 px-4 text-left">Keterangan</th>
                                        <th class="py-2 px-4 text-right">Harga</th>
                                        <th class="py-2 px-4 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kategori->tindakanItems as $item)
                                        <tr class="hover:bg-gray-50">
                                            <td class="py-2 px-4">{{ $item->keterangan }}</td>
                                            <td class="py-2 px-4 text-right">Rp
                                                {{ number_format($item->harga, 0, ',', '.') }}</td>
                                            <td class="py-2 px-4 text-center">
                                                <a href="{{ route('admin.tindakan.edit', $item->id) }}"
                                                    class="text-purple-600 hover:text-purple-800 font-semibold mr-3">Edit</a>
                                                <form action="{{ route('admin.tindakan.destroy', $item->id) }}"
                                                    method="POST" class="inline-block"
                                                    onsubmit="return confirm('Yakin ingin menghapus item ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-500 hover:text-red-700">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="py-2 px-4 text-center text-gray-400">Belum ada
                                                detail tindakan untuk kategori ini.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    @empty
                        <p class="text-center text-gray-500">Belum ada kategori tindakan yang dibuat.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
