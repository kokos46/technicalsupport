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
    <h4 class="text-muted mb-4">User: {{$username}}</h4>

    @if(isset($task->filepath))
        <div class="mb-3">
            <a href="#" class="btn btn-outline-primary me-2" onclick="openImageWindow('{{ asset($task->filepath) }}')">Открыть {{substr($task->filepath, 8)}}</a>
        </div>
    @endif

    <a href="/closetask/{{$task->id}}" class="btn btn-danger mb-3">Закрыть обращение</a>

    @if(\Illuminate\Support\Facades\Auth::user()['status'] == 'user')
    <form action="/sendmessage/{{$task->id}}" method="post" class="mb-3">
        @csrf
        <div class="input-group">
            <input type="text" name="text" class="form-control" placeholder="Введите сообщение" required>
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>

    <div class="mb-3">
        @if($task->manager == null)
            <p class="text-muted fst-italic">Задача еще не взята в работу</p>
        @else
            <p class="text-success fw-semibold">Задача в работе</p>
        @endif
    </div>

    @foreach($comments as $comment)
        <div class="border border-2 border-light rounded-3 p-3 mb-3 shadow-sm bg-white">
            <p class="text-muted">{{$comment->created_at}}</p>
            <h5 class="fw-bold mb-2">{{$comment->username}}:</h5>
            <p class="mb-0 text-muted ms-5">{{$comment->comment}}</p>
        </div>
    @endforeach

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

            @foreach($comments as $comment)
                <div class="border border-2 border-light rounded-3 p-3 mb-3 shadow-sm bg-white">
                    <p class="text-muted">{{$comment->created_at}}</p>
                    <h5 class="fw-bold mb-2">{{$comment->username}}:</h5>
                    <p class="mb-0 text-muted ms-5">{{$comment->comment}}</p>
                </div>
            @endforeach
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
</body>
</html>
