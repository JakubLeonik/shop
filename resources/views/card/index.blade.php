<x-simple-layout>
    <h1 class="mx-auto">
        Shopping card
    </h1>
    <x-card-table
        class="mx-auto my-3"
        :productsJSON="$card->products"
    />
    <a
        class="mx-auto mt-3"
        href="{{ route('shop.dashboard') }}"
    >
        Go back
    </a>
</x-simple-layout>
