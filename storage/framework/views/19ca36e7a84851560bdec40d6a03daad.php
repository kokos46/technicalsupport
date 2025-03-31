<?php use \Illuminate\Support\Carbon; ?>
<html>
<head>
    <title>Task creating</title>
</head>
<body>
<?php if(isset($taskLatest)): ?>
    <?php if(Carbon::now()->diffInDays($taskLatest) <= -1): ?>
        <form action="/createtask" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <label for="title">Title</label>
            <input type="text" name="title"><br>
            <label for="task">Task</label>
            <textarea name="task" style="width: 200px; height: 200px; resize: none"></textarea><br>
            <input type="file" name="image" accept="image/png,image/jpg">
            <input type="submit" value="Send">
        </form>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php else: ?>
        <h1>You can create 1 task in 24 hours</h1>
    <?php endif; ?>
<?php else: ?>
    <form action="/createtask" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <label for="title">Title</label>
        <input type="text" name="title"><br>
        <label for="task">Task</label>
        <input type="text" name="task"><br>
        <input type="file" name="image">
        <input type="submit" value="Send">
    </form>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>

</body>
</html>
<?php /**PATH C:\Users\Konstantin\technicalsupport\resources\views/create.blade.php ENDPATH**/ ?>