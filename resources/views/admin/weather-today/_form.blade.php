<div class="space-y-4">
    <div>
        <flux:label for="city_id">Город</flux:label>
        <flux:select name="city_id" id="city_id" required class="mt-2">
            @foreach($cities as $city)
                <option value="{{ $city->id }}" {{ (isset($weather) && $weather->city_id == $city->id) ? 'selected' : '' }}>
                    {{ $city->name }}
                </option>
            @endforeach
        </flux:select>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <flux:label for="temperature">Температура (°C)</flux:label>
            <flux:input type="number" step="0.01" name="temperature" id="temperature" value="{{ $weather->temperature ?? '' }}" required class="mt-2" />
        </div>
        <div>
            <flux:label for="feels_like">Ощущается (°C)</flux:label>
            <flux:input type="number" step="0.01" name="feels_like" id="feels_like" value="{{ $weather->feels_like ?? '' }}" class="mt-2" />
        </div>
        <div>
            <flux:label for="humidity">Влажность (%)</flux:label>
            <flux:input type="number" name="humidity" id="humidity" value="{{ $weather->humidity ?? '' }}" required class="mt-2" />
        </div>
        <div>
            <flux:label for="pressure">Давление</flux:label>
            <flux:input type="number" name="pressure" id="pressure" value="{{ $weather->pressure ?? '' }}" required class="mt-2" />
        </div>
        <div>
            <flux:label for="wind_speed">Скорость ветра (м/с)</flux:label>
            <flux:input type="number" step="0.01" name="wind_speed" id="wind_speed" value="{{ $weather->wind_speed ?? '' }}" required class="mt-2" />
        </div>
        <div>
            <flux:label for="wind_direction">Направление ветра</flux:label>
            <flux:input type="text" name="wind_direction" id="wind_direction" value="{{ $weather->wind_direction ?? '' }}" class="mt-2" />
        </div>
    </div>

    <div>
        <flux:label for="description">Описание</flux:label>
        <flux:input type="text" name="description" id="description" value="{{ $weather->description ?? '' }}" required class="mt-2" />
    </div>

    <div>
        <flux:label for="date">Дата</flux:label>
        <flux:input type="date" name="date" id="date" value="{{ $weather->date ?? date('Y-m-d') }}" required class="mt-2" />
    </div>
</div>
