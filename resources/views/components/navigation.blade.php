<nav
    class="w-100 d-flex flex-row justify-content-between align-items-center"
    style="background-color: #404040;"
>
    <div class="d-flex flex-row h-100 w-75 ps-4">
        <x-form
            :fields="[
                    ['type' => 'text', 'name' => 'search', 'value' => request('search')]
                ]"
            submit-text="Search"
            :standardClass="false"
            class="d-flex flex-row gap-3 w-75 h-100"
            action="{{ route('products.browse') }}"
            method="GET"
            csrf="no"
        >
            <x-category-select
                :categories="$categories"
                :current-category="request('category')"
            />
        </x-form>
    </div>
    <div class="d-flex flex-row h-100 w-25">
        @auth
            <x-nav-option link="{{ route('shop.dashboard') }}">
                Dashboard
            </x-nav-option>
            <x-nav-option>
                <form id="logoutForm" class="d-none" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <input type="submit" value="Logout">
                </form>
                <span onclick="document.getElementById('logoutForm').submit()">
                    Log out
                </span>
            </x-nav-option>
        @else
            <x-nav-option link="{{ route('login') }}">
                Log in
            </x-nav-option>
            <x-nav-option link="{{ route('register') }}">
                Register
            </x-nav-option>
        @endif
    </div>
</nav>
