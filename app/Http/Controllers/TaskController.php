<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use   App\Models\Task;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasksCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation temporary skipped :)

        $task = new Task([
            'title'=>$request->input('title'),
            'max'=>$request->input('max'),
        ]);
        $task->save();
        return to_route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        return view('task')->with('task', $task);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        return view('tasksEdit')->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validation temporary skipped :)
        $task = Task::findOrFail($id);
        $task->update([
            'title'=>$request->input('title'),
            'max'=>$request->input('max'),
        ]);
        return to_route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        // this if fun
        $task->delete();
        return to_route('tasks.index');
    }
}
