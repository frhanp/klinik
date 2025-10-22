{{-- AWAL MODIFIKASI: resources/views/admin/pasien.show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between md:items-center gap-4">
             <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detail Pasien: <span class="font-bold text-purple-700">{{ $pasien->name }}</span>
            </h2>
             <a href="{{ route('admin.pasien.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
             </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <div class="flex items-center mb-8">
                        <img src="{{ asset('images/logodeliyana.png') }}" alt="Logo Klinik" class="h-16 w-auto mr-4">
                        <div>
                            <h2 class="text-2xl font-bold text-purple-800 leading-tight">Deliyana Dental Care</h2>
                            <p class="text-sm text-gray-500">Detail Informasi Pasien</p>
                        </div>
                    </div>

                    {{-- Data Akun --}}
                    <div class="mb-8">
                        <h3 class="text-xl font-bold text-purple-800 mb-4 pb-2 border-b border-purple-200">Data Akun</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4 text-base">
                            <div class="space-y-1">
                                <p class="text-sm font-medium text-gray-500">Nama Lengkap</p>
                                <p class="text-gray-900">{{ $pasien->name }}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm font-medium text-gray-500">Email</p>
                                <p class="text-gray-900">{{ $pasien->email }}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm font-medium text-gray-500">Nomor HP</p>
                                <p class="text-gray-900">{{ $pasien->nomor_telepon ?? '-' }}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm font-medium text-gray-500">Terdaftar Sejak</p>
                                <p class="text-gray-900">{{ $pasien->created_at->translatedFormat('d F Y H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Data Pribadi & Medis --}}
                    @if($pasien->biodata)
                    <div class="mt-8 pt-8 border-t border-gray-200">
                         <h3 class="text-xl font-bold text-purple-800 mb-4 pb-2 border-b border-purple-200">Data Pribadi & Medis</h3>
                         <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-6 text-base">
                             {{-- Kolom Kiri --}}
                             <div class="space-y-4">
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">NIK</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->nik ?? '-' }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Tempat, Tanggal Lahir</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->tempat_lahir ?? '-' }}, {{ $pasien->biodata->tanggal_lahir ? \Carbon\Carbon::parse($pasien->biodata->tanggal_lahir)->translatedFormat('d F Y') : '-' }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Umur</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->umur ? $pasien->biodata->umur . ' Tahun' : ($pasien->biodata->tanggal_lahir ? \Carbon\Carbon::parse($pasien->biodata->tanggal_lahir)->age . ' Tahun' : '-') }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Jenis Kelamin</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->jenis_kelamin ?? '-' }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Alamat</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->alamat ?? '-' }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Pekerjaan</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->pekerjaan ?? '-' }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Nama Orang Tua</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->nama_orang_tua ?? '-' }}</p>
                                </div>
                            </div>
                            {{-- Kolom Kanan --}}
                            <div class="space-y-4">
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Status Pasien Terakhir</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->status_pasien ?? '-' }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Golongan Darah</p>
                                    <p class="text-gray-900 uppercase">{{ $pasien->biodata->golongan_darah ?? '-' }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Riwayat Penyakit</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->riwayat_penyakit ?? '-' }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Riwayat Alergi Obat</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->riwayat_alergi_obat ?? '-' }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Riwayat Alergi Makanan</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->riwayat_alergi_makanan ?? '-' }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm font-medium text-gray-500">Penyakit Penting Lainnya</p>
                                    <p class="text-gray-900">{{ $pasien->biodata->penyakit_penting ?? '-' }}</p>
                                </div>
                            </div>
                         </div>
                    </div>
                    @else
                     <div class="mt-8 pt-8 border-t border-gray-200">
                        <p class="text-center text-gray-500 italic">Biodata lengkap pasien belum diisi.</p>
                     </div>
                    @endif

                    {{-- Tombol Edit --}}
                    <div class="mt-8 pt-6 border-t flex justify-end">
                        <a href="{{ route('admin.pasien.edit', $pasien->id) }}" class="inline-flex items-center px-5 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            Edit Data Pasien
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
{{-- AKHIR MODIFIKASI --}}