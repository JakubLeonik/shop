<button {{ $attributes->merge([
    'class' => 'd-block w-50 btn btn-primary border-dark text-dark rounded-pill w-50',
    'style' => 'background-color: #efefef;'
    ]) }}>
    {{ $slot }}
</button>
