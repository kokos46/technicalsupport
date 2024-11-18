<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Active tasks</title>
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
</head>
<body>
    @foreach($tasks as $task)
        <div class="managerTask">
            <h1 id="{{$task->title}}">{{$task->title}}</h1><br>
            <h2 id="username">{{$task->username}}</h2><br>
            <p>{{$task->task}}</p><br>
            <p>{{$task->created_at}}</p>
            @if($task->completed)
                <p>closed</p>
            @else
                <p style="color: green">active</p>
            @endif
            @if(!$task->completed)
                <a href="/task/{{$task->id}}">open</a>
            @endif
        </div>
    @endforeach
</body>
</html>
