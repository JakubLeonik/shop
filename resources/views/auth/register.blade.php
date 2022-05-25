<x-simple-layout>
    <x-center-pane>
        <h1>
            Register
        </h1>
        <x-auth-session-status :status="session('status')" />
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <x-form
            :fields="[
                ['type' => 'text', 'name' => 'name'],
                ['type' => 'email', 'name' => 'email'],
                ['type' => 'password', 'name' => 'password'],
                ['type' => 'password', 'name' => 'password_confirmation'],
            ]"
            class="w-100"
            submit-text="Register"
            method="POST"
            action="{{ route('register') }}"

        >
        </x-form>
        <a href="{{ route('login') }}">
            Already registered?
        </a>
        <a href="{{ route('shop.index') }}">Go back</a>
    </x-center-pane>
</x-simple-layout>
