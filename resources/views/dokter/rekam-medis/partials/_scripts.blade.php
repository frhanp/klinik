@push('scripts')
    <script>
        const obats = @json($obats);
        const statusPasien = @json($pemesanan->status_pasien);

        document.addEventListener('DOMContentLoaded', function() {
            const resepContainer = document.getElementById('resep-container');
            const addButton = document.getElementById('tambah-resep');

            window.calculateTotal = function() {
                let subtotalTindakan = 0;
                let subtotalObat = 0;
                let potonganTindakan = 0;
                let potonganObat = 0;

                document.querySelectorAll(
                        '.tindakan-checkbox:not(:disabled):checked, .tindakan-checkbox:disabled')
                    .forEach(checkbox => {
                        let hargaTindakan = parseFloat(checkbox.dataset.harga) || 0;
                        subtotalTindakan += hargaTindakan;

                        if (statusPasien === 'BPJS') {
                            potonganTindakan += 2500;
                        }
                    });

                document.querySelectorAll('#resep-container .resep-row').forEach(row => {
                    const obatSelect = row.querySelector('.obat-select');
                    const jumlah = parseFloat(row.querySelector('.jumlah-input').value) || 0;
                    const tipeHarga = row.querySelector('.tipe-harga-select').value;
                    const hargaDisplay = row.querySelector('.harga-obat');

                    if (obatSelect && obatSelect.value && jumlah > 0) {
                        const selectedOption = obatSelect.options[obatSelect.selectedIndex];
                        let hargaSatuan = tipeHarga === 'resep' ?
                            parseFloat(selectedOption.dataset.hargaResep) :
                            parseFloat(selectedOption.dataset.hargaNonresep);

                        subtotalObat += hargaSatuan * jumlah;
                        hargaDisplay.value = 'Rp ' + (hargaSatuan * jumlah).toLocaleString('id-ID');

                        if (statusPasien === 'BPJS') {
                            potonganObat += hargaSatuan * jumlah;
                        }
                    } else {
                        hargaDisplay.value = 'Rp 0';
                    }
                });

                document.getElementById('subtotal-tindakan').textContent =
                    'Rp ' + subtotalTindakan.toLocaleString('id-ID');
                document.getElementById('subtotal-obat').textContent =
                    'Rp ' + subtotalObat.toLocaleString('id-ID');

                if (statusPasien === 'BPJS') {
                    const barisPotTind = document.getElementById('baris-potongan-tindakan');
                    const potTindDisp = document.getElementById('potongan-tindakan-display');
                    if (potonganTindakan > 0) {
                        barisPotTind.style.display = 'flex';
                        potTindDisp.textContent = '- Rp ' + potonganTindakan.toLocaleString('id-ID');
                    } else {
                        barisPotTind.style.display = 'none';
                    }

                    const barisPotObat = document.getElementById('baris-potongan-obat');
                    const potObatDisp = document.getElementById('potongan-obat-display');
                    if (potonganObat > 0) {
                        barisPotObat.style.display = 'flex';
                        potObatDisp.textContent = '- Rp ' + potonganObat.toLocaleString('id-ID');
                    } else {
                        barisPotObat.style.display = 'none';
                    }
                }

                let potonganInhealth = 0;
                if (statusPasien === 'Inhealth') {
                    const potonganEl = document.getElementById('potongan');
                    if (potonganEl) {
                        potonganInhealth = parseFloat(potonganEl.value) || 0;
                    }
                }

                let potonganGeneral = 0;
                const potonganGeneralEl = document.getElementById('potongan_general');
                if (potonganGeneralEl) {
                    potonganGeneral = parseFloat(potonganGeneralEl.value) || 0;
                }

                const totalAkhir = Math.max(0,
                    subtotalTindakan + subtotalObat -
                    potonganTindakan -
                    potonganObat -
                    potonganInhealth -
                    potonganGeneral
                );

                document.getElementById('total-biaya').textContent =
                    'Rp ' + totalAkhir.toLocaleString('id-ID');
            }

            let resepIndex = 0;

            function addResepRow() {
                const selectId = `select-obat-${resepIndex}`;
                const row = document.createElement('div');
                row.classList.add('resep-row', 'p-4', 'border', 'rounded-md', 'bg-gray-50', 'space-y-3');
                row.innerHTML = `
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
    <div>
        <label class="block text-sm font-medium text-gray-700">Pilih Obat</label>
        <select id="${selectId}" name="resep[${resepIndex}][obat_id]" class="obat-select" required>
            <option value="">-- Pilih dari Stok --</option>
            ${obats.map(obat =>
                `<option value="${obat.id}" 
                                    data-harga-resep="${obat.harga_jual_resep}" 
                                    data-harga-nonresep="${obat.harga_jual_non_resep}">
                                    ${obat.nama_obat} (Stok: ${obat.stok})
                                </option>`
            ).join('')}
        </select>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Tipe Harga</label>
        <select name="resep[${resepIndex}][tipe_harga]" class="tipe-harga-select mt-1 block w-full rounded-md border-gray-300" required>
            <option value="resep">Harga Resep</option>
            <option value="non_resep">Harga Non-Resep</option>
        </select>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Jumlah</label>
        <input type="number" name="resep[${resepIndex}][jumlah]" class="jumlah-input mt-1 block w-full rounded-md border-gray-300" min="1" required>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Harga</label>
        <input type="text" class="harga-obat mt-1 block w-full rounded-md border-gray-300 bg-gray-100 text-right" value="Rp 0" readonly>
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
                new TomSelect(`#${selectId}`, {
                    create: false,
                    sortField: {
                        field: "text",
                        direction: "asc"
                    }
                });
                resepIndex++;
            }

            addButton.addEventListener('click', addResepRow);
            document.body.addEventListener('change', (e) => {
                if (e.target.matches(
                        '.tindakan-checkbox, .obat-select, .tipe-harga-select, .jumlah-input')) {
                    calculateTotal();
                }
            });
            document.body.addEventListener('input', (e) => {
                if (e.target.matches('.jumlah-input')) {
                    calculateTotal();
                }
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
