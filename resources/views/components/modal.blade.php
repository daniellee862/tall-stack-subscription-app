@props(['trigger'])

<div
    class="flex fixed top-0  bg-gray-500 backdrop-filter backdrop-blur-sm bg-opacity-40 items-center w-full h-full"
    x-show="{{$trigger}}"
    x-on:click.self="{{$trigger}} = false"
    x-on:keydown.escape.window="{{$trigger}} = false"
>
    <div {{ $attributes->merge(['class' => 'm-auto bg-gray-200 shadow-2xl rounded-xl p-8' ]) }} >
        {{$slot}}
    </div>
</div>