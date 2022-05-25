<x-simple-layout>
    <x-center-pane>
        <h1>Reset password</h1>
        <x-form
            method="POST"
            action="{{ route('password.update') }}"
            submit-text="Reset Password"
            class="w-100"
            :fields="[
                ['type' => 'email', 'name' => 'email'],
                ['type' => 'password', 'name' => 'password'],
                ['type' => 'password', 'name' => 'password_confirmation'],
                ['type' => 'hidden', 'name' => 'token', 'value' => $request->route('token')]
            ]"
        />
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
    </x-center-pane>
</x-simple-layout>
