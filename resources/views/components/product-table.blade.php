@props(['products' => []])
<table
    {{ $attributes->merge(['class' => 'border w-75 mx-auto']) }}
>
    <thead>
        <tr class="border">
            <th class="p-3 text-center" scope="col">
                #
            </th>
            <th class="p-3 text-center" scope="col">
                Title
            </th>
            <th class="p-3 text-center" scope="col">
                Created at
            </th>
            <th class="p-3 text-center" scope="col">
                Price
            </th><th class="p-3 text-center" scope="col">
                Quantity
            </th>
            <th class="p-3 text-center" scope="col">
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr class="border">
                <th class="p-3 text-center" scope="row">
                    {{ (($products->currentPage()-1) * $products->perPage()) + ($loop->index+1) }}
                </th>
                <td class="p-3 text-center">
                    <a href="{{ route('products.show', ['product' => $product->id]) }}">
                        {{ $product->title }}
                    </a>
                </td>
                <td class="p-3 text-center">
                    {{ date_format($product->created_at, 'j F Y') }}
                </td>
                <td class="p-3 text-center">
                    {{ $product->price }}$
                </td>
                <td class="p-3 text-center">
                    {{ $product->quantity }}
                </td>
                <td class="p-3 text-center d-flex flex-row justify-content-around">
                    <form
                        id="deleteForm"
                        class="d-none"
                        method="POST"
                        action="{{ route('products.delete', ['product' => $product]) }}"
                    >
                        @csrf
                        @method('DELETE')
                    </form>
                    <span
                        style="cursor: pointer; text-decoration: underline;"
                        onclick="document.getElementById('deleteForm').submit();"
                    >
                        Delete
                    </span>
                    <a href="{{ route('products.edit', ['product' => $product]) }}">
                        Edit
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<x-paginator-links
    class="mx-auto"
    :object="$products"
/>
