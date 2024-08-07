<x-layout>
    <x-slot:title>
        Create event
    </x-slot>
    <h1>Create event</h1>

    <form method="post" action="{{route('events.store')}}">
        @method('post')
        @csrf
        <div style="display:flex; justify-content: space-between;">
            <div>
                <span>Title</span><br>
                <input name="title" type="text" value="{{old('title')}}"  /><br>
                @error('title')
                   {{ $message }}
                @endif
            </div>
            <div>
                <x-select name="category_id" model="Category" display="title" value="id"  multiple />
                @error('category_id')
                   {{ $message }}
                @endif
            </div>
            <div>
                <span>Begins at</span><br>
                <input name="begin_datetime"  type="datetime-local" value="{{old('begin_datetime')}}"   /><br>
                @error('begin_datetime')
                   {{ $message }}
                @endif
            </div>
            <div>
                <span>Duration, h</span><br>
                <input name="duration" type="number" value="{{old('duration')}}"  /><br>
                @error('duration')
                   {{ $message }}
                @endif
            </div>
             <div>
                <span>Formal</span><br>
                {{old('formal')}}
                <input type="checkbox" name="formal" value="1" {{ old('formal') ? 'checked' : '' }}  /><br>
            </div>
            <input type="submit" />
        </div>

    </form>

</x-layout>
