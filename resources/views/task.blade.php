<html>
<head>
    <title>task {{$task->id}}</title>
</head>
<body>
    <h1>{{$task->title}}</h1>
    <h2>{{$task->username}}</h2>
    <p>{{$task->created_at}}</p>
    <a href="/closetask/{{$task->id}}">close</a>
    @if(\Illuminate\Support\Facades\Auth::user()['status'] == 'manager')
        <form action="/sendmessage/{{$task->id}}" method="post">
            @csrf
            <input type="text" name="text">
            <input type="submit" value="Send">
        </form>
    @endif
    <p>{{$task->task}}</p>
    @if($task->answer != null)
        <p>Manager answer: {{$task->answer}}</p>
    @else
        <p></p>
    @endif
</body>
</html>
