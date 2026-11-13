<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white">
        <div class="flex min-h-screen">
            <!-- Боковое меню админки -->
            <flux:sidebar sticky class="border-e border-zinc-200 bg-zinc-50 w-64">
                <flux:sidebar.header>
                    <!-- Логотип с зонтиком и чёрным текстом -->
                    <a href="{{ route('home') }}" class="flex items-center gap-2 px-3 py-2 text-zinc-900 hover:text-zinc-700" wire:navigate>
                        <span class="flex aspect-square size-8 items-center justify-center">
                            <span class="text-xl">☂️</span>
                        </span>
                        <span class="text-lg font-semibold text-zinc-900">Админ-панель</span>
                    </a>
                </flux:sidebar.header>

                <flux:sidebar.nav>
                    <flux:sidebar.group :heading="__('Управление')" class="grid">
                        <flux:sidebar.item icon="layout-grid" :href="route('admin.dashboard')" :current="request()->routeIs('admin.dashboard')" wire:navigate class="!text-zinc-900 hover:!text-zinc-700">
                            {{ __('📊 Дашборд') }}
                        </flux:sidebar.item>
                        
                        <flux:sidebar.item icon="sun" :href="route('admin.weather-today.index')" :current="request()->routeIs('admin.weather-today.*')" wire:navigate class="!text-zinc-900 hover:!text-zinc-700">
                            {{ __('☀️ Погода сегодня') }}
                        </flux:sidebar.item>
                        
                        <flux:sidebar.item icon="calendar" :href="route('admin.weather-weekly.index')" :current="request()->routeIs('admin.weather-weekly.*')" wire:navigate class="!text-zinc-900 hover:!text-zinc-700">
                            {{ __('📅 Погода на неделю') }}
                        </flux:sidebar.item>
                        
                        <flux:sidebar.item icon="map" :href="route('admin.cities.index')" :current="request()->routeIs('admin.cities.*')" wire:navigate class="!text-zinc-900 hover:!text-zinc-700">
                            {{ __('🏙️ Города') }}
                        </flux:sidebar.item>
                        
                        <flux:sidebar.item icon="users" :href="route('admin.users.index')" :current="request()->routeIs('admin.users.*')" wire:navigate class="!text-zinc-900 hover:!text-zinc-700">
                            {{ __('👥 Пользователи') }}
                        </flux:sidebar.item>
                    </flux:sidebar.group>
                </flux:sidebar.nav>

                <flux:spacer />

                <flux:sidebar.nav>
                    <flux:sidebar.item icon="home" href="{{ route('home') }}" wire:navigate class="!text-zinc-900 hover:!text-zinc-700">
                        {{ __('🏠 На сайт') }}
                    </flux:sidebar.item>
                    
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:sidebar.item
                            as="button"
                            type="submit"
                            icon="arrow-right-start-on-rectangle"
                            class="w-full cursor-pointer !text-red-600 hover:!text-red-700"
                        >
                            {{ __('🚪 Выйти') }}
                        </flux:sidebar.item>
                    </form>
                </flux:sidebar.nav>
            </flux:sidebar>

            <!-- Основной контент -->
            <main class="flex-1 p-8">
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
        @fluxScripts
    </body>
</html>
