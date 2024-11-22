<html>
<head>
    <title>Some site</title>
</head>
<body>
<h1>Some site</h1>
@auth
    <h1>{{$user}}</h1>
    <a href="/logout">log out</a>
    <br>
@endauth
<a href="/register">Register</a><br>
@guest
    <a href="/login">Login</a><br>
@endguest
@auth
    @if(\Illuminate\Support\Facades\Auth::user()['status'] == 'manager')
        <a href="/manager">tasks</a>
    @elseif(\Illuminate\Support\Facades\Auth::user()['status'] == 'user')
        <a href="/techsupport">techsupport</a>
    @endif
@endauth
</body>
</html>
