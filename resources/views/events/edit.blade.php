<x-layout>
    <x-slot:title>
        Update event
    </x-slot>
    <h1>Update event "{{$event->title}}"</h1>

    <form method="post" action="{{route('events.update', $event)}}">
        @method('put')
        @csrf
        <div style="display:flex; justify-content: space-between;">
            <div>
                <span>Title</span><br>
                <input name="title" type="text" value="{{old('title') ?? $event->title}}"  /><br>
                @error('title')
                   {{ $message }}
                @endif
            </div>
            <div>
                <span>Category</span><br>
                <select name="category_id">
                   <option value="" disabled >Choose</option>
                    @foreach ($categories as $category)
                        <option label="{{$category->title}}" value="{{$category->id}}"  {{ $category->id==(old('category_id')??$event->category_id)?'selected':''}} />
                    @endforeach
                    <option label="Non existent category" value="999" />
                </select>
                @error('category_id')
                   {{ $message }}
                @endif
            </div>
            <div>
                <span>Begins at</span><br>
                <input name="begin_datetime"  type="datetime-local" value="{{old('begin_datetime') ?? $event->begin_datetime}}"   /><br>
                @error('begin_datetime')
                   {{ $message }}
                @endif
            </div>
            <div>
                <span>Duration, h</span><br>
                <input name="duration" type="number" value="{{old('duration') ?? $event->duration }}"  /><br>
                @error('duration')
                   {{ $message }}
                @endif
            </div>
             <div>
                <span>Formal</span><br>
                <input type="checkbox" name="formal" value="1" {{ old('formal')||$event->formal ? 'checked' : '' }}  /><br>
            </div>
            <input type="submit" />
        </div>

    </form>

</x-layout>
