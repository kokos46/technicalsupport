@use(\Illuminate\Support\Carbon)
    <!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Task creating</title>
    @vite(['resources/js/app.js'])
</head>
<body>
<div class="container mt-5">
    @if(isset($taskLatest))
        @if(Carbon::now()->diffInDays($taskLatest) <= -1)
            <form action="/createtask" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="task" class="form-label">Task</label>
                    <textarea name="task" id="task" class="form-control" style="height: 200px; resize: none" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image (PNG, JPG)</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/png,image/jpg">
                </div>
                <input type="submit" class="btn btn-primary" value="Send">
            </form>
        @else
            <div class="alert alert-warning" role="alert">
                You can create 1 task in 24 hours
            </div>
        @endif
    @else
        <form action="/createtask" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="task" class="form-label">Task</label>
                <textarea class="form-control" name="task" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary" value="Send">
        </form>
    @endif

    @if($errors->any())
        <div class="alert alert-danger mt-4">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
</body>
</html>
