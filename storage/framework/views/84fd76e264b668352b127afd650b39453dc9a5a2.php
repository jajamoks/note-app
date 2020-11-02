<?php $__env->startSection('content'); ?>
    <App :user="<?php echo e(auth()->user()); ?>"></App>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ZEAMO\Desktop\BACKUP\LARAVEL\exam\resources\views/home.blade.php ENDPATH**/ ?>