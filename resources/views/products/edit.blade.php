<x-simple-layout>
    <x-center-pane>
        <h1>
            Edit product
        </h1>
        <x-errors :errors="$errors" />
        <x-form
            method="POST"
            action="{{ route('products.update', ['product' => $product->id]) }}"
            submit-text="Edit product"
            class="w-100"
            :fields="[
                ['type' => 'text', 'name' => 'title', 'value' => old('price', $product->title)],
                ['type' => 'text', 'name' => 'description', 'value' => old('price', $product->description)],
                ['type' => 'number', 'name' => 'quantity', 'value' => old('quantity', $product->quantity)],
                ['type' => 'number', 'name' => 'price', 'value' => old('price', $product->price)],
            ]"
        >
            <x-category-select :current-category="$product->category->id"/>
        </x-form>
        <a href="{{ route('products.index') }}">
            Go back
        </a>
    </x-center-pane>
</x-simple-layout>
