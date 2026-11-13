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
            <flux:label for="day_of_week">День недели</flux:label>
            <flux:select name="day_of_week" id="day_of_week" required class="mt-2">
                @foreach(['Пн','Вт','Ср','Чт','Пт','Сб','Вс'] as $d)
                    <option value="{{ $d }}" {{ (isset($weather) && $weather->day_of_week == $d) ? 'selected' : '' }}>
                        {{ $d }}
                    </option>
                @endforeach
            </flux:select>
        </div>
        <div>
            <flux:label for="date">Дата</flux:label>
            <flux:input type="date" name="date" id="date" value="{{ $weather->date ?? date('Y-m-d') }}" required class="mt-2" />
        </div>
        <div>
            <flux:label for="temp_min">Мин. температура</flux:label>
            <flux:input type="number" step="0.01" name="temp_min" id="temp_min" value="{{ $weather->temp_min ?? '' }}" required class="mt-2" />
        </div>
        <div>
            <flux:label for="temp_max">Макс. температура</flux:label>
            <flux:input type="number" step="0.01" name="temp_max" id="temp_max" value="{{ $weather->temp_max ?? '' }}" required class="mt-2" />
        </div>
        <div>
            <flux:label for="humidity">Влажность (%)</flux:label>
            <flux:input type="number" name="humidity" id="humidity" value="{{ $weather->humidity ?? '' }}" required class="mt-2" />
        </div>
        <div>
            <flux:label for="wind_speed">Скорость ветра (м/с)</flux:label>
            <flux:input type="number" step="0.01" name="wind_speed" id="wind_speed" value="{{ $weather->wind_speed ?? '' }}" required class="mt-2" />
        </div>
    </div>

    <div>
        <flux:label for="description">Описание</flux:label>
        <flux:input type="text" name="description" id="description" value="{{ $weather->description ?? '' }}" required class="mt-2" />
    </div>
</div>
