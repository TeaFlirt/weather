<x-layouts::admin :title="__('Редактировать погоду на неделю')">
    <div class="flex flex-col gap-6 max-w-2xl">
        <flux:heading size="xl">✏️ Редактировать погоду на неделю</flux:heading>

        <flux:card>
            <form action="{{ route('admin.weather-weekly.update', $weatherWeekly) }}" method="POST">
                @csrf @method('PUT')
                @include('admin.weather-weekly._form', ['weather' => $weatherWeekly])
                <div class="flex gap-2 mt-6">
                    <flux:button type="submit" variant="primary">💾 Обновить</flux:button>
                    <flux:button variant="ghost" :href="route('admin.weather-weekly.index')">Отмена</flux:button>
                </div>
            </form>
        </flux:card>
    </div>
</x-layouts::admin>
