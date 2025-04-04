<html>
<head>
    <title>task {{$task->id}}</title>
</head>
<body>
    <h1>{{$task->title}}</h1>
    <h2>{{$task->username}}</h2>
    <p>{{$task->created_at}}</p>
    <a href="#" onclick="openImageWindow('{{ asset($task->filepath) }}')">Открыть изображение</a>
{{--    <img src="{{ asset($task->filepath) }}" class="card-img-top" alt="{{ $task->title }}">--}}
    <a href="/closetask/{{$task->id}}">close</a>
    @if(\Illuminate\Support\Facades\Auth::user()['status'] == 'manager')
        @if($task->manager == null)
            <a href="/taketask/{{$task->id}}">take</a>
        @else
        <form action="/sendmessage/{{$task->id}}" method="post">
            @csrf
            <input type="text" name="text">
            <input type="submit" value="Send">
        </form>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    @endif
    @if($task->manager == null)
        <p></p>
    @else
        <p>on view</p>
    @endif
    <p>{{$task->task}}</p>
    @if($task->answer != null)
        <p>Manager answer: {{$task->answer}}</p>
    @else
        <p></p>
    @endif
    <script>
        function openImageWindow(src) {
            var width = 600;
            var height = 400;
            var left = (screen.width - width) / 2;
            var top = (screen.height - height) / 2;

            var params = 'width=' + width + ', height=' + height + ', top=' + top + ', left=' + left;

            window.open(src, 'image', params);
        }
    </script>
</body>
</html>
