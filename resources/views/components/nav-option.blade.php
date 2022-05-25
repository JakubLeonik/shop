@props(['link' => '#'])
<div
    {{ $attributes->merge([
        'class' => 'px-5 py-4 h-100 d-flex justify-content-center align-items-center',
        'style' => $attributes->prepends('font-size: 150%; cursor: pointer;')
    ]) }}
    onclick="window.location.href = '{{ $link }}'"
>
    {{ $slot }}
</div>
