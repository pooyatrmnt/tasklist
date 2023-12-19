@extends('layouts.app')

@section('tab_title', isset($task) ? 'Edit Task : ' . $task->title : 'Add Task')

@section('title', isset($task) ? 'Edit Task' : 'Add a new Task')

@section('content')

    <form style="py-2" method="POST"
        action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div style="mb-4 py-2">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" @class(['border-red-500' => $errors->has('title')])
                value="{{ $task->title ?? old('title') }}">
            @error('title')
                <p class="error"> {{ $message }} </p>
            @enderror
        </div>

        <div style="mb-4 py-2">
            <label for="description">Description</label>
            <textarea name="description" id="description" @class(['border-red-500' => $errors->has('description')]) rows="5">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="error"> {{ $message }} </p>
            @enderror
        </div>

        <div style="mb-4 py-2">
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" @class(['border-red-500' => $errors->has('long_description')]) rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="error"> {{ $message }} </p>
            @enderror
        </div>

        <div class="flex w-full justify-between items-center gap-2">
            <button class="btn" type="submit">
                @isset($task)
                    Update Task
                @else
                    Add Task
                @endisset
            </button>

            <a class="link"
                href="@if (URL::previous() == URL::current()) {{ route('tasks.index') }}
            @else
            {{ URL::previous() }} @endif">Cancel</a>
        </div>
    </form>

@endsection
