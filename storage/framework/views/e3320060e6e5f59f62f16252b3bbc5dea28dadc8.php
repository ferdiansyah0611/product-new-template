<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/vendor/datatables/media/css/jquery.dataTables.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-md-8 card mx-auto table-responsive">
    <div class="card-header"></div>
        <div class="card-body">
        <table class="table table-bordered table-striped table-hover" style="width:100%;">
        <thead class="table-primary">
            <tr>
            <th>ID</th>
            <th>Name Products</th>
            <th>Usage Storage</th>
            <th>Action</th>
            </tr>
        </thead>
        <?php $__currentLoopData = $qwerty; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($p->size == Null): ?>
        <?php
        $data_user = DB::table('users')->get();
        $count = filesize(public_path($p->main_pictures)) + filesize(public_path($p->second_pictures)) + filesize(public_path($p->three_pictures)) + filesize(public_path($p->fourth_pictures)) + filesize(public_path($p->five_pictures));
        $kb = $count / 1000;
        $max = '10000.000';
        echo "<tbody>";
            echo "<td>".$p->id."</td>";
            echo "<td>".base64_decode($p->name_products)."</td>";
            echo "<td>".$kb."</td>";
            ?>
            <form action='<?php echo e(route('dashboard.dbsavesize', $p->id)); ?>' method='POST'><?php echo csrf_field(); ?>
            <input type='hidden' value='<?php echo e($kb); ?>' name="size">
            <td><button type='submit' class="btn btn-success">Save</button></td>
            </form>
         </tbody>
        <?php else: ?>
        <?php
        $data_user = DB::table('users')->get();
        $count = filesize(public_path($p->main_pictures)) + filesize(public_path($p->second_pictures)) + filesize(public_path($p->three_pictures)) + filesize(public_path($p->fourth_pictures)) + filesize(public_path($p->five_pictures));
        $kb = $count / 1000;
        $max = '10000.000';
        echo "<tbody>";
            echo "<td>".$p->id."</td>";
            echo "<td>".base64_decode($p->name_products)."</td>";
            echo "<td>".$kb."</td>";
            ?>
            <td>You has been save</td>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        </div>
        <div class="card-footer"></div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('/vendor/datatables/media/js/jquery.dataTables.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\product\resources\views\home\dashboard\manage_database.blade.php ENDPATH**/ ?>