@props(['name'])
<label for="{{$name}}"
       class="block mb-2 uppercase font-bold text-xs text-gry-700"
>

    {{ucwords($name)}}
</label>
