<x-layout>
    <x-center-pane>
        <div class="d-flex flex-column justify-content-center align-items-center w-75 mx-auto gap-3 p-3">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
            <form method="POST" action="{{ route('password.email') }}">
            @csrf
                <input class="form-control" type="email" name="email" id="email" placeholder="Email" required> <br>
                <x-button type="submit">
                    Email Password Reset Link
                </x-button>
            </form>
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
        </div>
    </x-center-pane>
</x-layout>
