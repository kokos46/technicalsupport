<!DOCTYPE html>
<html>
<head>
    <title>Some site - register</title>
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
        form {
            margin: 40px;
        }
        form input[type="submit"]{
            background: cornflowerblue;
        }
    </style>
</head>
<body>
    <a href="{{ url()->previous() }}">Back</a>
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
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</body>
</html>
