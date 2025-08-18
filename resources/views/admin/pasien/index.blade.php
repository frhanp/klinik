<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Data Pasien') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-notification />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Form Pencarian -->
                    <form method="GET" action="{{ route('admin.pasien.index') }}" class="mb-6">
                        <div class="flex items-center">
                            <x-text-input type="text" name="search" placeholder="Cari nama, email, atau No. RM..." class="w-full md:w-1/3" value="{{ request('search') }}" />
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
                                    <th class="py-3 px-4 border-b text-left">No. Rekam Medis</th>
                                    <th class="py-3 px-4 border-b text-left">Kontak</th>
                                    <th class="py-3 px-4 border-b text-center">Status Biodata</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pasiens as $pasien)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3 px-4 border-b">{{ $pasien->name }}</td>
                                        <td class="py-3 px-4 border-b font-mono">{{ $pasien->biodata->nomor_rekam_medis ?? 'Belum Ada' }}</td>
                                        <td class="py-3 px-4 border-b">{{ $pasien->email }} <br> <span class="text-sm text-gray-500">{{ $pasien->nomor_telepon }}</span></td>
                                        <td class="py-3 px-4 border-b text-center">
                                            @if($pasien->biodata && $pasien->biodata->nik)
                                                <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Lengkap</span>
                                            @else
                                                <span class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full">Belum Lengkap</span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-4 border-b text-center">
                                            <a href="{{ route('admin.pasien.edit', $pasien->id) }}" class="text-purple-600 hover:text-purple-800 font-semibold">
                                                Lengkapi / Edit
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-4 px-4 text-center text-gray-500">Tidak ada data pasien.</td>
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