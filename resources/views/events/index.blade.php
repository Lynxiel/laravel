<x-layout>
    <x-slot:title>
        Events
    </x-slot>
    <h1>Events</h1>

    @foreach ($categories as $category)
        <span>{{ $category->title }}<span>
    @endforeach
    <hr>
    <a href="{{route('events.create')}}">Create event</a>
    @foreach ($events as $event)
        <p> [ {{$event->category->title}} ] {{ $event->title }}
            starts at {{$event->begin_datetime }}
            lasts {{$event->duration}} {{Str::plural('hour', $event->duration)}}
            {{$event->formal?'need to look good!':''  }}
        </p>
        <div style="display: flex;gap:20px;">
            <a href="{{route('events.show', $event)}}">Show</a>
            <a href="{{route('events.edit', $event)}}">Edit</a>
            <form action="{{ route('events.destroy', $event) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete event</button>
            </form>
        </div>
    @endforeach
</x-layout>
