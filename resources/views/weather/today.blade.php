<x-layouts::app.sidebar :title="__('Погода на сегодня')">
    <flux:main>
        <div class="flex flex-col gap-6">
            
            <!-- Заголовок страницы: ЧЁРНЫЙ -->
            <flux:heading size="xl" class="text-zinc-900">☀️ Погода на сегодня</flux:heading>

            @if(isset($userCity) && $userCity)
                <!-- Карточка погоды пользователя -->
                <flux:card class="border-l-4 border-l-indigo-500">
                    <flux:heading size="lg" class="mb-4 text-zinc-900">
                        🏠 Ваш город: {{ $userCity->name }}
                    </flux:heading>
                    @if($weather)
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                            <div class="bg-blue-50 p-4 rounded-lg text-center">
                                <div class="text-3xl font-bold text-blue-600">{{ $weather->temperature }}°C</div>
                                <flux:text size="sm" class="text-zinc-700">Температура</flux:text>
                            </div>
                            <div class="bg-indigo-50 p-4 rounded-lg text-center">
                                <div class="text-3xl font-bold text-indigo-600">{{ $weather->feels_like }}°C</div>
                                <flux:text size="sm" class="text-zinc-700">Ощущается</flux:text>
                            </div>
                            <div class="bg-green-50 p-4 rounded-lg text-center">
                                <div class="text-3xl font-bold text-green-600">{{ $weather->humidity }}%</div>
                                <flux:text size="sm" class="text-zinc-700">Влажность</flux:text>
                            </div>
                            <!-- Давление: КРАСНЫЙ цвет -->
                            <div class="bg-red-50 p-4 rounded-lg text-center">
                                <div class="text-3xl font-bold text-red-600">{{ $weather->pressure }}</div>
                                <flux:text size="sm" class="text-zinc-700">Давление</flux:text>
                            </div>
                            <div class="bg-orange-50 p-4 rounded-lg text-center">
                                <div class="text-3xl font-bold text-orange-600">{{ $weather->wind_speed }} м/с</div>
                                <flux:text size="sm" class="text-zinc-700">Ветер ({{ $weather->wind_direction }})</flux:text>
                            </div>
                            <div class="bg-pink-50 p-4 rounded-lg text-center">
                                <div class="text-xl font-bold text-pink-600">{{ $weather->description }}</div>
                                <flux:text size="sm" class="text-zinc-700">Описание</flux:text>
                            </div>
                        </div>
                    @endif
                </flux:card>
            @endif

            @if(isset($weathers))
                <!-- Заголовок таблицы: ЧЁРНЫЙ -->
                <flux:heading size="lg" class="mt-6 text-zinc-900">Погода во всех городах</flux:heading>
                <flux:card>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <!-- ШАПКА ТАБЛИЦЫ: фон синий, текст БЕЛЫЙ -->
                            <thead class="bg-blue-900">
                                <tr>
                                    <th class="px-4 py-3 text-left text-white">Город</th>
                                    <th class="px-4 py-3 text-left text-white">Температура</th>
                                    <th class="px-4 py-3 text-left text-white">Ощущается</th>
                                    <th class="px-4 py-3 text-left text-white">Влажность</th>
                                    <th class="px-4 py-3 text-left text-white">Давление</th>
                                    <th class="px-4 py-3 text-left text-white">Ветер</th>
                                    <th class="px-4 py-3 text-left text-white">Описание</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($weathers as $w)
                                    <tr class="border-b border-zinc-200 hover:bg-zinc-50">
                                        <td class="px-4 py-3 font-bold text-zinc-900">{{ $w->city->name }}</td>
                                        <!-- Температура в таблице: СИНИЙ цвет -->
                                        <td class="px-4 py-3 text-blue-600 font-bold">{{ $w->temperature }}°C</td>
                                        <td class="px-4 py-3 text-zinc-700">{{ $w->feels_like }}°C</td>
                                        <td class="px-4 py-3 text-zinc-700">{{ $w->humidity }}%</td>
                                        <td class="px-4 py-3 text-zinc-700">{{ $w->pressure }}</td>
                                        <td class="px-4 py-3 text-zinc-700">{{ $w->wind_speed }} м/с {{ $w->wind_direction }}</td>
                                        <td class="px-4 py-3 text-zinc-700">{{ $w->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </flux:card>
            @endif
        </div>
    </flux:main>
</x-layouts::app.sidebar>