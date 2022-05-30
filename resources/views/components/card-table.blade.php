<x-table
    {{ $attributes }}
    object-name="products"
    :columns="['#', 'Product', 'Price', 'Quantity', 'Total price', 'Action']"
    :show="!empty($products)"
>
    @foreach($products as $product)
        <tr class="border">
            <th class="p-3 text-center" scope="row">
                {{ $loop->index+1 }}
            </th>
            <td class="p-3 text-center">
                <a
                    href="{{ route('products.show', ['product' => $product->id]) }}"
                >
                    {{ $product->title }}
                </a>
            </td>
            <td class="p-3 text-center">
                {{ $product->price }}$
            </td>
            <td class="p-3 text-center">
                {{ $product->quantity_in_card }}
            </td>
            <td class="p-3 text-center border">
                {{ number_format($partlyTotalPirce($product), 2, ',', ' ') }}$
            </td>
            <td class="p-3 text-center">
                <form
                    id={{"deleteFromCard".$product->id."Form"}}
                    class="d-none"
                    action="{{ route('card.delete', ['product' => $product->id]) }}"
                    method="POST"
                >
                    @csrf
                    @method('DELETE')
                </form>
                <a
                    style="cursor: pointer; text-decoration: underline;"
                    onclick="document.getElementById('{{'deleteFromCard'.$product->id.'Form'}}').submit()"
                >
                    Delete from card
                </a>
            </td>
        </tr>
    @endforeach
    <tr>
        <th class="p-3 text-end" colspan="4" scope="row">
            Total price:
        </th>
        <th class="p-3 text-center border" scope="row">
            {{ number_format($card->totalPrice(), 2, ',', ' ') }}$
        </th>
        <td class="p-3 text-center">
            <form
                method="POST"
                action="{{ route('card.truncate') }}"
                id="clearCard"
                class="d-none"
            >
                @csrf
                @method('DELETE')
            </form>
            <span
                style="cursor: pointer; text-decoration: underline;"
                onclick="document.getElementById('clearCard').submit()"
            >
                Clear card
            </span>
        </td>
    </tr>
</x-table>




{{--@if($products ?? false)--}}
{{--    <table--}}
{{--        {{ $attributes->merge(['class' => 'border w-75 mx-auto']) }}--}}
{{--    >--}}
{{--        <thead>--}}
{{--        <tr class="border">--}}
{{--            <th class="p-3 text-center" scope="col">--}}
{{--                #--}}
{{--            </th>--}}
{{--            <th class="p-3 text-center" scope="col">--}}
{{--                Product--}}
{{--            </th>--}}
{{--            <th class="p-3 text-center" scope="col">--}}
{{--                Price--}}
{{--            </th><th class="p-3 text-center" scope="col">--}}
{{--                Quantity--}}
{{--            </th>--}}
{{--            <th class="p-3 text-center" scope="col">--}}
{{--                Total price--}}
{{--            </th>--}}
{{--            <th class="p-3 text-center" scope="col">--}}
{{--                Action--}}
{{--            </th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($products as $product)--}}
{{--            <tr class="border">--}}
{{--                <th class="p-3 text-center" scope="row">--}}
{{--                    {{ $loop->index+1 }}--}}
{{--                </th>--}}
{{--                <td class="p-3 text-center">--}}
{{--                    <a--}}
{{--                        href="{{ route('products.show', ['product' => $product->id]) }}"--}}
{{--                    >--}}
{{--                        {{ $product->title }}--}}
{{--                    </a>--}}
{{--                </td>--}}
{{--                <td class="p-3 text-center">--}}
{{--                    {{ $product->price }}$--}}
{{--                </td>--}}
{{--                <td class="p-3 text-center">--}}
{{--                    {{ $product->quantity_in_card }}--}}
{{--                </td>--}}
{{--                <td class="p-3 text-center border">--}}
{{--                    {{ number_format($partlyTotalPirce($product), 2, ',', ' ') }}$--}}
{{--                </td>--}}
{{--                <td class="p-3 text-center">--}}
{{--                    <form--}}
{{--                        id={{"deleteFromCard".$product->id."Form"}}--}}
{{--                    class="d-none"--}}
{{--                        action="{{ route('card.delete', ['product' => $product->id]) }}"--}}
{{--                        method="POST"--}}
{{--                    >--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                    </form>--}}
{{--                    <a--}}
{{--                        style="cursor: pointer; text-decoration: underline;"--}}
{{--                        onclick="document.getElementById('{{'deleteFromCard'.$product->id.'Form'}}').submit()"--}}
{{--                    >--}}
{{--                        Delete from card--}}
{{--                    </a>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        <tr>--}}
{{--            <th class="p-3 text-end" colspan="4" scope="row">--}}
{{--                Total price:--}}
{{--            </th>--}}
{{--            <th class="p-3 text-center border" scope="row">--}}
{{--                {{ number_format($card->totalPrice(), 2, ',', ' ') }}$--}}
{{--            </th>--}}
{{--            <td class="p-3 text-center">--}}
{{--                <form--}}
{{--                    method="POST"--}}
{{--                    action="{{ route('card.truncate') }}"--}}
{{--                    id="clearCard"--}}
{{--                    class="d-none"--}}
{{--                >--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                </form>--}}
{{--                <span--}}
{{--                    style="cursor: pointer; text-decoration: underline;"--}}
{{--                    onclick="document.getElementById('clearCard').submit()"--}}
{{--                >--}}
{{--                Clear card--}}
{{--            </span>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--        </tbody>--}}
{{--    </table>--}}
{{--@else--}}
{{--    <span class="mx-auto">--}}
{{--        No products yet--}}
{{--    </span>--}}
{{--@endif--}}
