@props(['errors'])

@if ($errors->any())
    <div style="color: red;">
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    </div>
@endif
