<x-simple-layout>
    <x-center-pane>
        <h1>
            Login page
        </h1>
        <x-errors :errors="$errors" />
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
        </x-form>
        <a href="{{ route('password.request') }}">
            Forgot your password?
        </a>
        <a href="{{ route('login.external', ['provider' => 'google']) }}">
            Log in by Google
        </a>
        <a href="{{ route('login.external', ['provider' => 'github']) }}">
            Log in by GitHub
        </a>
        <a href="{{ route('shop.index') }}">
            Go back
        </a>
    </x-center-pane>
</x-simple-layout>
