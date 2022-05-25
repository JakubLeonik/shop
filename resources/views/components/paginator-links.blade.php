@props(['object'])
<div
    {{ $attributes->merge(['class' => 'mt-3']) }}
>
    {{ $object->appends(request()->input())->links('pagination/bootstrap-5') }}
</div>
