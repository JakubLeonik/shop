<x-simple-layout>
    <h1 class="mx-auto">
        My products
    </h1>
    <a class="mx-auto" href="{{ route('products.create') }}">
        Add new product
    </a>
    <x-product-table
        class="mt-3"
        :products="$products"
    />
    <a
        class="mx-auto"
        href="{{ route('shop.dashboard') }}"
    >
        Go back to dashboard
    </a>
</x-simple-layout>
