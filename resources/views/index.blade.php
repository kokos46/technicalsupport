<html>
<head>
    <title>Some site</title>
    @vite(['resources/js/app.js'])
</head>
<body>
<h1>Some site</h1>
@auth
    <h1>{{$user}}</h1>
    <a class="btn btn-primary" href="/logout">log out</a>
    <br>
@endauth
<a class="btn btn-primary" href="/register">Register</a>
@guest
    <a class="btn btn-primary" href="/login">Login</a>
@endguest
@auth
    @if(\Illuminate\Support\Facades\Auth::user()['status'] == 'manager')
        <a class="btn btn-primary" href="/manager">tasks</a>
    @elseif(\Illuminate\Support\Facades\Auth::user()['status'] == 'user')
        <a class="btn btn-primary" href="/techsupport">techsupport</a>
    @endif
@endauth
</body>
</html>
