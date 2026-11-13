<x-layouts::app.sidebar :title="__('Погода на неделю')">
    <flux:main>
        <div class="flex flex-col gap-6">
            
            <!-- Заголовок страницы: ЧЁРНЫЙ -->
            <flux:heading size="xl" class="text-zinc-900">📅 Прогноз на неделю</flux:heading>

            @if(isset($userCity) && $userCity)
                <!-- Карточка прогноза для города пользователя -->
                <flux:card class="border-l-4 border-l-indigo-500">
                    <flux:heading size="lg" class="mb-4 text-zinc-900">
                        🏠 Ваш город: {{ $userCity->name }}
                    </flux:heading>
                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-4">
                        @foreach($weekly as $day)
                            <div class="bg-blue-50 p-4 rounded-lg text-center">
                                <div class="font-bold text-lg text-indigo-600">{{ $day->day_of_week }}</div>
                                <div class="text-sm text-zinc-500">{{ \Carbon\Carbon::parse($day->date)->format('d.m') }}</div>
                                <!-- Максимальная температура: КРАСНЫЙ цвет -->
                                <div class="text-2xl font-bold my-2 text-red-600">{{ $day->temp_max }}°</div>
                                <!-- Минимальная температура: СИНИЙ цвет -->
                                <div class="text-sm text-blue-600">{{ $day->temp_min }}°</div>
                                <div class="text-xs text-zinc-700 mt-2">{{ $day->description }}</div>
                                <div class="text-xs text-zinc-700 mt-1">💧{{ $day->humidity }}%</div>
                            </div>
                        @endforeach
                    </div>
                </flux:card>
            @endif

            @if(isset($weekly) && !isset($userCity))
                <!-- Заголовок таблицы: ЧЁРНЫЙ -->
                <flux:heading size="lg" class="mt-6 text-zinc-900">Прогноз по всем городам</flux:heading>
                <flux:card>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <!-- ШАПКА ТАБЛИЦЫ: фон синий, текст БЕЛЫЙ -->
                            <thead class="bg-blue-900">
                                <tr>
                                    <th class="px-4 py-3 text-left text-white">Город</th>
                                    <th class="px-4 py-3 text-left text-white">День</th>
                                    <th class="px-4 py-3 text-left text-white">Дата</th>
                                    <th class="px-4 py-3 text-left text-white">Мин.</th>
                                    <th class="px-4 py-3 text-left text-white">Макс.</th>
                                    <th class="px-4 py-3 text-left text-white">Влажность</th>
                                    <th class="px-4 py-3 text-left text-white">Ветер</th>
                                    <th class="px-4 py-3 text-left text-white">Описание</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($weekly as $w)
                                    <tr class="border-b border-zinc-200 hover:bg-zinc-50">
                                        <td class="px-4 py-3 font-bold text-zinc-900">{{ $w->city->name }}</td>
                                        <td class="px-4 py-3 text-zinc-700">{{ $w->day_of_week }}</td>
                                        <td class="px-4 py-3 text-zinc-700">{{ \Carbon\Carbon::parse($w->date)->format('d.m.Y') }}</td>
                                        <!-- Мин. температура: СИНИЙ цвет -->
                                        <td class="px-4 py-3 text-blue-600 font-bold">{{ $w->temp_min }}°C</td>
                                        <!-- Макс. температура: КРАСНЫЙ цвет -->
                                        <td class="px-4 py-3 text-red-600 font-bold">{{ $w->temp_max }}°C</td>
                                        <td class="px-4 py-3 text-zinc-700">{{ $w->humidity }}%</td>
                                        <td class="px-4 py-3 text-zinc-700">{{ $w->wind_speed }} м/с</td>
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