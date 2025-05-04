<?php use \Illuminate\Support\Carbon; ?>
    <!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Task creating</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
</head>
<body>
<div class="container mt-5">
    <?php if(isset($taskLatest)): ?>
        <?php if(Carbon::now()->diffInDays($taskLatest) <= -1): ?>
            <form action="/createtask" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="task" class="form-label">Task</label>
                    <textarea name="task" id="task" class="form-control" style="height: 200px; resize: none" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image (PNG, JPG)</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/png,image/jpg">
                </div>
                <input type="submit" class="btn btn-primary" value="Send">
            </form>
        <?php else: ?>
            <div class="alert alert-warning" role="alert">
                You can create 1 task in 24 hours
            </div>
        <?php endif; ?>
    <?php else: ?>
        <form action="/createtask" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="task" class="form-label">Task</label>
                <textarea class="form-control" name="task" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary" value="Send">
        </form>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger mt-4">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
<?php /**PATH C:\Users\virus\OneDrive\Desktop\techsupport\resources\views/create.blade.php ENDPATH**/ ?>