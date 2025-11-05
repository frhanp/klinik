<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
    <div>
        <x-input-label for="diagnosis" :value="__('Diagnosis')" />
        <x-text-input id="diagnosis" class="block mt-1 w-full"
            type="text" name="diagnosis" :value="old('diagnosis')" required />
    </div>

    <div>
        <x-input-label for="perawatan" :value="__('Perawatan')" />
        <x-text-input id="perawatan" class="block mt-1 w-full"
            type="text" name="perawatan" :value="old('perawatan')" required />
    </div>

    <div class="md:col-span-2">
        <x-input-label for="catatan" :value="__('Catatan Tambahan (Opsional)')" />
        <textarea id="catatan" name="catatan"
            class="block mt-1 w-full rounded-md shadow-sm border-gray-300"
            rows="3">{{ old('catatan') }}</textarea>
    </div>
</div>
