<x-layouts::admin :title="__('Редактировать город')">
    <div class="flex flex-col gap-6 max-w-2xl">
        <flux:heading size="xl">✏️ Редактировать город</flux:heading>

        <flux:card>
            <form action="{{ route('admin.cities.update', $city) }}" method="POST">
                @csrf @method('PUT')
                @include('admin.cities._form', ['cityData' => $city])
                <div class="flex gap-2 mt-6">
                    <flux:button type="submit" variant="primary">💾 Обновить</flux:button>
                    <flux:button variant="ghost" :href="route('admin.cities.index')">Отмена</flux:button>
                </div>
            </form>
        </flux:card>
    </div>
</x-layouts::admin>
