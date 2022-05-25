<x-simple-layout>
    <x-center-pane class="text-center">
        Forgot your password? No problem. <br>
        Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
        <x-form
            method="POST"
            action="{{ route('password.email') }}"
            submit-text="Email Password Reset Link"
            class="w-100"
            :fields="[
                ['type' => 'email', 'name' => 'email']
            ]"
        />
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <a href="{{ route('shop.index') }}">
            Main page
        </a>
    </x-center-pane>
</x-simple-layout>
