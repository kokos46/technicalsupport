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
    <h4 class="text-muted mb-1">User: <?php echo e($task->username); ?></h4>
    <p class="text-secondary"><?php echo e($task->created_at->format('d.m.Y H:i')); ?></p>

    <div class="mb-3">
        <a href="#" class="btn btn-outline-primary me-2" onclick="openImageWindow('<?php echo e(asset($task->filepath)); ?>')">Открыть изображение</a>
        
        
        <a href="/closetask/<?php echo e($task->id); ?>" class="btn btn-danger">Close</a>
    </div>

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
    <?php endif; ?>

    <div class="mb-3">
        <?php if($task->manager == null): ?>
            <p class="text-muted fst-italic">Задача еще не взята в работу</p>
        <?php else: ?>
            <p class="text-success fw-semibold">Задача в работе</p>
        <?php endif; ?>
    </div>

    <div class="mb-4">
        <h5>Task description:</h5>
        <p><?php echo e($task->task); ?></p>
    </div>

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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php /**PATH C:\Users\virus\OneDrive\Desktop\techsupport\resources\views/task.blade.php ENDPATH**/ ?>