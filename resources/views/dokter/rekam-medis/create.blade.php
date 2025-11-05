<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Buat Rekam Medis untuk: <span class="font-bold">{{ $pemesanan->pasien->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">

                    {{-- PASIEN INFO --}}
                    @include('dokter.rekam-medis.partials._pasien')

                    <form method="POST" action="{{ route('dokter.rekam-medis.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_pemesanan" value="{{ $pemesanan->id }}">

                        {{-- DIAGNOSA / PERAWATAN / CATATAN --}}
                        @include('dokter.rekam-medis.partials._diagnosa')

                        {{-- TINDAKAN DIPILIH PASIEN --}}
                        @include('dokter.rekam-medis.partials._tindakan_pasien')

                        {{-- TINDAKAN TAMBAHAN DOKTER --}}
                        @include('dokter.rekam-medis.partials._tindakan_dokter')

                        {{-- RESEP OBAT --}}
                        @include('dokter.rekam-medis.partials._resep')

                        {{-- FOTO PENDUKUNG --}}
                        @include('dokter.rekam-medis.partials._foto')

                        {{-- BIAYA --}}
                        @include('dokter.rekam-medis.partials._biaya')

                        {{-- ACTION BUTTONS --}}
                        @include('dokter.rekam-medis.partials._actions')
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- SCRIPTS --}}
    @include('dokter.rekam-medis.partials._scripts')

</x-app-layout>
