<x-layout>
    <x-pane class="mx-auto text-center my-3">
        <span class="fw-bold w-100 text-center">
            <span
                class="w-100 text-center"
                style="font-size: 300%;"
            >
                {{ $product->title }}
            </span> <br>
            {{ $product->price }}$ <br>
            Created by {{ $product->user->name }} in category {{ $product->category->name }} at {{ date_format( $product->created_at, 'j F Y') }} <br>
            {{ $product->quantity }} items left
        </span>
        <hr>
        {{$product->description}}
        <hr>
        <x-card-add-button :product="$product" />
        <x-errors />
        <hr>
        <a href="{{ route('products.browse') }}">
            Go to all products
        </a>
    </x-pane>
</x-layout>
