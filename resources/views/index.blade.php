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
<a href="/techsupport">technical support</a>
</body>
</html>
