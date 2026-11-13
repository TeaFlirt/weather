<x-layouts::app.sidebar :title="__('Погода в любом городе мира')">
    <flux:main>
        <div class="flex flex-col gap-6">
            <!-- Герой-секция -->
            <div class="text-center">
                <flux:heading size="xl" class="text-zinc-900">🌍 Погода в любом городе мира</flux:heading>
                <flux:text class="mt-2 text-zinc-700">Узнайте актуальную погоду в вашем городе или любом другом месте планеты</flux:text>
            </div>

            @auth
                @if(auth()->user()->city)
                    <!-- Погода пользователя -->
                    <flux:card class="border-l-4 border-l-indigo-500">
                        <flux:heading size="lg" class="mb-4 text-zinc-900">
                            🏠 Погода в вашем городе: {{ auth()->user()->city->name }}
                        </flux:heading>
                        @php
                            $myWeather = \App\Models\WeatherToday::where('city_id', auth()->user()->city_id)->first();
                        @endphp
                        @if($myWeather)
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                                <div class="bg-blue-50 p-4 rounded-lg text-center">
                                    <div class="text-3xl font-bold text-blue-600">{{ $myWeather->temperature }}°C</div>
                                    <flux:text size="sm" class="text-zinc-700">Температура</flux:text>
                                </div>
                                <div class="bg-green-50 p-4 rounded-lg text-center">
                                    <div class="text-3xl font-bold text-green-600">{{ $myWeather->humidity }}%</div>
                                    <flux:text size="sm" class="text-zinc-700">Влажность</flux:text>
                                </div>
                                <div class="bg-purple-50 p-4 rounded-lg text-center">
                                    <div class="text-3xl font-bold text-purple-600">{{ $myWeather->pressure }}</div>
                                    <flux:text size="sm" class="text-zinc-700">Давление</flux:text>
                                </div>
                                <div class="bg-orange-50 p-4 rounded-lg text-center">
                                    <div class="text-3xl font-bold text-orange-600">{{ $myWeather->wind_speed }} м/с</div>
                                    <flux:text size="sm" class="text-zinc-700">Ветер</flux:text>
                                </div>
                            </div>
                            <flux:text class="mt-4 text-center text-zinc-700">{{ $myWeather->description }}</flux:text>
                        @endif
                    </flux:card>
                @else
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded">
                        <p class="text-yellow-800">
                            ️ У вас не выбран город. 
                            <a href="{{ route('profile.edit') }}" class="underline font-bold hover:text-yellow-600">
                                Выберите город в профиле
                            </a>, чтобы видеть погоду вашего города.
                        </p>
                    </div>
                @endif
            @endauth

            <!-- Популярные города -->
            <flux:heading size="lg" class="mt-6 text-zinc-900">🌆 Популярные города</flux:heading>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($cities as $city)
                    <flux:card>
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <flux:heading size="lg" class="text-zinc-900">{{ $city->name }}</flux:heading>
                                <flux:text size="sm" class="text-zinc-600">{{ $city->country }}</flux:text>
                            </div>
                            <span class="text-3xl">️</span>
                        </div>
                        @if($city->weatherToday->isNotEmpty())
                            @php $w = $city->weatherToday->first(); @endphp
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <flux:text class="text-zinc-700">Температура:</flux:text>
                                    <flux:text class="font-bold text-blue-600">{{ $w->temperature }}°C</flux:text>
                                </div>
                                <div class="flex justify-between">
                                    <flux:text class="text-zinc-700">Ощущается:</flux:text>
                                    <flux:text class="font-bold text-zinc-900">{{ $w->feels_like }}°C</flux:text>
                                </div>
                                <div class="flex justify-between">
                                    <flux:text class="text-zinc-700">Влажность:</flux:text>
                                    <flux:text class="font-bold text-zinc-900">{{ $w->humidity }}%</flux:text>
                                </div>
                                <div class="flex justify-between">
                                    <flux:text class="text-zinc-700">Ветер:</flux:text>
                                    <flux:text class="font-bold text-zinc-900">{{ $w->wind_speed }} м/с</flux:text>
                                </div>
                                <flux:text class="text-center mt-2 italic text-zinc-700">{{ $w->description }}</flux:text>
                            </div>
                        @else
                            <flux:text class="text-center text-zinc-500">Нет данных</flux:text>
                        @endif
                    </flux:card>
                @endforeach
            </div>
        </div>
    </flux:main>
</x-layouts::app.sidebar>
