<html>
<head>
    <title>task {{$task->id}}</title>
</head>
<body>
    <h1>{{$task->title}}</h1>
    <h2>{{$task->username}}</h2>
    <p>{{$task->created_at}}</p>
    <a href="/closetask/{{$task->id}}">close</a>
    <h2>From: {{$task->username}}</h2>
</body>
</html>
