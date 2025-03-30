@use(\Illuminate\Support\Carbon)
<html>
<head>
    <title>Task creating</title>
</head>
<body>
@if(isset($taskLatest))
    @if(Carbon::now()->diffInDays($taskLatest) <= -1)
        <form action="/createtask" method="post" enctype="multipart/form-data">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title"><br>
            <label for="task">Task</label>
            <input type="text" name="task"><br>
            <input type="file" name="image" accept="image/png,image/jpg">
            <input type="submit" value="Send">
        </form>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @else
        <h1>You can create 1 task in 24 hours</h1>
    @endif
@else
    <form action="/createtask" method="post" enctype="multipart/form-data">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title"><br>
        <label for="task">Task</label>
        <input type="text" name="task"><br>
        <input type="file" name="image">
        <input type="submit" value="Send">
    </form>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

</body>
</html>
