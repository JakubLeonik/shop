<form
    id="logoutForm"
    class="d-none"
    method="POST"
    action="{{ route('logout') }}"
>
    @csrf
    <input
        type="submit"
        value="Logout"
    >
</form>
<div
    {{ $attributes }}
    onclick="document.getElementById('logoutForm').submit()"
>
    Log out
</div>
