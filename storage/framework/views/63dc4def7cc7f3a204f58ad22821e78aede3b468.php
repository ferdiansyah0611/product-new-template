<?php $__env->startSection('content'); ?>
<div class="col-md-12 card mx-auto table-responsive">
    <div class="card-header"></div>
        <div class="card-body">
        <table class="table table-bordered table-striped table-hover" style="width:100%;">
        <thead class="table-primary">
            <tr>
            <th>ID Product</th>
            <th>ID Purchase</th>
            <th>Price</th>
            <th>Totals</th>
            <th>Status</th>
            </tr>
        </thead>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tbody>
            <td><?php echo e($d->production_id); ?></td>
            <td><?php echo e($d->purchase_id); ?></td>
            <td>Rp. <?php echo e(base64_decode($d->price)); ?></td>
            <td>Rp. <?php echo e($d->totals); ?></td>
            <td><span class="badge badge-primary"><?php echo e($d->status); ?></span></td>
         </tbody>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        </div>
        <div class="card-footer"></div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\product\resources\views\home\purchase\receive.blade.php ENDPATH**/ ?>