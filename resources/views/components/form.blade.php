@props([
        'fields' => [],
        'standardClass' => true,
        'csrf' => true
])

<form
    {{ $attributes->except(
        ['submit-text',
         'class',
         'standard-class'
    ]) }}
    @class([
        $attributes['class'].' w-50 gap-3 p-4 d-flex flex-column justify-content-center align-items-center' => $standardClass,
        $attributes['class'] => !$standardClass
    ])
>
    @if($csrf ?? false)
        @csrf
    @endif
    @foreach($fields as $field)
        <input
            class="form-control w-50 rounded-pill"
            type="{{ $field['type'] }}"
            name="{{ $field['name'] }}"
            id="{{ $field['name'] }}"
            placeholder="{{ ucfirst(preg_replace('/_+/', ' ', $field['name'])) }}"
            value="{{ isset($field['value']) ? $field['value'] : old($field['name']) }}"
            required/>
    @endforeach

    {{ $slot }}

    <input
        class="form-control w-50 rounded-pill"
        type="submit"
        value="{{ $attributes['submit-text'] }}"/>
</form>
