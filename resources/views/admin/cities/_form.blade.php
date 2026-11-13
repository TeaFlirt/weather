<div class="space-y-4">
    <div>
        <flux:label for="name">Название</flux:label>
        <flux:input type="text" name="name" id="name" value="{{ $cityData->name ?? '' }}" required class="mt-2" />
    </div>
    <div>
        <flux:label for="country">Страна</flux:label>
        <flux:input type="text" name="country" id="country" value="{{ $cityData->country ?? 'Россия' }}" required class="mt-2" />
    </div>
    <div class="grid grid-cols-2 gap-4">
        <div>
            <flux:label for="latitude">Широта</flux:label>
            <flux:input type="number" step="0.0000001" name="latitude" id="latitude" value="{{ $cityData->latitude ?? '' }}" class="mt-2" />
        </div>
        <div>
            <flux:label for="longitude">Долгота</flux:label>
            <flux:input type="number" step="0.0000001" name="longitude" id="longitude" value="{{ $cityData->longitude ?? '' }}" class="mt-2" />
        </div>
    </div>
</div>
