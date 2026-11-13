cat > resources/views/admin/users/index.blade.php << 'EOF'
<x-layouts::admin :title="__('Пользователи')">
    <div class="flex flex-col gap-6">
        <flux:heading size="xl" class="text-zinc-900">👥 Пользователи</flux:heading>

        <flux:card>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <!-- Шапка: тёмно-серый фон, белый текст -->
                    <thead class="bg-zinc-800 text-white">
                        <tr>
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">Имя</th>
                            <th class="px-4 py-3 text-left">Email</th>
                            <th class="px-4 py-3 text-left">Город</th>
                            <th class="px-4 py-3 text-left">Роль</th>
                            <th class="px-4 py-3 text-left">Изменить роль</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr class="border-b border-zinc-200 hover:bg-zinc-50">
                                <td class="px-4 py-3 text-zinc-700">{{ $user->id }}</td>
                                <td class="px-4 py-3 font-bold text-zinc-900">{{ $user->name }}</td>
                                <td class="px-4 py-3 text-zinc-700">{{ $user->email }}</td>
                                <td class="px-4 py-3 text-zinc-700">{{ $user->city->name ?? '—' }}</td>
                                <td class="px-4 py-3">
                                    @if($user->isAdmin())
                                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-sm font-medium">Админ</span>
                                    @else
                                        <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-sm font-medium">Пользователь</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <form action="{{ route('admin.users.updateRole', $user) }}" method="POST" class="flex gap-2">
                                        @csrf @method('PUT')
                                        <select name="role" class="px-3 py-1.5 border border-zinc-300 rounded-md text-sm text-zinc-900 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option value="user" {{ !$user->isAdmin() ? 'selected' : '' }}>Пользователь</option>
                                            <option value="admin" {{ $user->isAdmin() ? 'selected' : '' }}>Админ</option>
                                        </select>
                                        <button type="submit" class="px-3 py-1.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition text-sm font-semibold">
                                            💾
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </flux:card>

        <div class="mt-4">{{ $users->links() }}</div>
    </div>
</x-layouts::admin>
EOF