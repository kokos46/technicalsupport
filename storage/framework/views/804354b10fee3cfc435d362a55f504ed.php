<html>
    <head>
        <title>Your tasks for tech-support</title>
        <link rel="stylesheet" href="<?php echo e(asset('css/taskstyle.css')); ?>">
    </head>
    <body>
        <h1>Tasks</h1>
        <a href="/createtask">Create task</a>
        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="task">
                <h1><?php echo e($task->title); ?></h1>
                <p><?php echo e($task->task); ?></p>
                <p><?php echo e($task->created_at); ?></p>
                <a href="/task/<?php echo e($task->id); ?>">open</a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </body>
</html>
<?php /**PATH C:\Users\Konstantin\technicalsupport\resources\views/tasks.blade.php ENDPATH**/ ?>