<x-simple-layout>
    <h1 class="mx-auto">
        Shopping card
    </h1>
    <x-card-table
        class="mx-auto my-3"
        :card="$card"
        :productsJSON="$card->products"
    />
    @if($card->products != '')
        <a
            class="mx-auto"
            href="{{ route('orders.create') }}"
        >
            Submit order
        </a>
    @endif
    <x-errors
        class="mw-100 text-center my-3"
        :errors="$errors"
    />
    <a
        class="mx-auto mb-5"
        href="{{ route('shop.dashboard') }}"
    >
        Go back
    </a>
    <x-footer />
</x-simple-layout>
