@props(['object_name' => 'object', 'columns' => [], 'show' => true])
@if($show)
    <table
        {{ $attributes->merge(['class' => 'border w-75 mx-auto']) }}
    >
        <thead>
            <tr class="border">
                @foreach($columns as $column)
                    @if($column ?? false)
                        <th class="p-3 text-center" scope="col">
                            {{ $column }}
                        </th>
                    @endif
                @endforeach
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
@else
    <span class="mx-auto">
        No {{ $object_name }} yet
    </span>
@endif
