<html>
<head>
    <title>Some site</title>
</head>
<body>
<h1>Some site</h1>
@if(!empty($_COOKIE['login']))
    <h2><?= $_COOKIE['login'] ?></h2>
    <a href="/techsupport">technical support</a>
@endif

@if(empty($_COOKIE['login']))
    <h1>You need to <a href="/login">login</a></h1>
@endif

</body>
</html>
