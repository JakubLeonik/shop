<x-layout>
    <h1 class="mx-auto my-3">
        Recently added:
    </h1>
    <x-product-pane :paginate="false" :products="$products" />
    <a
        class="mx-auto my-3"
        href="{{ route('products.browse') }}"
    >
        All products
    </a>
</x-layout>
