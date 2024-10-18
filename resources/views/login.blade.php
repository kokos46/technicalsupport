<html>
<head>
    <title>login</title>
</head>
<body>
<form action="/" method="post">
    @csrf
    <input type="text" name="login">
    <input type="password" name="password">
    <input type="submit" value="login">
</form>
</body>
</html>
