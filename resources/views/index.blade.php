@extends('layouts.app')

@section('tab_title', 'Task List App')
@section('title', 'The list of tasks')

@section('content')

    <nav class="mb-4">
        <a class="link" href="{{ route('tasks.create') }}">Add Task!</a>
    </nav>

    <table class="table-auto w-full my-4">
        <thead>
            <tr>
                <th class="mx-2"></th>
                <th class="mx-2"></th>
            </tr>
        </thead>
        <tbody>

            @forelse ($tasks as $task)
                <tr>
                    <td class="py-1 mx-1"><a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                            @class(['line-through' => $task->completed])>{{ $task->title }}</a></td>
                    <td class="py-1 mx-1"></td>
                </tr>

            @empty
                <div>There are no tasks!</div>
            @endforelse

        </tbody>
    </table>

    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif

@endsection
