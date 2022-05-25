<x-simple-layout>
    <x-center-pane>
        <h1>
            Add new product
        </h1>
        <x-auth-validation-errors :errors="$errors" />
        <x-form
            method="POST"
            action="{{ route('products.store') }}"
            submit-text="Add product"
            class="w-100"
            :fields="[
                ['type' => 'text', 'name' => 'title'],
                ['type' => 'text', 'name' => 'description'],
                ['type' => 'number', 'name' => 'price'],
                ['type' => 'number', 'name' => 'quantity'],
            ]">
            <x-category-select :current-category="null"/>
        </x-form>
        <a href="{{ route('products.index') }}">
            Go back
        </a>
    </x-center-pane>
</x-simple-layout>
