
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Data Pasien: <span class="font-bold">{{ $pasien->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <x-notification />
                    <form method="POST" action="{{ route('admin.pasien.update', $pasien->id) }}">
                        @csrf
                        @method('PUT')

                         <h3 class="text-lg font-semibold mb-4 border-b pb-2">Data Pasien</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 mb-6">
                            {{-- Kolom Kiri --}}
                            <div class="space-y-4">
                                <div>
                                    <x-input-label for="name" :value="__('Nama Pasien')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $pasien->name)" required />
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <x-input-label for="tempat_lahir" :value="__('Tempat Lahir')" />
                                        <x-text-input id="tempat_lahir" class="block mt-1 w-full" type="text" name="tempat_lahir" :value="old('tempat_lahir', optional($pasien->biodata)->tempat_lahir)" />
                                    </div>
                                    <div>
                                        <x-input-label for="tanggal_lahir" :value="__('Tgl. Lahir')" />
                                        <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir" :value="old('tanggal_lahir', optional($pasien->biodata)->tanggal_lahir)" />
                                    </div>
                                </div>
                                <div>
                                    <x-input-label for="umur" :value="__('Umur (Tahun)')" />
                                    <x-text-input id="umur" class="block mt-1 w-full" type="number" name="umur" :value="old('umur', optional($pasien->biodata)->umur)" min="0" />
                                </div>
                                <div>
                                    <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                                    <select id="jenis_kelamin" name="jenis_kelamin" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                        <option value="">-- Pilih --</option>
                                        <option value="Laki-laki" @selected(old('jenis_kelamin', optional($pasien->biodata)->jenis_kelamin) == 'Laki-laki')>Laki-laki</option>
                                        <option value="Perempuan" @selected(old('jenis_kelamin', optional($pasien->biodata)->jenis_kelamin) == 'Perempuan')>Perempuan</option>
                                    </select>
                                </div>
                                <div>
                                    <x-input-label for="alamat" :value="__('Alamat')" />
                                    <textarea id="alamat" name="alamat" rows="2" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('alamat', optional($pasien->biodata)->alamat) }}</textarea>
                                </div>
                                <div>
                                    <x-input-label for="nomor_telepon" :value="__('Nomor HP')" />
                                    <x-text-input id="nomor_telepon" class="block mt-1 w-full" type="text" name="nomor_telepon" :value="old('nomor_telepon', $pasien->nomor_telepon)" />
                                </div>
                                <div>
                                    <x-input-label for="pekerjaan" :value="__('Pekerjaan')" />
                                    <x-text-input id="pekerjaan" class="block mt-1 w-full" type="text" name="pekerjaan" :value="old('pekerjaan', optional($pasien->biodata)->pekerjaan)" />
                                </div>
                                <div>
                                    <x-input-label for="nama_orang_tua" :value="__('Nama Orang Tua (Jika pasien anak)')" />
                                    <x-text-input id="nama_orang_tua" class="block mt-1 w-full" type="text" name="nama_orang_tua" :value="old('nama_orang_tua', optional($pasien->biodata)->nama_orang_tua)" />
                                </div>
                            </div>

                            {{-- Kolom Kanan --}}
                            <div class="space-y-4">
                                <div>
                                    <x-input-label for="status_pasien" :value="__('Status Pasien')" />
                                    <select id="status_pasien" name="status_pasien" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                        <option value="">-- Pilih --</option>
                                        <option value="BPJS" @selected(old('status_pasien', optional($pasien->biodata)->status_pasien) == 'BPJS')>BPJS</option>
                                        <option value="Umum" @selected(old('status_pasien', optional($pasien->biodata)->status_pasien) == 'Umum')>Umum</option>
                                        <option value="Inhealth" @selected(old('status_pasien', optional($pasien->biodata)->status_pasien) == 'Inhealth')>Inhealth</option>
                                    </select>
                                </div>
                                <div>
                                    <x-input-label for="golongan_darah" :value="__('Golongan Darah')" />
                                    <select id="golongan_darah" name="golongan_darah" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                        <option value="">-- Pilih --</option>
                                        <option value="A" @selected(old('golongan_darah', optional($pasien->biodata)->golongan_darah) == 'A')>A</option>
                                        <option value="B" @selected(old('golongan_darah', optional($pasien->biodata)->golongan_darah) == 'B')>B</option>
                                        <option value="AB" @selected(old('golongan_darah', optional($pasien->biodata)->golongan_darah) == 'AB')>AB</option>
                                        <option value="O" @selected(old('golongan_darah', optional($pasien->biodata)->golongan_darah) == 'O')>O</option>
                                    </select>
                                </div>
                                <div>
                                    <x-input-label for="riwayat_penyakit" :value="__('Riwayat Penyakit')" />
                                    <textarea id="riwayat_penyakit" name="riwayat_penyakit" rows="2" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('riwayat_penyakit', optional($pasien->biodata)->riwayat_penyakit) }}</textarea>
                                </div>
                                 <div>
                                    <x-input-label for="riwayat_alergi_obat" :value="__('Riwayat Alergi Obat')" />
                                    <textarea id="riwayat_alergi_obat" name="riwayat_alergi_obat" rows="2" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('riwayat_alergi_obat', optional($pasien->biodata)->riwayat_alergi_obat) }}</textarea>
                                </div>
                                 <div>
                                    <x-input-label for="riwayat_alergi_makanan" :value="__('Riwayat Alergi Makanan')" />
                                    <textarea id="riwayat_alergi_makanan" name="riwayat_alergi_makanan" rows="2" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('riwayat_alergi_makanan', optional($pasien->biodata)->riwayat_alergi_makanan) }}</textarea>
                                </div>
                                 <div>
                                    <x-input-label for="penyakit_penting" :value="__('Penyakit Penting Lainnya')" />
                                    <textarea id="penyakit_penting" name="penyakit_penting" rows="2" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('penyakit_penting', optional($pasien->biodata)->penyakit_penting) }}</textarea>
                                </div>
                            </div>
                        </div>

                         <h3 class="text-lg font-semibold mb-4 border-b pb-2 mt-8">Data Akun</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                             <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $pasien->email)" required />
                            </div>
                             {{-- Password tidak diubah di sini --}}
                             <div>
                                <x-input-label for="nik" :value="__('NIK')" />
                                <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik" :value="old('nik', optional($pasien->biodata)->nik)" />
                                <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 border-t pt-6">
                            <a href="{{ route('admin.pasien.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                                Batal
                            </a>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">
                                {{ __('Simpan Perubahan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
