<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $events =  Event::with('categories')->get();
                return view('events/index', compact('events', ));
    }

    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        return view('events/create');
    }

    /**
    * Store a newly created resource in storage.
    */
    public function store(StoreEventRequest $request)
    {
        $validated = $request->validated();
        $event  = Event::create([
            'title' => $validated['title'],
            'begin_datetime' => $validated['begin_datetime'],
            'duration' => $validated['duration'],
            'formal' => $validated['formal']??false,
        ]);

        $event->categories()->sync($validated['category_id']);
        return to_route('events.index');
    }

    /**
    * Display the specified resource.
    */
    public function show(Event $event)
    {
        return view('events.show' , compact('event'));
    }

    /**
    * Show the form for editing the specified resource.
    */
    public function edit(Event $event)
    {
          return view('events.edit' , compact('event'));
    }

    /**
    * Update the specified resource in storage.
    */
    public function update(StoreEventRequest $request, Event $event)
    {
        $validated = $request->validated();
        $event->update([
            'title' => $validated['title'],
            'begin_datetime' => $validated['begin_datetime'],
            'duration' => $validated['duration'],
            'formal' => $validated['formal']??false,
        ]);
        $event->categories()->sync($validated['category_id']);

        return to_route('events.index');
    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(Event $event)
    {
        $event = Event::findOrFail($event->id);
        $event->delete();
        return to_route('events.index');
    }
}
