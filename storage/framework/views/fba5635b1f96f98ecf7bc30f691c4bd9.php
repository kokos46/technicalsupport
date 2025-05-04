<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Your tasks for tech-support</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
</head>
<body class="bg-light">

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Tasks</h1>
        <a class="btn btn-primary" href="<?php echo e(url('/createtask')); ?>">Create task</a>
    </div>

    <?php if($tasks->isEmpty()): ?>
        <div class="alert alert-info">Задачи отсутствуют.</div>
    <?php else: ?>
        <div class="row g-3">
            <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo e($task->title); ?></h5>
                            <p class="card-text flex-grow-1"><?php echo e(Str::limit($task->task, 150, '...')); ?></p>
                            <p class="text-muted small mb-2">Создано: <?php echo e($task->created_at->format('d.m.Y H:i')); ?></p>
                            <a href="<?php echo e(url('/task/' . $task->id)); ?>" class="btn btn-outline-primary mt-auto align-self-start">Open</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
<?php /**PATH C:\Users\virus\OneDrive\Desktop\techsupport\resources\views/tasks.blade.php ENDPATH**/ ?>