<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generate Jadwal Mingguan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <p class="text-gray-600 mb-6">Gunakan form ini untuk membuat jadwal dengan jam yang sama untuk beberapa hari sekaligus.</p>

                    <form method="POST" action="{{ route('admin.jadwal.storeMultiple') }}">
                        @csrf

                        <div>
                            <x-input-label for="id_dokter" :value="__('Pilih Dokter')" />
                            <select name="id_dokter" id="id_dokter" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
                                <option value="">-- Pilih Dokter --</option>
                                @foreach ($dokters as $dokter)
                                    <option value="{{ $dokter->id }}" @selected(old('id_dokter') == $dokter->id)>{{ $dokter->user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-input-label :value="__('Pilih Hari Praktik')" />
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-2">
                                @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="hari[]" value="{{ $hari }}" class="rounded border-gray-300 text-purple-600 shadow-sm focus:ring-purple-500">
                                    <span>{{ $hari }}</span>
                                </label>
                                @endforeach
                            </div>
                            <x-input-error :messages="$errors->get('hari')" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <div>
                                <x-input-label for="jam_mulai" :value="__('Jam Mulai')" />
                                <x-text-input id="jam_mulai" class="block mt-1 w-full" type="time" name="jam_mulai" :value="old('jam_mulai')" required />
                            </div>
                            <div>
                                <x-input-label for="jam_selesai" :value="__('Jam Selesai')" />
                                <x-text-input id="jam_selesai" class="block mt-1 w-full" type="time" name="jam_selesai" :value="old('jam_selesai')" required />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 border-t pt-6">
                            <a href="{{ route('admin.jadwal.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                                Batal
                            </a>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">
                                {{ __('Generate Jadwal') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>