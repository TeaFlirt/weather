<x-layouts::app.sidebar :title="__('Мой профиль')">
    <flux:main>
        <div class="flex flex-col gap-6 max-w-2xl mx-auto">
            <flux:heading size="xl">👤 Мой профиль</flux:heading>

            <flux:card>
                <div class="space-y-6">
                    <div>
                        <flux:label>Имя</flux:label>
                        <flux:text class="text-xl mt-1">{{ auth()->user()->name }}</flux:text>
                    </div>

                    <div>
                        <flux:label>Email</flux:label>
                        <flux:text class="text-xl mt-1">{{ auth()->user()->email }}</flux:text>
                    </div>

                    <flux:separator />

                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="space-y-4">
                            <div>
                                <flux:label for="city_id">🏙️ Ваш город</flux:label>
                                <flux:select name="city_id" id="city_id" required class="mt-2">
                                    <option value="">-- Выберите город --</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" {{ auth()->user()->city_id == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }} ({{ $city->country }})
                                        </option>
                                    @endforeach
                                </flux:select>
                                <flux:text size="sm" class="mt-2 text-gray-500">
                                    После выбора города вы будете видеть погоду только для него
                                </flux:text>
                            </div>

                            <div class="flex gap-2">
                                <flux:button type="submit" variant="primary">
                                    💾 Сохранить изменения
                                </flux:button>
                            </div>
                        </div>
                    </form>
                </div>
            </flux:card>
        </div>
    </flux:main>
</x-layouts::app.sidebar>
