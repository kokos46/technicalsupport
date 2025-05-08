<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>task <?php echo e($task->id); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
</head>
<body>
<div class="container my-5">

    <h1 class="mb-3"><?php echo e($task->title); ?></h1>
    <h4 class="text-muted mb-4">User: <?php echo e($username); ?></h4>

    <?php if(isset($task->filepath)): ?>
        <div class="mb-3">
            <a href="#" class="btn btn-outline-primary me-2" onclick="openImageWindow('<?php echo e(asset($task->filepath)); ?>')">Открыть <?php echo e(substr($task->filepath, 8)); ?></a>
        </div>
    <?php endif; ?>

    <a href="/closetask/<?php echo e($task->id); ?>" class="btn btn-danger mb-3">Закрыть обращение</a>

    <?php if(\Illuminate\Support\Facades\Auth::user()['status'] == 'user'): ?>
    <form action="/sendmessage/<?php echo e($task->id); ?>" method="post" class="mb-3">
        <?php echo csrf_field(); ?>
        <div class="input-group">
            <input type="text" name="text" class="form-control" placeholder="Введите сообщение" required>
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>

    <div class="mb-3">
        <?php if($task->manager == null): ?>
            <p class="text-muted fst-italic">Задача еще не взята в работу</p>
        <?php else: ?>
            <p class="text-success fw-semibold">Задача в работе</p>
        <?php endif; ?>
    </div>

    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="border border-2 border-light rounded-3 p-3 mb-3 shadow-sm bg-white">
            <p class="text-muted"><?php echo e($comment->created_at); ?></p>
            <h5 class="fw-bold mb-2"><?php echo e($comment->username); ?>:</h5>
            <p class="mb-0 text-muted ms-5"><?php echo e($comment->comment); ?></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <?php endif; ?>

    <?php if(\Illuminate\Support\Facades\Auth::user()['status'] == 'manager'): ?>
        <?php if($task->manager == null): ?>
            <a href="/taketask/<?php echo e($task->id); ?>" class="btn btn-success mb-3">Take</a>
        <?php else: ?>
            <form action="/sendmessage/<?php echo e($task->id); ?>" method="post" class="mb-3">
                <?php echo csrf_field(); ?>
                <div class="input-group">
                    <input type="text" name="text" class="form-control" placeholder="Введите сообщение" required>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
        <?php endif; ?>

            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="border border-2 border-light rounded-3 p-3 mb-3 shadow-sm bg-white">
                    <p class="text-muted"><?php echo e($comment->created_at); ?></p>
                    <h5 class="fw-bold mb-2"><?php echo e($comment->username); ?>:</h5>
                    <p class="mb-0 text-muted ms-5"><?php echo e($comment->comment); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php if($task->answer != null): ?>
        <div class="alert alert-info">
            <strong>Manager answer:</strong> <?php echo e($task->answer); ?>

        </div>
    <?php endif; ?>

</div>

<script>
    function openImageWindow(src) {
        var width = 600;
        var height = 400;
        var left = (screen.width - width) / 2;
        var top = (screen.height - height) / 2;

        var params = 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left + ',resizable=yes,scrollbars=yes';

        window.open(src, 'image', params);
    }
</script>
</body>
</html>
<?php /**PATH C:\Users\virus\OneDrive\Desktop\techsupport\resources\views/task.blade.php ENDPATH**/ ?>