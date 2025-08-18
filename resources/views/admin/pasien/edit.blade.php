<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lengkapi Biodata Pasien: <span class="font-bold">{{ $user->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <x-notification />
                    <form method="POST" action="{{ route('admin.pasien.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama Pasien -->
                            <div>
                                <x-input-label for="name" :value="__('Nama Pasien (sesuai akun)')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)" required />
                            </div>

                            <!-- Nomor HP -->
                            <div>
                                <x-input-label for="nomor_telepon" :value="__('Nomor HP')" />
                                <x-text-input id="nomor_telepon" class="block mt-1 w-full" type="text" name="nomor_telepon" :value="old('nomor_telepon', $user->nomor_telepon)" />
                            </div>

                            <!-- NIK -->
                            <div>
                                <x-input-label for="nik" :value="__('NIK')" />
                                <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik" :value="old('nik', $user->biodata->nik ?? '')" />
                            </div>

                            <!-- Nomor Rekam Medis -->
                            <div>
                                <x-input-label for="nomor_rekam_medis" :value="__('Nomor Rekam Medis')" />
                                <x-text-input id="nomor_rekam_medis" class="block mt-1 w-full bg-gray-100" type="text" name="nomor_rekam_medis" :value="$user->biodata->nomor_rekam_medis ?? 'Akan dibuat otomatis'" readonly />
                            </div>

                            <!-- Tempat Lahir -->
                            <div>
                                <x-input-label for="tempat_lahir" :value="__('Tempat Lahir')" />
                                <x-text-input id="tempat_lahir" class="block mt-1 w-full" type="text" name="tempat_lahir" :value="old('tempat_lahir', $user->biodata->tempat_lahir ?? '')" />
                            </div>

                            <!-- Tanggal Lahir -->
                            <div>
                                <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
                                <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir" :value="old('tanggal_lahir', $user->biodata->tanggal_lahir ?? '')" />
                            </div>

                            <!-- Jenis Kelamin -->
                            <div>
                                <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                                <select id="jenis_kelamin" name="jenis_kelamin" class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" @selected(old('jenis_kelamin', $user->biodata->jenis_kelamin ?? '') == 'Laki-laki')>Laki-laki</option>
                                    <option value="Perempuan" @selected(old('jenis_kelamin', $user->biodata->jenis_kelamin ?? '') == 'Perempuan')>Perempuan</option>
                                </select>
                            </div>

                            <!-- Golongan Darah -->
                            <div>
                                <x-input-label for="golongan_darah" :value="__('Golongan Darah')" />
                                <select id="golongan_darah" name="golongan_darah" class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm">
                                    <option value="">Pilih Golongan Darah</option>
                                    <option value="A" @selected(old('golongan_darah', $user->biodata->golongan_darah ?? '') == 'A')>A</option>
                                    <option value="B" @selected(old('golongan_darah', $user->biodata->golongan_darah ?? '') == 'B')>B</option>
                                    <option value="AB" @selected(old('golongan_darah', $user->biodata->golongan_darah ?? '') == 'AB')>AB</option>
                                    <option value="O" @selected(old('golongan_darah', $user->biodata->golongan_darah ?? '') == 'O')>O</option>
                                </select>
                            </div>
                            
                            <!-- Agama -->
                            <div>
                                <x-input-label for="agama" :value="__('Agama')" />
                                <x-text-input id="agama" class="block mt-1 w-full" type="text" name="agama" :value="old('agama', $user->biodata->agama ?? '')" />
                            </div>
                            
                            <!-- Pendidikan Terakhir -->
                            <div>
                                <x-input-label for="pendidikan_terakhir" :value="__('Pendidikan Terakhir')" />
                                <x-text-input id="pendidikan_terakhir" class="block mt-1 w-full" type="text" name="pendidikan_terakhir" :value="old('pendidikan_terakhir', $user->biodata->pendidikan_terakhir ?? '')" />
                            </div>

                            <!-- Pekerjaan -->
                            <div class="md:col-span-2">
                                <x-input-label for="pekerjaan" :value="__('Pekerjaan')" />
                                <x-text-input id="pekerjaan" class="block mt-1 w-full" type="text" name="pekerjaan" :value="old('pekerjaan', $user->biodata->pekerjaan ?? '')" />
                            </div>

                            <!-- Alamat -->
                            <div class="md:col-span-2">
                                <x-input-label for="alamat" :value="__('Alamat')" />
                                <textarea id="alamat" name="alamat" rows="3" class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm">{{ old('alamat', $user->biodata->alamat ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 border-t pt-6">
                            <a href="{{ route('admin.pasien.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                                Batal
                            </a>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">
                                {{ __('Simpan Biodata') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>