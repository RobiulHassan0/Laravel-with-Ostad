<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $__env->yieldContent('title', 'Admin'); ?></title>

    <!-- Bootstrap 5 CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Admin layout CSS -->
    <link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">
</head>
<body>
    <div class="admin-wrapper">
        
        <?php echo $__env->make('layouts.pertials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <!-- Main content area -->
        <main class="admin-main">
            
            <?php echo $__env->make('layouts.pertials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <div class="admin-content">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </main>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- Bootstrap 5 JS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('js/common.js')); ?>"></script>

    <!-- Admin layout JS -->
    <script src="<?php echo e(asset('js/admin.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Full Stack Laravel Projects by Ostad\inventory_project\resources\views/layouts/admin.blade.php ENDPATH**/ ?>