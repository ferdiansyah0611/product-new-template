<?php $__env->startSection('content'); ?>
<div class="col-md-4 card mx-auto">
    <div class="card-body">
    <form action="<?php echo e(route('dashboard.updatecategory', $category->id)); ?>" method="post"><?php echo csrf_field(); ?>
    <input type="text" name="update_category" value="<?php echo e($category->name); ?>">
        <button type="submit">Save change</button>
    </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\product\resources\views\home\dashboard\edit_category.blade.php ENDPATH**/ ?>