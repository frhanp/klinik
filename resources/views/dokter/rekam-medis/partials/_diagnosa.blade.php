<div class="mt-6">
    <h3 class="text-lg font-bold text-gray-800 mb-4 pb-2 border-b border-gray-200">Pemeriksaan Medis (SOAP)</h3>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Subjective --}}
        <div class="md:col-span-2">
            <x-input-label for="subject" :value="__('S - Subjective (Keluhan Pasien)')" />
            <textarea id="subject" name="subject" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-purple-500 focus:ring-purple-500" rows="3" required placeholder="Contoh: Gigi geraham kanan bawah sakit berdenyut sejak 2 hari lalu...">{{ old('subject') }}</textarea>
            <x-input-error :messages="$errors->get('subject')" class="mt-2" />
        </div>

        {{-- Objective --}}
        <div class="md:col-span-2">
            <x-input-label for="object" :value="__('O - Objective (Pemeriksaan Fisik)')" />
            <textarea id="object" name="object" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-purple-500 focus:ring-purple-500" rows="3" required placeholder="Contoh: Sondasi (+), Perkusi (+), Palpasi (-), Terdapat karies profunda...">{{ old('object') }}</textarea>
            <x-input-error :messages="$errors->get('object')" class="mt-2" />
        </div>

        {{-- Assessment --}}
        <div>
            <x-input-label for="assessment" :value="__('A - Assessment (Diagnosa)')" />
            <textarea id="assessment" name="assessment" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-purple-500 focus:ring-purple-500" rows="3" required placeholder="Contoh: Pulpitis Irreversibel gigi 46">{{ old('assessment') }}</textarea>
            <x-input-error :messages="$errors->get('assessment')" class="mt-2" />
        </div>

        {{-- Plan --}}
        <div>
            <x-input-label for="plan" :value="__('P - Plan (Rencana Perawatan)')" />
            <textarea id="plan" name="plan" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-purple-500 focus:ring-purple-500" rows="3" required placeholder="Contoh: Pro perawatan saluran akar (PSA) kunjungan pertama...">{{ old('plan') }}</textarea>
            <x-input-error :messages="$errors->get('plan')" class="mt-2" />
        </div>

        {{-- Catatan Tambahan --}}
        <div class="md:col-span-2">
            <x-input-label for="catatan" :value="__('Catatan Tambahan (Opsional)')" />
            <textarea id="catatan" name="catatan" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-purple-500 focus:ring-purple-500" rows="2">{{ old('catatan') }}</textarea>
        </div>
    </div>
</div>