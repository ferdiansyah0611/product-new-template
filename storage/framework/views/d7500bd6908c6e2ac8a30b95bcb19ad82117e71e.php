<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/vendor/datatables/media/css/jquery.dataTables.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-md-12 card table-responsive" style="font-family: 'Times New Roman;">
	<div class="card-header">My Products</div>
	<div class="card-body">
<table class="table table-bordered table-hover table-striped">
<form method="get" action="<?php echo e(route('productions.searchmanage')); ?>"><?php echo csrf_field(); ?>
    <input class="form-group form-control" type="text" name="search" placeholder="Search data articles...">
    <button class="btn btn-secondary button-search" type="submit"><i class="fas fa-search"></i></button>
    </form>
    <thead class="table-primary">
    <tr>
    <th>Name</th>
    <th>Price</th>
    <th>Stock</th>
    <th>Category</th>
    <th>Status</th>
    <th>Action</th>
    </tr>
    </thead>
    <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tbody>
    <td>
<?php echo $name = base64_decode($p->name_products); ?>
    	</td>
    <td>Rp. <?php echo $price = base64_decode($p->price); ?></td>
    <td><?php echo e($p->remaining_products); ?></td>
    <td><?php echo e($p->category_products); ?></td>
    <td><?php echo e($p->status); ?></td>
    <td class="cente">
    <form action="<?php echo e(route('productions.destroy', $p->id)); ?>" method="post"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#update<?php echo e($p->id); ?>"><i class="fas fa-edit left-5"></i></a>
    <a class="btn btn-danger crash-hover" data-toggle="modal" data-target="#deleteData<?php echo e($p->id); ?>"><i class="fas fa-trash-alt"></i></a>
    <!-- Modal -->
<div class="modal fade" id="deleteData<?php echo e($p->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable|modal-dialog-centered modal-sm|modal-lg|modal-xl" role="document">
<div class="modal-content" style="margin-top:50%;">
<div class="modal-body">
        Do you want delete data ?
        <p><button type="submit" class="btn btn-primary">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">No
        </button></p>
</div>
</div>
</div>
</div>
        </form>
         <!-- Modal -->
  <div class="modal fade" id="update<?php echo e($p->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Edit Products</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="post" action="<?php echo e(route('productions.update', $p->id)); ?>"> <?php echo csrf_field(); ?>
                        <div class="form-group col-md-6 float-left">
                        <label class="col-form-label">Name Products</label>
                        <input type="text" name="update_name" value="<?php echo e(base64_decode($p->name_products)); ?>" class="form-control">
                        <label class="col-form-label">Price</label>
                        <input type="text" name="update_price" value="<?php echo e(base64_decode($p->price)); ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-6 float-right">
                        <label class="col-form-label">Remaining</label>
                        <input type="number" name="update_remaining" value="<?php echo e($p->remaining_products); ?>" class="form-control">
                        <label class="col-form-label">Category</label>
                        <select name="update_category" class="form-control">
                                <option value="<?php echo e($p->category_products); ?>" selected><?php echo e($p->category_products); ?></option>
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <option value="<?php echo e($c->name); ?>"><?php echo e($c->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>
                        <label class="col-form-label">Description</label>
                        <textarea type="text" name="update_description" class="form-control"><?php echo e(Crypt::decrypt($p->description_products)); ?></textarea>
                        <button class="btn btn-primary" type="submit" style="margin-top:15px;">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </td>
    </tbody>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\product\resources\views\home\production\manage.blade.php ENDPATH**/ ?>