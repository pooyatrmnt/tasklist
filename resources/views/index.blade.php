@extends("layouts.app")

@section("tab_title", "Task List App")
@section("title", "The list of tasks")

@section("content")

    @if(count($tasks) > 0)
        @foreach($tasks as $task)
            <a href="{{route("tasks.show", [ "id" => $task -> id])}}">{{$task -> title}}</a><br>
        @endforeach
    @else
        <div>There are no tasks!</div>
    @endif

@endsection
