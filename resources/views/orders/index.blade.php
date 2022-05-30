<x-simple-layout>
    <h1 class="mx-auto my-5">
        My orders
    </h1>
    <x-table
        :columns="['#', 'Id', 'Status', 'Price']"
        object-name="orders"
        :show="!$orders->isEmpty()"
    >
        @foreach($orders as $order)
            <tr class="border">
                <th class="p-3 text-center" scope="row">
                    {{ $loop->index+1 }}
                </th>
                <td class="p-3 text-center">
                    order{{ $order->id }}
                </td>
                <td class="p-3 text-center">
                    @if($order->status == 'bought')
                        Waiting for payment (
                        <a href="{{route('orders.payment', ['order' => $order])}}">
                            Pay
                        </a>)
                    @else
                        {{ $order->status }}
                    @endif
                </td>
                <td class="p-3 text-center">
                    {{ $order->totalPrice }}$
                </td>
            </tr>
        @endforeach
    </x-table>
    <x-errors
        class="w-100 text-center my-3"
        :errors="$errors"
    />
    <x-session-status
        :status="session('orderStatus')"
        class="mx-auto my-3"
    />
    <a
        class="mx-auto my-3"
        href="{{ route('shop.dashboard') }}"
    >
        Go back
    </a>
</x-simple-layout>
