@props([
    'sidebar' => false,
])

@if($sidebar)
    <a href="{{ route('home') }}" {{ $attributes->merge(['class' => 'flex items-center gap-2 px-3 py-2 text-zinc-900 hover:text-zinc-700']) }} wire:navigate>
        <span class="flex aspect-square size-8 items-center justify-center">
            <span class="text-xl">☂️</span>
        </span>
        <span class="text-lg font-semibold text-zinc-900">Погоды</span>
    </a>
@else
    <a href="{{ route('home') }}" {{ $attributes->merge(['class' => 'flex items-center gap-2 text-zinc-900 hover:text-zinc-700']) }} wire:navigate>
        <span class="flex aspect-square size-8 items-center justify-center">
            <span class="text-xl">☂️</span>
        </span>
        <span class="text-lg font-semibold text-zinc-900">Погоды</span>
    </a>
@endif
