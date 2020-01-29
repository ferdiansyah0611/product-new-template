<?php $__env->startSection('header'); ?>
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">My Draft Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item"><a href="">Products</a></li>
              <li class="breadcrumb-item active">Draft</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-md-12 card">
  <div class="card-header">Draft</div>
  <div class="card-body">
    <table class="table table-bordered data-table">
    <form>
    <input class="form-group form-control" type="text" name="search" placeholder="Search data articles...">
    <button class="btn btn-secondary button-search" type="submit"><i class="fas fa-search"></i></button>
    </form>
    <thead>
    <tr>
    <th>Name</th>
    <th>Price</th>
    <th>Stock</th>
    <th>Category</th>
    <th>Status</th>
    <th>Action</th>
    </tr>
    </thead>
    <?php $__currentLoopData = $mydraft; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tbody>
    <td>
<?php echo $name = base64_decode($p->name_products); ?>
      </td>
    <td>Rp. <?php echo $price = base64_decode($p->price); ?></td>
    <td><?php echo e($p->remaining_products); ?></td>
    <td><?php echo e($p->category_products); ?></td>
    <td><?php echo e($p->status); ?></td>
    <td style="text-align: center;"><form action="<?php echo e(route('productions.destroy', $p->id)); ?>" method="post"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
    <a href="
    <?php
    $productions = base64_encode($p->name_products);
    echo "/productions/manage/".$p->id."/edit/".$productions;
    ?>
    " class="btn btn-primary">Edit</a>
    <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
    </tbody>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\product\resources\views\home\production\draft.blade.php ENDPATH**/ ?>