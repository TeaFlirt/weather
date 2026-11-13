<x-layouts::admin :title="__('Редактировать погоду')">
    <div class="flex flex-col gap-6 max-w-2xl">
        <flux:heading size="xl">✏️ Редактировать погоду</flux:heading>

        <flux:card>
            <form action="{{ route('admin.weather-today.update', $weatherToday) }}" method="POST">
                @csrf @method('PUT')
                @include('admin.weather-today._form', ['weather' => $weatherToday])
                <div class="flex gap-2 mt-6">
                    <flux:button type="submit" variant="primary">💾 Обновить</flux:button>
                    <flux:button variant="ghost" :href="route('admin.weather-today.index')">Отмена</flux:button>
                </div>
            </form>
        </flux:card>
    </div>
</x-layouts::admin>
