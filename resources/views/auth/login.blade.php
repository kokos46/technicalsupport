<!DOCTYPE html>
<html>
<head>
    <title>Some site - login</title>
</head>
<body>
<a href="{{ url()->previous() }}">Back</a>
<form action="/login" method="post">
    @csrf
    <label for="email">Email: </label>
    <input type="text" name="email">
    <label for="password">Password: </label>
    <input type="password" name="password">
    <input type="submit" value="Login">
</form>
<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
</body>
</html>
