<!DOCTYPE html>
<html>
<head>
    <title>Some site - register</title>
</head>
<body>
<form action="/register" method="post">
    @csrf
    <label for="login">Login: </label>
    <input type="text" name="login">
    <label for="email">Email: </label>
    <input type="text" name="email">
    <label for="password">Password: </label>
    <input type="password" name="password">
    <input type="submit" value="Register">
</form>
</body>
</html>
