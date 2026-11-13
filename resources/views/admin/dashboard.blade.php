<x-layouts::admin :title="__('Дашборд')">
    <div class="flex flex-col gap-6">
        <flux:heading size="xl" class="text-zinc-900">📊 Дашборд</flux:heading>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <flux:card class="border-l-4 border-l-blue-500">
                <flux:text size="sm" class="text-zinc-600">Пользователей</flux:text>
                <div class="text-4xl font-bold text-blue-600 mt-2">{{ $stats['users'] }}</div>
            </flux:card>
            
            <flux:card class="border-l-4 border-l-green-500">
                <flux:text size="sm" class="text-zinc-600">Городов</flux:text>
                <div class="text-4xl font-bold text-green-600 mt-2">{{ $stats['cities'] }}</div>
            </flux:card>
            
            <flux:card class="border-l-4 border-l-purple-500">
                <flux:text size="sm" class="text-zinc-600">Записей погоды (сегодня)</flux:text>
                <div class="text-4xl font-bold text-purple-600 mt-2">{{ $stats['today_records'] }}</div>
            </flux:card>
        </div>

        <flux:card>
            <flux:heading size="lg" class="mb-4 text-zinc-900">Быстрые действия</flux:heading>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- ☀️ Светло-синяя -->
                <a href="{{ route('admin.weather-today.create') }}" 
                   class="flex items-center justify-center gap-2 px-4 py-3 bg-blue-100 text-blue-900 rounded-lg hover:bg-blue-200 transition font-semibold">
                    ☀️ Добавить погоду сегодня
                </a>
                
                <!-- 📅 Светло-зелёная -->
                <a href="{{ route('admin.weather-weekly.create') }}" 
                   class="flex items-center justify-center gap-2 px-4 py-3 bg-green-100 text-green-900 rounded-lg hover:bg-green-200 transition font-semibold">
                    📅 Добавить погоду на неделю
                </a>
                
                <!-- 🏙️ Светло-фиолетовая -->
                <a href="{{ route('admin.cities.create') }}" 
                   class="flex items-center justify-center gap-2 px-4 py-3 bg-purple-100 text-purple-900 rounded-lg hover:bg-purple-200 transition font-semibold">
                    🏙️ Добавить город
                </a>
                
                <!-- 👥 Светло-оранжевая -->
                <a href="{{ route('admin.users.index') }}" 
                   class="flex items-center justify-center gap-2 px-4 py-3 bg-orange-100 text-orange-900 rounded-lg hover:bg-orange-200 transition font-semibold">
                    👥 Пользователи
                </a>
            </div>
        </flux:card>
    </div>
</x-layouts::admin>