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
                    <form method="POST" action="{{ route('dokter.rekam-medis.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_pemesanan" value="{{ $pemesanan->id }}">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="diagnosis" :value="__('Diagnosis')" />
                                <x-text-input id="diagnosis" class="block mt-1 w-full" type="text" name="diagnosis" :value="old('diagnosis')" required />
                            </div>
                            <div>
                                <x-input-label for="perawatan" :value="__('Perawatan')" />
                                <x-text-input id="perawatan" class="block mt-1 w-full" type="text" name="perawatan" :value="old('perawatan')" required />
                            </div>
                            <div class="md:col-span-2">
                                <x-input-label for="catatan" :value="__('Catatan Tambahan (Opsional)')" />
                                <textarea id="catatan" name="catatan" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" rows="3">{{ old('catatan') }}</textarea>
                            </div>
                        </div>

                        <div class="mt-6 border-t pt-6">
                            <h3 class="text-lg font-bold mb-4">Tindakan Medis</h3>
                            <div id="tindakan-container" class="space-y-4">
                                @foreach ($daftarTindakans as $kategori)
                                    <div>
                                        <h4 class="font-semibold text-gray-700 mb-2">{{ $kategori->nama_kategori }}</h4>
                                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 pl-2">
                                            @foreach ($kategori->tindakanItems as $tindakan)
                                            <label class="flex items-center space-x-2 p-2 border rounded-md hover:bg-gray-50">
                                                <input type="checkbox" name="tindakans[]" value="{{ $tindakan->id }}" class="tindakan-checkbox rounded border-gray-300" data-harga="{{ $tindakan->harga }}">
                                                <span>{{ $tindakan->keterangan }}</span>
                                            </label>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-6 border-t pt-6">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-bold">Resep Obat</h3>
                                <button type="button" id="tambah-resep" class="px-3 py-1 bg-green-500 text-white rounded-md text-sm hover:bg-green-600">Tambah Obat</button>
                            </div>
                            <div id="resep-container" class="space-y-4">
                                </div>
                        </div>

                        <div class="mt-6 border-t pt-6">
                            <h3 class="text-lg font-bold mb-4">Foto Pendukung (Opsional)</h3>
                            <input type="file" name="foto[]" multiple class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100"/>
                        </div>


                        <div class="mt-6 border-t pt-6">
                            <h3 class="text-2xl font-bold text-right text-gray-800">
                                Total Estimasi Biaya: <span id="total-biaya" class="text-purple-600">Rp 0</span>
                            </h3>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('dokter.dashboard') }}" class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                            <x-primary-button class="bg-purple-600 hover:bg-purple-700">Simpan Rekam Medis</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    {{-- Kode JavaScript untuk TomSelect dan kalkulasi biaya --}}
    <script>
        const obats = @json($obats);
        
        document.addEventListener('DOMContentLoaded', function () {
            const resepContainer = document.getElementById('resep-container');
            const addButton = document.getElementById('tambah-resep');
            const totalBiayaEl = document.getElementById('total-biaya');
            let resepIndex = 0;

            function calculateTotal() {
                let total = 0;
                document.querySelectorAll('.tindakan-checkbox:checked').forEach(checkbox => {
                    total += parseFloat(checkbox.dataset.harga) || 0;
                });
                document.querySelectorAll('#resep-container .resep-row').forEach(row => {
                    const obatId = row.querySelector('.obat-select').value;
                    const jumlah = parseFloat(row.querySelector('.jumlah-input').value) || 0;
                    const tipeHarga = row.querySelector('.tipe-harga-select').value;
                    if (obatId && jumlah > 0) {
                        const obat = obats.find(o => o.id == obatId);
                        if (obat) {
                            const harga = tipeHarga === 'resep' ? obat.harga_jual_resep : obat.harga_jual_non_resep;
                            total += (parseFloat(harga) || 0) * jumlah;
                        }
                    }
                });
                totalBiayaEl.textContent = 'Rp ' + total.toLocaleString('id-ID');
            }

            function addResepRow() {
                const selectId = `select-obat-${resepIndex}`;
                const row = document.createElement('div');
                row.classList.add('resep-row', 'p-4', 'border', 'rounded-md', 'bg-gray-50', 'space-y-3');
                row.innerHTML = `
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Pilih Obat</label>
                            <select id="${selectId}" name="resep[${resepIndex}][obat_id]" class="obat-select" required placeholder="Ketik untuk mencari obat..."><option value="">-- Pilih dari Stok --</option>${obats.map(obat => `<option value="${obat.id}">${obat.nama_obat} (Stok: ${obat.stok})</option>`).join('')}</select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tipe Harga</label>
                            <select name="resep[${resepIndex}][tipe_harga]" class="tipe-harga-select mt-1 block w-full rounded-md border-gray-300" required><option value="resep">Harga Resep</option><option value="non_resep">Harga Non-Resep</option></select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                            <input type="number" name="resep[${resepIndex}][jumlah]" class="jumlah-input mt-1 block w-full rounded-md border-gray-300" min="1" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                         <div>
                            <label class="block text-sm font-medium text-gray-700">Dosis</label>
                            <input type="text" name="resep[${resepIndex}][dosis]" class="mt-1 block w-full rounded-md border-gray-300">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Instruksi</label>
                            <input type="text" name="resep[${resepIndex}][instruksi]" class="mt-1 block w-full rounded-md border-gray-300">
                        </div>
                    </div>
                    <button type="button" class="hapus-resep text-red-500 text-sm hover:text-red-700">Hapus</button>
                `;
                resepContainer.appendChild(row);
                new TomSelect(`#${selectId}`, { create: false, sortField: { field: "text", direction: "asc" } });
                resepIndex++;
            }

            addButton.addEventListener('click', addResepRow);
            document.body.addEventListener('change', (e) => {
                if (e.target.matches('.tindakan-checkbox, .obat-select, .tipe-harga-select, .jumlah-input')) { calculateTotal(); }
            });
            document.body.addEventListener('input', (e) => {
                if (e.target.matches('.jumlah-input')) { calculateTotal(); }
            });
            document.body.addEventListener('click', (e) => {
                if (e.target.classList.contains('hapus-resep')) {
                    e.target.closest('.resep-row').remove();
                    calculateTotal();
                }
            });
            addResepRow();
            calculateTotal();
        });
    </script>
    @endpush
</x-app-layout>