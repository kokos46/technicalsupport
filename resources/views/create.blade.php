<html>
<head>
    <title>Task creating</title>
</head>
<body>
<form action="/createtask" method="post">
    @csrf
    <label for="title">Title</label>
    <input type="text" name="title">
    <label for="task">Task</label>
    <input type="text" name="task">
    <input type="submit" value="Send">
</form>
</body>
</html>
