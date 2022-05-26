@props(['product'])
<x-pane {{ $attributes }}>
    <div
        role="button"
        onclick="window.location.href = '{{ route('products.show', ['product' => $product->id]) }}'"
        class="w-100 mx-auto"
    >
        <span class="d-block fw-bold text-center">
            <span style="font-size: 150%;">
                {{ $product->title }}
            </span>
            <br>
            {{ $product->price }}$ | {{ $product->category->name }}
        </span>
        <hr>
            {{ substr($product->description, 0, 100) }}...
        <hr>
    </div>
    <x-card-add-button :product="$product" />
</x-pane>
