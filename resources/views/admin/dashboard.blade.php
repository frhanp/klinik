<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card Jumlah Pasien -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-medium">Jumlah Pasien</h3>
                        <p class="mt-2 text-3xl font-bold">{{ $jumlahPasien }}</p>
                    </div>
                </div>
                <!-- Card Jumlah Dokter -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-medium">Jumlah Dokter</h3>
                        <p class="mt-2 text-3xl font-bold">{{ $jumlahDokter }}</p>
                    </div>
                </div>
                <!-- Card Pemesanan Hari Ini -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-medium">Pemesanan Hari Ini</h3>
                        <p class="mt-2 text-3xl font-bold">{{ $pemesananHariIni }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
