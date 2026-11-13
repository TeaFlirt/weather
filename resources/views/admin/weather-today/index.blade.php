<x-layouts::admin :title="__('Погода сегодня')">
    <div class="flex flex-col gap-6">
        <div class="flex justify-between items-center">
            <flux:heading size="xl" class="text-zinc-900">☀️ Погода сегодня</flux:heading>
            <a href="{{ route('admin.weather-today.create') }}" 
               class="flex items-center gap-2 px-4 py-2 bg-blue-600 !text-white rounded-lg hover:bg-blue-700 transition font-semibold">
                ➕ Добавить
            </a>
        </div>

        <flux:card>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-blue-700">
                        <tr>
                            <th class="px-4 py-3 text-left text-white">ID</th>
                            <th class="px-4 py-3 text-left text-white">Город</th>
                            <th class="px-4 py-3 text-left text-white">Температура</th>
                            <th class="px-4 py-3 text-left text-white">Описание</th>
                            <th class="px-4 py-3 text-left text-white">Дата</th>
                            <th class="px-4 py-3 text-left text-white">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($records as $r)
                            <tr class="border-b border-zinc-200 hover:bg-zinc-50">
                                <td class="px-4 py-3 text-zinc-700">{{ $r->id }}</td>
                                <td class="px-4 py-3 font-bold text-zinc-900">{{ $r->city->name }}</td>
                                <td class="px-4 py-3 text-blue-600 font-bold">{{ $r->temperature }}°C</td>
                                <td class="px-4 py-3 text-zinc-700">{{ $r->description }}</td>
                                <td class="px-4 py-3 text-zinc-700">{{ $r->date }}</td>
                                <td class="px-4 py-3 flex gap-2">
                                    <a href="{{ route('admin.weather-today.edit', $r) }}" 
                                       class="px-3 py-1 bg-yellow-100 text-yellow-900 rounded hover:bg-yellow-200 transition text-sm">
                                        ✏️
                                    </a>
                                    <form action="{{ route('admin.weather-today.destroy', $r) }}" method="POST" onsubmit="return confirm('Удалить запись?')" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-red-100 text-red-900 rounded hover:bg-red-200 transition text-sm">
                                            🗑️
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </flux:card>

        <div class="mt-4">{{ $records->links() }}</div>
    </div>
</x-layouts::admin>