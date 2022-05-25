<x-layout>
    <x-pane class="mx-auto text-center mt-3">
        <span class="fw-bold w-100 text-center">
            <span
                class="w-100 text-center"
                style="font-size: 300%;"
            >
                {{ $product->title }}
            </span> <br>
            {{ $product->price }}$ <br>
            Created by {{ $product->user->name }} in category {{ $product->category->name }} at {{ date_format( $product->created_at, 'j F Y') }}
        </span>
        <hr>
        {{$product->description}}

        <a href="{{ route('products.index') }}">
            Go to all products
        </a>
    </x-pane>
</x-layout>
