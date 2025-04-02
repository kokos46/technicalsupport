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
<?php if(auth()->guard()->check()): ?>
    <h1><?php echo e($user); ?></h1>
    <a href="/logout">log out</a>
    <br>
<?php endif; ?>
<a href="/register">Register</a>
<?php if(auth()->guard()->guest()): ?>
    <a href="/login">Login</a>
<?php endif; ?>
<?php if(auth()->guard()->check()): ?>
    <?php if(\Illuminate\Support\Facades\Auth::user()['status'] == 'manager'): ?>
        <a href="/manager">tasks</a>
    <?php elseif(\Illuminate\Support\Facades\Auth::user()['status'] == 'user'): ?>
        <a href="/techsupport">techsupport</a>
    <?php endif; ?>
<?php endif; ?>
</body>
</html>
<?php /**PATH C:\Users\Konstantin\technicalsupport\resources\views/index.blade.php ENDPATH**/ ?>