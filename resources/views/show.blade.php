@extends("layouts.app")

@section("tab_title", 'Task : ' . $task->title)
@section("title", $task->title)

@section("content")


    <p>{{$task->description}}</p>

    @if($task->long_description)
        <p>{{$task->long_description}}</p>
    @endif

    <p>{{$task->created_at}}</p>
    <p>{{$task->updated_at}}</p>

@endsection
