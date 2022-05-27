<x-simple-layout>
    <x-center-pane>
        <h1>
            Delivery data
        </h1>
        <x-form
            id="payment-form"
            class="w-75"
            method="POST"
            action="{{ route('orders.store') }}"
            submit-text="Next"
            :fields="[
                ['type' => 'text', 'name' => 'card_holder_name'],
                ['type' => 'text', 'name' => 'delivery_address'],
                ['type' => 'text', 'name' => 'city_or_town_name'],
                ['type' => 'text', 'name' => 'zip_code'],
            ]"
        >
            <span class="fw-bold">
                Total price to pay: {{ $card->totalPrice() }}$
            </span>
        </x-form>
    </x-center-pane>
</x-simple-layout>
