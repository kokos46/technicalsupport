<html>
<head>
    <title>Some site</title>
    <style>
        body {
            font-family: "Arial", sans-serif;
        }
        a {
            text-decoration: none;
            background: cornflowerblue;
            color: white;
            padding: 20px;
            border-radius: 4px;
            border: solid 1px black;
            transition: ease .3s;
        }

        a:hover {
            color: black;
            background: white;
        }
    </style>
</head>
<body>
<h1>Some site</h1>
@auth
    <h1>{{$user}}</h1>
    <a href="/logout">log out</a>
    <br>
@endauth
<a href="/register">Register</a>
@guest
    <a href="/login">Login</a>
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
