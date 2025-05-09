<html>
<head>
    <title>task <?php echo e($task->id); ?></title>
</head>
<body>
    <h1><?php echo e($task->title); ?></h1>
    <h2><?php echo e($task->username); ?></h2>
    <p><?php echo e($task->created_at); ?></p>
    <a href="#" onclick="openImageWindow('<?php echo e(asset($task->filepath)); ?>')">Открыть изображение</a>

    <a href="/closetask/<?php echo e($task->id); ?>">close</a>
    <?php if(\Illuminate\Support\Facades\Auth::user()['status'] == 'manager'): ?>
        <?php if($task->manager == null): ?>
            <a href="/taketask/<?php echo e($task->id); ?>">take</a>
        <?php else: ?>
        <form action="/sendmessage/<?php echo e($task->id); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="text" name="text">
            <input type="submit" value="Send">
        </form>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>
    <?php endif; ?>
    <?php if($task->manager == null): ?>
        <p></p>
    <?php else: ?>
        <p>on view</p>
    <?php endif; ?>
    <p><?php echo e($task->task); ?></p>
    <?php if($task->answer != null): ?>
        <p>Manager answer: <?php echo e($task->answer); ?></p>
    <?php else: ?>
        <p></p>
    <?php endif; ?>
    <script>
        function openImageWindow(src) {
            var width = 600;
            var height = 400;
            var left = (screen.width - width) / 2;
            var top = (screen.height - height) / 2;

            var params = 'width=' + width + ', height=' + height + ', top=' + top + ', left=' + left;

            window.open(src, 'image', params);
        }
    </script>
</body>
</html>
<?php /**PATH C:\Users\Konstantin\technicalsupport\resources\views/task.blade.php ENDPATH**/ ?>