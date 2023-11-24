<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Task;

Route::get("/", function () { //Index of Project - List Tasks

    return redirect()->route("tasks.index");
});

Route::get('/tasks', function () {    //Show Task

    return view('index', [
        "tasks" => Task::latest()
            ->where("completed", true)->get()
    ]);
})->name("tasks.index");

Route::view("/task/create", "create")  //Create Task
    ->name("tasks.create");

Route::get("task/{id}/edit", function ($id) {   //Edit Form

    return view("edit", ["task" => Task::findOrFail($id)]);
})->name("tasks.edit");

Route::get("task/{id}", function ($id) {  //Show Task Details

    return view("show", ["task" => Task::findOrFail($id)]);
})->name("tasks.show");

Route::post("/tasks", function (Request $request) {  //Insert Task Into Database
    $data = $request->validate([
        "title" => "required|max:255",
        "description" => "required",
        "long_description" => "required"
    ]);

    $task = new Task;
    $task->title = $data["title"];
    $task->description = $data["description"];
    $task->long_description = $data["long_description"];

    $task->save();

    return redirect()->route("tasks.show", ["id" => $task->id])
        ->with("success", "task created successfully!");

})->name("tasks.store");

Route::put("/tasks/{id}", function ($id, Request $request) {  //Insert Task Into Database
    $data = $request->validate([
        "title" => "required|max:255",
        "description" => "required",
        "long_description" => "required"
    ]);

    $task = Task::findOrFail($id);
    $task->title = $data["title"];
    $task->description = $data["description"];
    $task->long_description = $data["long_description"];

    $task->save();

    return redirect()->route("tasks.show", ["id" => $task->id])
        ->with("success", "task updated successfully!");

})->name("tasks.update");

Route::fallback(function () {  //404 Page
    return (Response::HTTP_NOT_FOUND);
});
