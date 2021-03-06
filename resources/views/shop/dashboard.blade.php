<x-simple-layout>
    <x-center-pane>
        <h1>
            Dashboard
        </h1>
        You are logged in!
        <a href="{{ route('products.index') }}">
            My products
        </a>
        <a href="{{ route('card.index') }}">
            Shopping card
        </a>
        <a href="{{ route('orders.index') }}">
            My orders
        </a>
        <x-log-out-link style="cursor: pointer; text-decoration: underline;" />
        <a href="{{ route('shop.index') }}">
            Main page
        </a>
    </x-center-pane>
</x-simple-layout>
