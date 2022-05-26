<x-simple-layout>
    <header
        class="display-1 w-100 text-center py-4"
        style="cursor: pointer;"
        onclick="window.location.href = '{{ route('shop.index') }}'"
    >
        Shop
    </header>
    <x-navigation />
    {{ $slot }}
    <x-footer />
</x-simple-layout>
