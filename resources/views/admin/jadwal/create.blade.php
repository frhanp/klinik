<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Jadwal Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <x-notification />
                    <form method="POST" action="{{ route('admin.jadwal.store') }}">
                        @csrf

                        <!-- Pilih Dokter -->
                        <div>
                            <x-input-label for="id_dokter" :value="__('Dokter')" />
                            <select id="id_dokter" name="id_dokter" class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm" required>
                                <option value="">-- Pilih Dokter --</option>
                                @foreach($dokters as $dokter)
                                    <option value="{{ $dokter->id }}" @selected(old('id_dokter', $selectedDokterId) == $dokter->id)>
                                        {{ $dokter->user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Hari -->
                        <div class="mt-4">
                            <x-input-label for="hari" :value="__('Hari Praktek')" />
                            <select id="hari" name="hari" class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm" required>
                                <option value="">-- Pilih Hari --</option>
                                <option value="Senin" @selected(old('hari') == 'Senin')>Senin</option>
                                <option value="Selasa" @selected(old('hari') == 'Selasa')>Selasa</option>
                                <option value="Rabu" @selected(old('hari') == 'Rabu')>Rabu</option>
                                <option value="Kamis" @selected(old('hari') == 'Kamis')>Kamis</option>
                                <option value="Jumat" @selected(old('hari') == 'Jumat')>Jumat</option>
                                <option value="Sabtu" @selected(old('hari') == 'Sabtu')>Sabtu</option>
                                <option value="Minggu" @selected(old('hari') == 'Minggu')>Minggu</option>
                            </select>
                        </div>

                        <!-- Jam Mulai -->
                        <div class="mt-4">
                            <x-input-label for="jam_mulai" :value="__('Jam Mulai')" />
                            <x-text-input id="jam_mulai" class="block mt-1 w-full" type="time" name="jam_mulai" :value="old('jam_mulai')" required />
                        </div>

                        <!-- Jam Selesai -->
                        <div class="mt-4">
                            <x-input-label for="jam_selesai" :value="__('Jam Selesai')" />
                            <x-text-input id="jam_selesai" class="block mt-1 w-full" type="time" name="jam_selesai" :value="old('jam_selesai')" required />
                        </div>

                        <!-- Durasi Slot -->
                        <div class="mt-4">
                            <x-input-label for="durasi_slot_menit" :value="__('Durasi Slot (Menit)')" />
                            <x-text-input id="durasi_slot_menit" class="block mt-1 w-full" type="number" name="durasi_slot_menit" value="{{ old('durasi_slot_menit', 30) }}" required />
                        </div>

                        <div class="flex items-center justify-end mt-6 border-t pt-6">
                            <a href="{{ url()->previous() }}" class="text-gray-600 hover:text-gray-900 mr-4">
                                Batal
                            </a>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">
                                {{ __('Simpan Jadwal') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
