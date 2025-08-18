<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Selamat Datang, ') . Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(!Auth::user()->biodata || !Auth::user()->biodata->nik)
            <div class="mb-6 p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 rounded-r-lg">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-yellow-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zM9 5v6h2V5H9zm0 8h2v2H9v-2z"/></svg></div>
                    <div>
                        <p class="font-bold">Biodata Anda Belum Lengkap</p>
                        <p class="text-sm">Untuk mempercepat proses pelayanan di klinik, mohon lengkapi data diri Anda. <a href="{{ route('pasien.biodata.edit') }}" class="font-semibold underline hover:text-yellow-800">Klik di sini untuk melengkapi.</a></p>
                    </div>
                </div>
            </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Pemesanan Aktif Anda</h3>
                    @if($pemesananAktif->isNotEmpty())
                        @foreach($pemesananAktif as $pemesanan)
                            <div class="border p-4 rounded-lg mb-4">
                                <p><strong>Dokter:</strong> {{ $pemesanan->dokter->user->name }}</p>
                                <p><strong>Jadwal:</strong> {{ \Carbon\Carbon::parse($pemesanan->tanggal_pesan)->translatedFormat('l, d F Y') }} pukul {{ \Carbon\Carbon::parse($pemesanan->waktu_pesan)->format('H:i') }}</p>
                                <p><strong>Status:</strong> <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">{{ $pemesanan->status }}</span></p>
                            </div>
                        @endforeach
                    @else
                        <p>Anda tidak memiliki pemesanan yang aktif saat ini.</p>
                        <a href="{{ route('pasien.pemesanan.create') }}" class="inline-block mt-4 px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                            Buat Pemesanan Baru
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>