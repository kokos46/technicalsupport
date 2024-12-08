@use(\Illuminate\Support\Carbon)
<html>
<head>
    <title>Task creating</title>
</head>
<body>
@if(isset($taskLatest))
    @if(Carbon::now()->diffInDays($taskLatest) <= -1)
        <form action="/createtask" method="post">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title"><br>
            <label for="task">Task</label>
            <input type="text" name="task"><br>
            <input type="file">
            <input type="submit" value="Send">
        </form>
    @else
        <h1>You can create 1 task in 24 hours</h1>
    @endif
@else
    <form action="/createtask" method="post">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title"><br>
        <label for="task">Task</label>
        <input type="text" name="task"><br>
        <input type="file">
        <input type="submit" value="Send">
    </form>
@endif

</body>
</html>
