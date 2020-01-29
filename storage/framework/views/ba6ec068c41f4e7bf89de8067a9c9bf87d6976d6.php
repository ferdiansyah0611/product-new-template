<?php $__env->startSection('css'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
<div class="row mb-2"><!-- /.col -->
  <div class="col-sm-6">
      <h1 class="m-0 text-dark" style="font-size:25px;text-decoration:underline;font-family:PermanentMarker-Regular;"><?php echo e($title); ?></h1>
    </div><!-- /.col -->
          <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item" class="kalam-light"><a style="cursor:pointer" onclick="window.history.back()"><i class="fas fa-chevron-circle-left"></i> Back Pages</a></li>
              </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
      <div class="card shadow">
      <div class="card-header custom-header-card"><?php echo e($search); ?></div>
      <div class="card-body custom-body-card">
            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-xl-3 float-left">
          <div class="wow fadeInDown float-left hover-style" style="animation-duration: 1s;">
              <a style="title-col-xl-3"  href="
              <?php 
              $name = Crypt::encrypt($c->name_products);
              $views = base64_encode($c->name_products);
              echo "/productions/".$c->id."/views/".$name."/".$views;
              ?>"><?php echo e(base64_decode($c->name_products)); ?></a>
              <img src="<?php echo e(asset($c->main_pictures)); ?>" class="img-col-xl-3">
              <div class="card-footer custom-card-footer">
            <!----<button class="float-left btn-secondary"><i class="far fa-thumbs-up">Likes</i></button>
            <button class="btn-secondary"><i class="far fa-comments">Comments</i></button>
            <button class="float-right btn-secondary"><i class="fas fa-external-link-alt">Share</i></button>---->
            <p style="text-align:left;"><i class="fas fa-clock icon-15"></i> <?php echo e(\Carbon\Carbon::parse($c->created_at)->diffForHumans()); ?></p>
            <p style="text-align:left;"><i class="fas fa-tag icon-15"></i> <?php echo e($c->category_products); ?></p>
            <button class="btn btn-primary" style="font-size: 12px;" data-toggle="tooltip" data-placement="bottom" title="Buy Now">Price $<?php echo e(base64_decode($c->price)); ?></button>
            <button class="btn btn-danger" style="font-size: 12px;" data-toggle="tooltip" data-placement="bottom" title="Stock Products">Remaining <?php echo e($c->remaining_products); ?></button>
          </div>
          </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php echo e($category->links()); ?>

      </div>
      </div>
     
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
$.ajax
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\product\resources\views\home\production\category.blade.php ENDPATH**/ ?>