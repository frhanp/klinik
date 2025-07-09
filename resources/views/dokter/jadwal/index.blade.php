<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jadwal Praktek Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="py-2 px-4 border-b">Hari</th>
                                    <th class="py-2 px-4 border-b">Jam Mulai</th>
                                    <th class="py-2 px-4 border-b">Jam Selesai</th>
                                    <th class="py-2 px-4 border-b">Durasi Slot (Menit)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jadwals as $jadwal)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b">{{ $jadwal->hari }}</td>
                                        <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}</td>
                                        <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</td>
                                        <td class="py-2 px-4 border-b">{{ $jadwal->durasi_slot_menit }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-4 px-4 text-center">Anda belum memiliki jadwal praktek.</td>
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