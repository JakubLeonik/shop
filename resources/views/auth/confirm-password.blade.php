<x-simple-layout>
    <x-center-pane class="text-center">
        This is a secure area of the application. Please confirm your password before continuing.
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <x-form
            method="POST"
            action="{{ route('password.confirm') }}"
            submit-text="Confirm"
            class="w-100"
            :fields="[
                ['type' => 'password', 'name' => 'password']
            ]"
        />
    </x-center-pane>
</x-simple-layout>
