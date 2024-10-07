<html>
    <head>
        <title>Your tasks for tech-support</title>
        <link rel="stylesheet" href="{{ asset('css/taskstyle.css') }}">
    </head>
    <body>
        <h1>Tasks</h1>
        <a href="/createtask">Create task</a>
        @foreach($tasks as $task)
            <div class="task">
                <h1>{{$task->title}}</h1>
                <p>{{$task->task}}</p>
                <p>{{$task->created_at}}</p>

            </div>
        @endforeach
    </body>
</html>
