@props(['products'])
<div class="d-flex flex-wrap justify-content-center py-3">
    @foreach($products as $product)
        <x-product-card class="m-3" :product="$product" />
    @endforeach
    <div class="mt-3">
        {{ $products->appends(request()->input())->links('pagination/bootstrap-5') }}
    </div>
</div>
