<x-layout>
    <x-center-pane>
        <div class="d-flex flex-column justify-content-center align-items-center w-75 mx-auto gap-3 p-3">
            <h1>Reset password</h1>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <input class="form-control" type="email" name="email" id="email" placeholder="Email" required autofocus /> <br>
                <input class="form-control" type="password" name="password" id="password" placeholder="New password" required /> <br>
                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm new password" required /> <br>
                <x-button type="submit">
                    Reset Password
                </x-button>
            </form>
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
        </div>
    </x-center-pane>
</x-layout>
