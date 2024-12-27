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
            <input type="text" name="task"><br>
            <input type="file" name="image">
            <input type="submit" value="Send">
        </form>
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
<?php endif; ?>

</body>
</html>
<?php /**PATH C:\Users\Konstantin\technicalsupport\resources\views/create.blade.php ENDPATH**/ ?>