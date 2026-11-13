<x-layouts::app.sidebar :title="__('Личный кабинет')">
    <flux:main>
        <div class="flex flex-col gap-6">
            <flux:heading size="xl">👋 Добро пожаловать, {{ auth()->user()->name }}!</flux:heading>

            @if(auth()->user()->city)
                <flux:card class="border-l-4 border-l-indigo-500">
                    <flux:heading size="lg" class="mb-4">
                        🏠 Погода в вашем городе: {{ auth()->user()->city->name }}
                    </flux:heading>
                    @php
                        $myWeather = \App\Models\WeatherToday::where('city_id', auth()->user()->city_id)->first();
                        $myWeekly = \App\Models\WeatherWeekly::where('city_id', auth()->user()->city_id)->orderBy('date')->get();
                    @endphp
                    @if($myWeather)
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                            <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg text-center">
                                <div class="text-3xl font-bold text-blue-600 dark:text-blue-400">{{ $myWeather->temperature }}°C</div>
                                <flux:text size="sm">Температура</flux:text>
                            </div>
                            <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg text-center">
                                <div class="text-3xl font-bold text-green-600 dark:text-green-400">{{ $myWeather->humidity }}%</div>
                                <flux:text size="sm">Влажность</flux:text>
                            </div>
                            <div class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded-lg text-center">
                                <div class="text-3xl font-bold text-purple-600 dark:text-purple-400">{{ $myWeather->pressure }}</div>
                                <flux:text size="sm">Давление</flux:text>
                            </div>
                            <div class="bg-orange-50 dark:bg-orange-900/20 p-4 rounded-lg text-center">
                                <div class="text-3xl font-bold text-orange-600 dark:text-orange-400">{{ $myWeather->wind_speed }} м/с</div>
                                <flux:text size="sm">Ветер</flux:text>
                            </div>
                        </div>
                        <flux:text class="mt-4 text-center text-lg">{{ $myWeather->description }}</flux:text>
                    @endif
                </flux:card>

                @if($myWeekly->isNotEmpty())
                    <flux:heading size="lg"> Прогноз на неделю</flux:heading>
                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-4">
                        @foreach($myWeekly as $day)
                            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 p-4 rounded-lg text-center">
                                <div class="font-bold text-lg text-indigo-600 dark:text-indigo-400">{{ $day->day_of_week }}</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($day->date)->format('d.m') }}</div>
                                <div class="text-2xl font-bold my-2">{{ $day->temp_max }}°</div>
                                <div class="text-sm text-blue-600 dark:text-blue-400">{{ $day->temp_min }}°</div>
                                <div class="text-xs text-gray-600 dark:text-gray-300 mt-2">{{ $day->description }}</div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @else
                <div class="bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-400 p-4 rounded">
                    <p class="text-yellow-800 dark:text-yellow-200">
                        ⚠️ У вас не выбран город. 
                        <a href="{{ route('profile.edit') }}" class="underline font-bold">Выберите город в профиле</a>, 
                        чтобы видеть персональную сводку.
                    </p>
                </div>
            @endif
        </div>
    </flux:main>
</x-layouts::app.sidebar>
