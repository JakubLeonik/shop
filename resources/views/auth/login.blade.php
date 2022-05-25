<x-simple-layout>
    <x-pane class="mx-auto my-3 p-5 d-flex flex-column justify-content-center align-items-center gap-3">
        <h1>
            Login page
        </h1>
        <x-auth-validation-errors :errors="$errors" />
        <x-form
            :fields="[
                ['type' => 'email', 'name' => 'email'],
                ['type' => 'password', 'name' => 'password']
            ]"
            class="w-100"
            submit-text="Login"
            method="POST"
            action="{{ route('login') }}"
        >
            <label for="remember_me">
                <input type="checkbox" name="remember" id="remember_me">
                Remember me
            </label>
            <a href="{{ route('password.request') }}">
                Forgot your password?
            </a>
            <a href="{{ route('login.external', ['provider' => 'google']) }}">
                Log in by Google
            </a>
            <a href="{{ route('login.external', ['provider' => 'github']) }}">
                Log in by GitHub
            </a>
        </x-form>
        <a href="{{ route('shop.index') }}">Go back</a>
    </x-pane>
</x-simple-layout>
