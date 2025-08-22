<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Jadwal untuk ') . $jadwal->dokter->user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <x-notification />
                    <form method="POST" action="{{ route('admin.jadwal.update', $jadwal->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Info Dokter (Read-only) -->
                        <div>
                            <x-input-label for="dokter_name" :value="__('Dokter')" />
                            <x-text-input id="dokter_name" class="block mt-1 w-full bg-gray-100" type="text" :value="$jadwal->dokter->user->name" disabled />
                        </div>

                        <!-- Hari -->
                        <div class="mt-4">
                            <x-input-label for="hari" :value="__('Hari Praktek')" />
                            <select id="hari" name="hari" class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm" required>
                                <option value="Senin" @selected(old('hari', $jadwal->hari) == 'Senin')>Senin</option>
                                <option value="Selasa" @selected(old('hari', $jadwal->hari) == 'Selasa')>Selasa</option>
                                <option value="Rabu" @selected(old('hari', $jadwal->hari) == 'Rabu')>Rabu</option>
                                <option value="Kamis" @selected(old('hari', $jadwal->hari) == 'Kamis')>Kamis</option>
                                <option value="Jumat" @selected(old('hari', $jadwal->hari) == 'Jumat')>Jumat</option>
                                <option value="Sabtu" @selected(old('hari', $jadwal->hari) == 'Sabtu')>Sabtu</option>
                                <option value="Minggu" @selected(old('hari', $jadwal->hari) == 'Minggu')>Minggu</option>
                            </select>
                        </div>

                        <!-- Jam Mulai -->
                        <div class="mt-4">
                            <x-input-label for="jam_mulai" :value="__('Jam Mulai')" />
                            <x-text-input id="jam_mulai" class="block mt-1 w-full" type="time" name="jam_mulai" :value="old('jam_mulai', $jadwal->jam_mulai)" required />
                        </div>

                        <!-- Jam Selesai -->
                        <div class="mt-4">
                            <x-input-label for="jam_selesai" :value="__('Jam Selesai')" />
                            <x-text-input id="jam_selesai" class="block mt-1 w-full" type="time" name="jam_selesai" :value="old('jam_selesai', $jadwal->jam_selesai)" required />
                        </div>

                        <!-- Durasi Slot -->
                        <div class="mt-4">
                            <x-input-label for="durasi_slot_menit" :value="__('Durasi Slot (Menit)')" />
                            <x-text-input id="durasi_slot_menit" class="block mt-1 w-full" type="number" name="durasi_slot_menit" :value="old('durasi_slot_menit', $jadwal->durasi_slot_menit)" required />
                        </div>

                        <div class="flex items-center justify-end mt-6 border-t pt-6">
                            <a href="{{ route('admin.jadwal.show', $jadwal->id_dokter) }}" class="text-gray-600 hover:text-gray-900 mr-4">
                                Batal
                            </a>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">
                                {{ __('Perbarui Jadwal') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
