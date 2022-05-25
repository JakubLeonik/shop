<div
    {{ $attributes->merge([
    'class' => 'p-5 rounded-pill d-flex flex-column',
    'style' => 'background-color: #404040; width: 45%;'
    ]) }}
>
    {{ $slot }}
</div>
