<!DOCTYPE html>
<html>
<head>
    <title>Some site - register</title>
    <style>
        body {
            font-family: "Arial", sans-serif;
            margin:0;
            padding:0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .box {
            border: solid 1px gray;
            display: inline-block;
            padding: 15px;
            line-height: normal;
            vertical-align: center;
        }
        .input_box{
            margin: 10px;
        }
        .input_box input {
            padding: 5px;
            width: 93%;
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

        .box input[type="submit"]{
            background: cornflowerblue;
            color: white;
            border: solid 1px black;
            border-radius: 4px;
            transition: ease .3s;
            padding: 20px;
            font-size: 16px;
        }
        .box input[type="submit"]:hover{
            cursor: pointer;
            color: black;
            background: white;
        }
    </style>
</head>
<body>
<div class="box">
    <form action="/register" method="post">
        <?php echo csrf_field(); ?>
        <div class="input_box">
            <label for="login">Login: </label>
            <input type="text" name="login"><br>
        </div>
        <div class="input_box">
            <label for="email">Email: </label>
            <input type="text" name="email"><br>
        </div>
        <div class="input_box">
            <label for="password">Password: </label>
            <input type="password" name="password"><br>
        </div>
        <input type="submit" value="Register">
        <a href="<?php echo e(url()->previous()); ?>" style="float: right">Back</a>
    </form>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
</body>
</html>
<?php /**PATH C:\Users\Konstantin\technicalsupport\resources\views/auth/register.blade.php ENDPATH**/ ?>