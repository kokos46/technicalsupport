<!DOCTYPE html>
<html>
<head>
    <title>Some site - login</title>
</head>
<body>
<form action="/login" method="post">
    @csrf
    <label for="email">Email: </label>
    <input type="text" name="email">
    <label for="password">Password: </label>
    <input type="password" name="password">
    <input type="submit" value="Login">
</form>
</body>
</html>