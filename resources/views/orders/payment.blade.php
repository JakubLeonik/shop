<x-simple-layout>
    <x-center-pane>
        <h1>
            Payment
        </h1>
        <x-form
            id="payment-form"
            class="w-75"
            method="POST"
            action="{{ route('orders.process-payment', ['order' => $order]) }}"
            submit-text="Pay"
            :fields="[
                ['type' => 'text', 'name' => 'card_holder_name'],
                ['type' => 'hidden', 'name' => 'orders', 'value' => $order->id]
            ]"
        >
            <div
                style="color: #DDD"
                class="form-control rounded-pill py-2 px-3"
                id="card-element"
            ></div>
            <span class="fw-bold">
                Total price to pay: {{ $order->totalPrice }}$
            </span>
            <x-errors :errors="$errors" />
            <p id="card-error" role="alert"></p>
        </x-form>
        <a href="{{route('orders.index')}}">
            Pay later
        </a>

        {{--Scripts--}}
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            var stripe = Stripe('{{ env("STRIPE_KEY") }}');
            var elements = stripe.elements();
            var card = elements.create('card');
            card.mount('#card-element');

            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                oneTimeCharge();
            });

            function oneTimeCharge(){
                var carHolderName = document.getElementById('card_holder_name').value;
                stripe.createPaymentMethod(
                    'card', card, {
                        billing_details: {
                            'name': carHolderName
                        }
                    }
                ).then(function(result) {
                    if (result.error) {
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        submitFormWithValue("paymentMethod", result.paymentMethod.id);
                    }
                });
            }
            function submitFormWithValue($key, $value) {
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', $key);
                hiddenInput.setAttribute('value', $value);
                form.appendChild(hiddenInput);
                form.submit();
            }
        </script>
    </x-center-pane>
</x-simple-layout>
