<x-simple-layout>
    <x-center-pane class="text-center">
        Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
        <form
            id="verificationMailForm"
            method="POST"
            action="{{ route('verification.send') }}">
            @csrf
        </form>
        <span
            style="cursor: pointer; text-decoration: underline;"
            onclick="document.getElementById('verificationMailForm').submit()"
        >
            Send verification email again
        </span>
        <x-log-out-link style="cursor: pointer; text-decoration: underline;"/>
        @if (session('status') == 'verification-link-sent')
            A new verification link has been sent to the email address you provided during registration.
        @endif
    </x-center-pane>
</x-simple-layout>
