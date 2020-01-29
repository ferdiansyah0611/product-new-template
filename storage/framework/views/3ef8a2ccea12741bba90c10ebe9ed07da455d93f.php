<?php $__env->startSection('content'); ?>
<?php if($search == true): ?>
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
      <div class="card">
      <div class="card-header">Searching for <?php echo $searching = base64_decode($search); ?> ...</div>
      <div class="card-body">
<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($p->name_products == true): ?>
      <div class="wow fadeInDown col-md-3 float-left" style="animation-duration: 1.5s;">
      <a  href="
      <?php 
      $name = Crypt::encrypt($p->name_products);
      $views = base64_encode($p->name_products);
      echo "/productions/".$p->id."/views/".$name."/".$views;
      ?>"><?php echo e(base64_decode($p->name_products)); ?></a>
      <img src="<?php echo e(asset($p->main_pictures)); ?>" style="width: 100%;height: 200px;">
      <div class="card-footer" style="text-align: center;font-size: 11px;background: none;">
    <!----<button class="float-left btn-secondary"><i class="far fa-thumbs-up">Likes</i></button>
    <button class="btn-secondary"><i class="far fa-comments">Comments</i></button>
    <button class="float-right btn-secondary"><i class="fas fa-external-link-alt">Share</i></button>---->
    <?php if($p->remaining_products > 0): ?>
            <button class="btn btn-primary" style="font-size: 12px;" data-placement="bottom" title="Buy Now" data-toggle="modal" data-target="#BuyProducts<?php echo e($p->id); ?>">Price $<?php echo e(base64_decode($p->price)); ?></button>
            <?php endif; ?>
            <?php if($p->remaining_products == 0): ?>
            <button class="btn btn-primary" style="font-size: 12px;" data-placement="bottom" title="Can't buy because remaining is 0" data-toggle="tooltip">Price $<?php echo e(base64_decode($p->price)); ?></button>
            <?php endif; ?>
    <button class="btn btn-danger" style="font-size: 12px;" data-toggle="tooltip" data-placement="top" title="Stock Products">Remaining <?php echo e($p->remaining_products); ?></button>
  </div>
      </div>
      <?php endif; ?>
      <?php if($p->name_products == false): ?>
      not
      <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      </div>
      </div>
    </div>
</div>
<?php endif; ?>
<?php if($search == false): ?>
Not
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\product\resources\views\home\production\search.blade.php ENDPATH**/ ?>