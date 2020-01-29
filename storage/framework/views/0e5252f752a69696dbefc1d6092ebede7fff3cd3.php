<?php $__env->startSection('header'); ?>
<?php $__env->startSection('content'); ?>
<form method="post" action=""><?php echo csrf_field(); ?>

</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\product\resources\views\home\profile\edit.blade.php ENDPATH**/ ?>