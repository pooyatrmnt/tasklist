<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Models\Task;

Route::get("/", function () { //Index of Project - List Tasks

    return redirect()->route("tasks.index");
});

Route::get('/tasks', function () {    //Show Task

    return view('index', [
        "tasks" => Task::latest()->get()
    ]);
})->name("tasks.index");

Route::view("/task/create", "create")  //Create Task
    ->name("tasks.create");

Route::get("task/{task}/edit", function (Task $task) {   //Edit Form

    return view("edit", ["task" => $task]);
})->name("tasks.edit");

Route::get("task/{task}", function (Task $task) {  //Show Task Details

    return view("show", ["task" => $task]);
})->name("tasks.show");

Route::post("/tasks", function (TaskRequest $request) {  //Insert Task Into Database

    // $data = $request->validated();

    // $task = new Task;
    // $task->title = $data["title"];
    // $task->description = $data["description"];
    // $task->long_description = $data["long_description"];

    // $task->save();

    $task = Task::create($request -> validated());

    return redirect()->route("tasks.show", ["task" => $task->id])
        ->with("success", "task created successfully!");

})->name("tasks.store");

Route::put("/tasks/{task}", function (Task $task, TaskRequest $request) {  //Insert Task Into Database

    // $data = $request->validated();

    // $task->title = $data["title"];
    // $task->description = $data["description"];
    // $task->long_description = $data["long_description"];

    // $task->save();

    $task -> update($request -> validated());

    return redirect()->route("tasks.show", ["task" => $task->id])
        ->with("success", "task updated successfully!");

})->name("tasks.update");

Route::delete("/tasks/{task}", function (Task $task){
    $task -> delete();

    return redirect()->route("tasks.index")
        ->with("success", "Task deleted successfully!");
})->name("tasks.destroy");

Route::fallback(function () {  //404 Page
    return (Response::HTTP_NOT_FOUND);
});
