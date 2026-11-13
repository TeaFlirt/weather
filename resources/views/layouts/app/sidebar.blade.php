<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white">
        <flux:sidebar sticky collapsible="mobile" class="border-e border-zinc-200 bg-zinc-50">
            <flux:sidebar.header>
                <x-app-logo :sidebar="true" href="{{ route('home') }}" wire:navigate />
                <flux:sidebar.collapse class="lg:hidden" />
            </flux:sidebar.header>

            <flux:sidebar.nav>
                <flux:sidebar.group :heading="__('Навигация')" class="grid">
                    <flux:sidebar.item icon="home" :href="route('home')" :current="request()->routeIs('home')" wire:navigate>
                        {{ __('Главная') }}
                    </flux:sidebar.item>
                    
                    <flux:sidebar.item icon="sun" :href="route('weather.today')" :current="request()->routeIs('weather.today')" wire:navigate>
                        {{ __('Погода сегодня') }}
                    </flux:sidebar.item>
                    
                    <flux:sidebar.item icon="calendar" :href="route('weather.weekly')" :current="request()->routeIs('weather.weekly')" wire:navigate>
                        {{ __('Погода на неделю') }}
                    </flux:sidebar.item>
                </flux:sidebar.group>
                
                @auth
                    @if(auth()->user()->isAdmin())
                        <flux:sidebar.group :heading="__('Администрирование')" class="grid mt-4">
                            <flux:sidebar.item icon="cog" :href="route('admin.dashboard')" :current="request()->routeIs('admin.*')" wire:navigate class="!text-zinc-900 hover:!text-zinc-700">
    {{ __('Админ-панель') }}
</flux:sidebar.item>
                        </flux:sidebar.group>
                    @endif
                @endauth
            </flux:sidebar.nav>

            <flux:spacer />

            <flux:sidebar.nav>
                <flux:sidebar.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                    {{ __('Repository') }}
                </flux:sidebar.item>

                <flux:sidebar.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
                    {{ __('Documentation') }}
                </flux:sidebar.item>
            </flux:sidebar.nav>

            @auth
                <x-desktop-user-menu class="hidden lg:block" :name="auth()->user()->name" />
            @else
                <div class="hidden lg:flex flex-col gap-2 px-4 pb-4">
                    <a href="{{ route('login') }}" wire:navigate class="px-4 py-2 border border-zinc-300 rounded-md text-zinc-900 hover:bg-zinc-100 transition text-center">
                        {{ __('Вход') }}
                    </a>
                    <a href="{{ route('register') }}" wire:navigate class="px-4 py-2 bg-zinc-900 text-white rounded-md hover:bg-zinc-800 transition text-center">
                        {{ __('Регистрация') }}
                    </a>
                </div>
            @endauth
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            @auth
                <flux:dropdown position="top" align="end">
                    <flux:profile
                        :initials="auth()->user()->initials()"
                        icon-trailing="chevron-down"
                    />

                    <flux:menu>
                        <flux:menu.radio.group>
                            <div class="p-0 text-sm font-normal">
                                <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                    <flux:avatar
                                        :name="auth()->user()->name"
                                        :initials="auth()->user()->initials()"
                                    />

                                    <div class="grid flex-1 text-start text-sm leading-tight">
                                        <flux:heading class="truncate">{{ auth()->user()->name }}</flux:heading>
                                        <flux:text class="truncate">{{ auth()->user()->email }}</flux:text>
                                    </div>
                                </div>
                            </div>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <flux:menu.radio.group>
                            <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>
                                {{ __('Settings') }}
                            </flux:menu.item>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <flux:menu.item
                                as="button"
                                type="submit"
                                icon="arrow-right-start-on-rectangle"
                                class="w-full cursor-pointer"
                                data-test="logout-button"
                            >
                                {{ __('Log out') }}
                            </flux:menu.item>
                        </form>
                    </flux:menu>
                </flux:dropdown>
            @else
                <div class="flex gap-2 px-4">
                    <a href="{{ route('login') }}" wire:navigate class="px-4 py-2 border border-zinc-300 rounded-md text-zinc-900 hover:bg-zinc-100 transition">
                        {{ __('Вход') }}
                    </a>
                    <a href="{{ route('register') }}" wire:navigate class="px-4 py-2 bg-zinc-900 text-white rounded-md hover:bg-zinc-800 transition">
                        {{ __('Регистрация') }}
                    </a>
                </div>
            @endauth
        </flux:header>

        {{ $slot }}

        @persist('toast')
            <flux:toast.group>
                <flux:toast />
            </flux:toast.group>
        @endpersist

        @fluxScripts
    </body>
</html>
