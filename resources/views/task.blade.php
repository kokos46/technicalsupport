<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>task {{$task->id}}</title>
    @vite(['resources/js/app.js'])
</head>
<body>
<div class="container my-5">

    <h1 class="mb-3">{{$task->title}}</h1>
    <h4 class="text-muted mb-1">User: {{$task->username}}</h4>
    <p class="text-secondary">{{ $task->created_at->format('d.m.Y H:i') }}</p>

    <div class="mb-3">
        <a href="#" class="btn btn-outline-primary me-2" onclick="openImageWindow('{{ asset($task->filepath) }}')">Открыть изображение</a>
        {{-- Если хотите, можно раскомментировать и вывести изображение --}}
        {{-- <img src="{{ asset($task->filepath) }}" class="img-fluid rounded mt-3" alt="{{ $task->title }}"> --}}
        <a href="/closetask/{{$task->id}}" class="btn btn-danger">Close</a>
    </div>

    @if(\Illuminate\Support\Facades\Auth::user()['status'] == 'manager')
        @if($task->manager == null)
            <a href="/taketask/{{$task->id}}" class="btn btn-success mb-3">Take</a>
        @else
            <form action="/sendmessage/{{$task->id}}" method="post" class="mb-3">
                @csrf
                <div class="input-group">
                    <input type="text" name="text" class="form-control" placeholder="Введите сообщение" required>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @endif
    @endif

    <div class="mb-3">
        @if($task->manager == null)
            <p class="text-muted fst-italic">Задача еще не взята в работу</p>
        @else
            <p class="text-success fw-semibold">Задача в работе</p>
        @endif
    </div>

    <div class="mb-4">
        <h5>Task description:</h5>
        <p>{{$task->task}}</p>
    </div>

    @if($task->answer != null)
        <div class="alert alert-info">
            <strong>Manager answer:</strong> {{$task->answer}}
        </div>
    @endif

</div>

<script>
    function openImageWindow(src) {
        var width = 600;
        var height = 400;
        var left = (screen.width - width) / 2;
        var top = (screen.height - height) / 2;

        var params = 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left + ',resizable=yes,scrollbars=yes';

        window.open(src, 'image', params);
    }
</script>

{{-- Подключение Bootstrap JS (опционально) --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
