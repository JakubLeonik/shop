<x-layout>
        This is a secure area of the application. Please confirm your password before continuing. <br>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <input type="password" name="password" id="password" placeholder="Password" required />
            <x-button type="submit">
                Confirm
            </x-button>
        </form>
</x-layout>
