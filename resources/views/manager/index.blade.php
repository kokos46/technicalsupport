<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Active tasks</title>
    <style>
        .managerTask{
            border: solid 2px black;
            padding: 8px;
            margin: 5px;
        }
    </style>
</head>
<body>
{{--<select id="filter">--}}
{{--    <option value="<?php $value = 'all'; echo $value?>">All</option>--}}
{{--    <option value="active">Active</option>--}}
{{--    <option value="notActive">Not active</option>--}}
{{--    <option value="viewed">Viewed</option>--}}
{{--    <option value="notViewed">Not viewed</option>--}}
{{--</select>--}}

{{--    @foreach($tasks->reverse() as $task)--}}
{{--        <div class="managerTask">--}}
{{--            <h1>{{$task->title}}</h1><br>--}}
{{--            <h2 id="username">{{$task->username}}</h2><br>--}}
{{--            <p>{{$task->task}}</p><br>--}}
{{--            <p>{{$task->created_at}}</p>--}}
{{--            @if($task->completed)--}}
{{--                <p style="background-color: black; color: white">closed</p>--}}
{{--            @else--}}
{{--                <p style="background-color: green; color: white">active</p>--}}
{{--            @endif--}}
{{--            @if(!$task->completed)--}}
{{--                <a href="/task/{{$task->id}}">open</a>--}}
{{--            @endif--}}
{{--            @if($task->manager != null)--}}
{{--                <p>Taked by: {{$task->manager}}</p>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    @endforeach--}}
<select id="filter">
    <option value="all">All</option>
    <option value="active">Active</option>
    <option value="notActive">Not active</option>
    <option value="viewed">Viewed</option>
    <option value="notViewed">Not viewed</option>
</select>

<div id="taskContainer">
    @foreach($tasks->reverse() as $task)
        <div class="managerTask
            {{ $task->completed ? 'notActive' : 'active' }}
            {{ $task->viewed ? 'viewed' : 'notViewed' }}">
            <h1>{{$task->title}}</h1><br>
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
            @if($task->manager != null)
                <p>Taked by: {{$task->manager}}</p>
            @endif
        </div>
    @endforeach
</div>

<script>
    document.getElementById('filter').addEventListener('change', function() {
        var value = this.value;
        var tasks = document.querySelectorAll('.managerTask');

        tasks.forEach(function(task) {
            task.style.display = 'block'; // Сначала показываем все

            if (value === 'active' && task.classList.contains('notActive')) {
                task.style.display = 'none'; // Скрываем неактивные
            }
            else if (value === 'notActive' && task.classList.contains('active')) {
                task.style.display = 'none'; // Скрываем активные
            }
            else if (value === 'viewed' && !task.classList.contains('viewed')) {
                task.style.display = 'none'; // Скрываем не просмотренные
            }
            else if (value === 'notViewed' && task.classList.contains('viewed')) {
                task.style.display = 'none'; // Скрываем просмотренные
            }
        });
    });
</script>
</body>
</html>
