<!DOCTYPE html>
<html>
<head>
    <title>Some site - login</title>
</head>
<body>
<form action="/login" method="post">
    <?php echo csrf_field(); ?>
    <label for="email">Email: </label>
    <input type="text" name="email">
    <label for="password">Password: </label>
    <input type="password" name="password">
    <input type="submit" value="Login">
</form>
<ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</body>
</html>
<?php /**PATH C:\Users\Konstantin\technicalsupport\resources\views/auth/login.blade.php ENDPATH**/ ?>