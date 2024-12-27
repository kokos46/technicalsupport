<html>
<head>
    <title>Some site</title>
</head>
<body>
<h1>Some site</h1>
<?php if(auth()->guard()->check()): ?>
    <h1><?php echo e($user); ?></h1>
    <a href="/logout">log out</a>
    <br>
<?php endif; ?>
<a href="/register">Register</a><br>
<?php if(auth()->guard()->guest()): ?>
    <a href="/login">Login</a><br>
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