<x-simple-layout>
        <h1 class="mx-auto">
            Shopping card
        </h1>
        <x-card-table
            class="mx-auto my-3"
            :productsJSON="$card->products"
        />
</x-simple-layout>
