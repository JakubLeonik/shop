@props(['categories' => [], 'currentCategory' => null])
<select
    {{ $attributes->merge(['class' => 'form-select rounded-pill w-25']) }}
    name="category"
    id="category"
>
    <option
        value="all"
        {{ (strcmp($currentCategory, 'all') == 0) ? 'selected' : '' }}
    >
        All categories
    </option>
    @foreach ($categories as $category)
        <option
            value="{{ $category->id }}"
            {{ ($currentCategory == $category->id) ? 'selected' : '' }}
        >
            {{ ucfirst($category->name) }}
        </option>
    @endforeach
</select>
