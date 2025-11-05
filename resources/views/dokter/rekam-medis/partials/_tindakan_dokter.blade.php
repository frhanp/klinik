{{-- [MODIFIKASI] Blok untuk Tindakan Tambahan Dokter --}}
<div class="mt-6 border-t pt-6" x-data="{ openKategori: '' }">
    <h3 class="text-lg font-bold mb-4">Tindakan Medis Tambahan Dokter</h3>
    <div class="space-y-2">
        @foreach ($daftarTindakans as $kategori)
            @php
                $tindakanLain = $kategori->tindakanItems->whereNotIn('id', $tindakanAwalIds);
            @endphp
            @if ($tindakanLain->isNotEmpty())
                <div class="border rounded-md overflow-hidden">
                    <button type="button"
                        @click="openKategori = (openKategori === '{{ $kategori->id }}_dokter' ? '' : '{{ $kategori->id }}_dokter')"
                        class="w-full flex justify-between items-center p-3 text-left font-semibold text-gray-700 bg-gray-50 hover:bg-gray-100">
                        <span>{{ $kategori->nama_kategori }}</span>
                        <svg class="w-5 h-5 transform transition-transform"
                            :class="{ 'rotate-180': openKategori === '{{ $kategori->id }}_dokter' }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="openKategori === '{{ $kategori->id }}_dokter'" x-collapse class="p-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            @foreach ($tindakanLain as $tindakan)
                                <label class="flex items-center space-x-2 p-2 border rounded-md bg-white hover:bg-gray-100">
                                    <input type="checkbox" name="tindakans[]"
                                        value="{{ $tindakan->id }}"
                                        class="tindakan-checkbox rounded border-gray-300"
                                        data-harga="{{ $tindakan->harga }}"
                                        {{ in_array($tindakan->id, old('tindakans', [])) ? 'checked' : '' }}>
                                    <span>
                                        {{ $tindakan->keterangan }}
                                        <span class="text-gray-500">(Rp {{ number_format($tindakan->harga, 0, ',', '.') }})</span>
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
