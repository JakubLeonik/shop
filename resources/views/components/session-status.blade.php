@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['style' => 'color: green;']) }}>
        {{ $status }}
    </div>
@endif
