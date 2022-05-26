<select
    {{ $attributes->merge([
        'class' => 'form-select rounded-pill w-25',
        'style' => $attributes->prepends('cursor: pointer;')
    ]) }}
    name="category_id"
    id="category_id"
>
    @if($currentCategory ?? false)
        <option
            value="all"
            {{ (strcmp($currentCategory, 'all') == 0) ? 'selected' : '' }}
        >
            All categories
        </option>
    @endif
    @foreach ($categories as $category)
        <option
            value="{{ $category->id }}"
            {{ ($currentCategory == $category->id) ? 'selected' : '' }}
        >
            {{ ucfirst($category->name) }}
        </option>
    @endforeach
</select>
