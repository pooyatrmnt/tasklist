<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task List</title>
</head>
<body>
    <h1>The list of tasks</h1>
    @if(count($tasks) > 0)
        <div>There are tasks!</div>
        <br>
        @foreach($tasks as $task)
            <a href="{{route("tasks.show", [ "id" => $task -> id])}}">{{$task -> title}}</a><br>
        @endforeach
    @else
        <div>There are no tasks!</div>
    @endif
</body>
</html>
