<x-layouts::admin :title="__('Города')">
    <div class="flex flex-col gap-6">
        <div class="flex justify-between items-center">
            <flux:heading size="xl" class="text-zinc-900">🏙️ Города</flux:heading>
            <a href="{{ route('admin.cities.create') }}" 
               class="flex items-center gap-2 px-4 py-2 bg-purple-600 !text-white rounded-lg hover:bg-purple-700 transition font-semibold">
                ➕ Добавить
            </a>
        </div>

        <flux:card>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-purple-700">
                        <tr>
                            <th class="px-4 py-3 text-left text-white">ID</th>
                            <th class="px-4 py-3 text-left text-white">Название</th>
                            <th class="px-4 py-3 text-left text-white">Страна</th>
                            <th class="px-4 py-3 text-left text-white">Координаты</th>
                            <th class="px-4 py-3 text-left text-white">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cities as $city)
                            <tr class="border-b border-zinc-200 hover:bg-zinc-50">
                                <td class="px-4 py-3 text-zinc-700">{{ $city->id }}</td>
                                <td class="px-4 py-3 font-bold text-zinc-900">{{ $city->name }}</td>
                                <td class="px-4 py-3 text-zinc-700">{{ $city->country }}</td>
                                <td class="px-4 py-3 text-zinc-700 text-sm">{{ $city->latitude }}, {{ $city->longitude }}</td>
                                <td class="px-4 py-3 flex gap-2">
                                    <a href="{{ route('admin.cities.edit', $city) }}" 
                                       class="px-3 py-1 bg-yellow-100 text-yellow-900 rounded hover:bg-yellow-200 transition text-sm">
                                        ✏️
                                    </a>
                                    <form action="{{ route('admin.cities.destroy', $city) }}" method="POST" onsubmit="return confirm('Удалить город? Все связанные погоды будут удалены!')" class="inline">
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

        <div class="mt-4">{{ $cities->links() }}</div>
    </div>
</x-layouts::admin>