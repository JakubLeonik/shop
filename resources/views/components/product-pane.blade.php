@props(['products', 'paginate' => true])
<div class="d-flex flex-wrap justify-content-center py-3">
    @foreach($products as $product)
        <x-product-card
            class="m-3"
            :product="$product"
        />
    @endforeach
    @if($paginate ?? false)
        <x-paginator-links :object="$products"/>
    @endif
</div>
