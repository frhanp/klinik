{{-- Ringkasan Biaya --}}
<div class="mt-6 border-t pt-6">
    <div class="space-y-3 max-w-md ml-auto">
        <div class="flex justify-between items-center">
            <span class="text-gray-600">Subtotal Tindakan</span>
            <span id="subtotal-tindakan" class="font-semibold text-gray-800">Rp 0</span>
        </div>
        <div class="flex justify-between items-center">
            <span class="text-gray-600">Subtotal Obat</span>
            <span id="subtotal-obat" class="font-semibold text-gray-800">Rp 0</span>
        </div>

        {{-- Potongan BPJS --}}
        @if ($pemesanan->status_pasien == 'BPJS')
            <div id="baris-potongan-tindakan" class="flex justify-between items-center text-red-600"
                style="display: none;">
                <span>Potongan BPJS Tindakan</span>
                <span id="potongan-tindakan-display">- Rp 0</span>
            </div>
            <div id="baris-potongan-obat" class="flex justify-between items-center text-red-600" style="display: none;">
                <span>Potongan BPJS Obat</span>
                <span id="potongan-obat-display">- Rp 0</span>
            </div>
        @endif

        {{-- Potongan Inhealth --}}
        @if ($pemesanan->status_pasien == 'Inhealth')
            <div class="flex justify-between items-center">
                <label for="potongan" class="text-gray-600">Potongan Inhealth</label>
                <div class="flex items-center">
                    <span class="mr-2 text-gray-500">Rp.</span>
                    <x-text-input type="number" name="potongan" id="potongan" value="{{ old('potongan', 0) }}"
                        min="0" class="text-right w-36" oninput="calculateTotal()" />
                </div>
            </div>
        @endif

        {{-- Potongan General (Promo / Manual) --}}
        <div class="flex justify-between items-center">
            <label for="potongan_general" class="text-gray-600">Potongan Lainnya (Jika Ada)</label>
            <div class="flex items-center">
                <span class="mr-2 text-gray-500">Rp.</span>
                <x-text-input type="number" name="potongan_general" id="potongan_general"
                    value="{{ old('potongan_general', 0) }}" min="0" class="text-right w-36"
                    oninput="calculateTotal()" />
            </div>
        </div>


        {{-- Total Akhir --}}
        <div class="flex justify-between items-center border-t pt-3">
            <h3 class="text-lg font-bold text-gray-800">Total Akhir</h3>
            <span id="total-biaya" class="text-xl font-bold text-purple-600">Rp 0</span>
        </div>
    </div>
</div>
