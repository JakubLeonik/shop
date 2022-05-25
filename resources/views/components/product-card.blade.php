@props(['product'])
<x-pane
    {{ $attributes }}
    role="button"
    onclick="window.location.href = '{{ route('products.show', ['product' => $product->id]) }}'"
>
    <span class="fw-bold w-100 text-center">
        <span class="w-100 text-center" style="font-size: 150%;">
            {{ $product->title }}
        </span> <br>
        {{ $product->price }}$ | {{ $product->category->name }}
    </span>
    <hr>
    {{$product->description}}
</x-pane>
