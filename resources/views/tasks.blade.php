<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Your tasks for tech-support</title>
    @vite(['resources/js/app.js'])
</head>
<body class="bg-light">

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Tasks</h1>
        <a class="btn btn-primary" href="{{ url('/createtask') }}">Create task</a>
    </div>

    @if($tasks->isEmpty())
        <div class="alert alert-info">Задачи отсутствуют.</div>
    @else
        <div class="row g-3">
            @foreach($tasks as $task)
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $task->title }}</h5>
                            <p class="card-text flex-grow-1">{{ Str::limit($task->task, 150, '...') }}</p>
                            <p class="text-muted small mb-2">Создано: {{ $task->created_at->format('d.m.Y H:i') }}</p>
                            <a href="{{ url('/task/' . $task->id) }}" class="btn btn-outline-primary mt-auto align-self-start">Open</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
</body>
</html>
