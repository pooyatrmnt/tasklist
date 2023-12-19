<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Models\Task;

Route::get("/", function () { //Index of Project - List of Tasks

    return redirect()->route("tasks.index");
});

Route::get('/tasks', function () {    //Show List Of Task

    return view('index', [
        "tasks" => Task::latest()->paginate(10)
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

    $task = Task::create($request -> validated());

    return redirect()->route("tasks.show", ["task" => $task->id])
        ->with("success", "task created successfully!");

})->name("tasks.store");

Route::put("/tasks/{task}", function (Task $task, TaskRequest $request) {  //Insert Updated Task Into Database

    $task -> update($request -> validated());

    return redirect()->route("tasks.show", ["task" => $task->id])
        ->with("success", "task updated successfully!");

})->name("tasks.update");

Route::delete("/tasks/{task}", function (Task $task){    //Delete Task
    $task -> delete();

    return redirect()->route("tasks.index")
        ->with("success", "Task deleted successfully!");
})->name("tasks.destroy");

Route::put("tasks/{task}/toggle-complete", function (Task $task){   //Complete Task

    $task->toggleComplete();

    return redirect()->back()->with("success", "Task updated successfully!");
})->name("tasks.toggle-complete");

Route::fallback(function () {  //404 Page
    return (Response::HTTP_NOT_FOUND);
});
