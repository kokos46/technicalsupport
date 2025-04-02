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
    <a href="<?php echo e(url()->previous()); ?>">Back</a>
    <form action="/register" method="post">
        <?php echo csrf_field(); ?>
        <label for="login">Login: </label>
        <input type="text" name="login">
        <label for="email">Email: </label>
        <input type="text" name="email">
        <label for="password">Password: </label>
        <input type="password" name="password">
        <input type="submit" value="Register">
    </form>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</body>
</html>
<?php /**PATH C:\Users\Konstantin\technicalsupport\resources\views/auth/register.blade.php ENDPATH**/ ?>