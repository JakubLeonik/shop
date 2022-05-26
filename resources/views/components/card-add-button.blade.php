@props(['product'])
<form
    id="{{ 'buyProduct'.$product->id.'Form' }}"
    class="d-none"
    method="POST"
    action="{{ route('card.store', ['product' => $product->id]) }}"
>
    @csrf
</form>
<a
    style="cursor: pointer;"
    class="mx-auto"
    onclick="document.getElementById('{{ 'buyProduct'.$product->id.'Form' }}').submit()"
>
    Add to card
</a>
