@props(['link' => '#'])
<div
    class="px-5 py-4 h-100 d-flex justify-content-center align-items-center"
    style="font-size: 150%; cursor: pointer;"
    onclick="window.location.href = '{{ $link }}'"
>
    {{ $slot }}
</div>
