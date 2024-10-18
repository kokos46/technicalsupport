<html>
    <head>
        <title>register</title>
    </head>
    <body>
    <form action="/register" method="post">
        @csrf
        <label for="login">Login: </label>
        <input type="text" name="login"><br>
        <label for="password">Password: </label>
        <input type="password" name="password"><br>
        <label for="email">Email: </label>
        <input type="email", name="email"><br>
        <input type="submit" value="Register">
    </form>
    </body>
</html>
