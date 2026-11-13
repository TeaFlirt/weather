<x-layouts::admin :title="__('Добавить город')">
    <div class="flex flex-col gap-6 max-w-2xl">
        <flux:heading size="xl">➕ Добавить город</flux:heading>

        <flux:card>
            <form action="{{ route('admin.cities.store') }}" method="POST">
                @csrf
                @include('admin.cities._form')
                <div class="flex gap-2 mt-6">
                    <flux:button type="submit" variant="primary">💾 Сохранить</flux:button>
                    <flux:button variant="ghost" :href="route('admin.cities.index')">Отмена</flux:button>
                </div>
            </form>
        </flux:card>
    </div>
</x-layouts::admin>
