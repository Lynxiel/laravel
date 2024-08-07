<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/',  function () {
    return view('index');
});
Route::resource('tasks', TaskController::class);
Route::resource('events', EventController::class);
