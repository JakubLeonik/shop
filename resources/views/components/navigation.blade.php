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
            :csrf="false"
        >
            <x-category-select
                :current-category="request('category')"
            />
        </x-form>
    </div>
    <div class="d-flex flex-row h-100 w-25">
        @auth
            <x-nav-option
                class="w-50"
                link="{{ route('shop.dashboard') }}"
            >
                Dashboard
            </x-nav-option>
            <x-nav-option class="w-50">
                <x-log-out-link />
            </x-nav-option>
        @else
            <x-nav-option
                class="w-50"
                link="{{ route('login') }}"
            >
                Log in
            </x-nav-option>
            <x-nav-option
                class="w-50"
                link="{{ route('register') }}"
            >
                Register
            </x-nav-option>
        @endif
    </div>
</nav>
