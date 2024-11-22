<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Active tasks</title>
</head>
<body>
    @foreach(array_reverse($tasks->toArray()) as $task)
        <div class="managerTask">
            <h1 id="{{$task->title}}">{{$task->title}}</h1><br>
            <h2 id="username">{{$task->username}}</h2><br>
            <p>{{$task->task}}</p><br>
            <p>{{$task->created_at}}</p>
            @if($task->completed)
                <p style="background-color: black; color: white">closed</p>
            @else
                <p style="background-color: green; color: white">active</p>
            @endif
            @if(!$task->completed)
                <a href="/task/{{$task->id}}">open</a>
            @endif
        </div>
    @endforeach
</body>
</html>
