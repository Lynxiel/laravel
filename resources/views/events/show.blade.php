<x-layout>
    <x-slot:title>
        Show event
    </x-slot>
    <h1>{{$event->title}}</h1>
    <hr>
    <a href="{{route('events.index')}}">Back</a>
    <a href="{{route('events.edit', $event)}}">Edit</a>
    <hr>
    <p>{{ $event->title }}
        starts at {{$event->begin_datetime }}
        lasts {{$event->duration}} {{Str::plural('hour', $event->duration)}}
        {{$event->formal?'need to look good!':''  }}
    </p>
</x-layout>
