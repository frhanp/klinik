<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Pemesanan Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-notification />
                    {{-- Di sini akan ditambahkan form pemesanan yang lebih interaktif dengan Javascript/AJAX --}}
                    {{-- Untuk sementara, kita bisa tampilkan daftar dokter --}}
                    <h3 class="text-lg font-medium mb-4">Pilih Dokter</h3>
                    <ul>
                        @foreach($dokters as $dokter)
                            <li class="mb-2 p-3 border rounded-md">
                                <p class="font-semibold">{{ $dokter->user->name }}</p>
                                <p class="text-sm text-gray-600">{{ $dokter->spesialisasi }}</p>
                                {{-- Form untuk booking akan ditambahkan di sini --}}
                            </li>
                        @endforeach
                    </ul>
                    <p class="mt-6 text-sm text-gray-600">
                        *Fitur pemilihan jadwal dan waktu akan dikembangkan lebih lanjut dengan Javascript untuk pengalaman yang lebih baik.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>