<?php $__env->startSection('css'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style type="text/css">
.hover-style:hover{box-shadow: -8px 9px 20px 2px #6d666685;transition: all 2s;margin-top: -10px;}
.black-color{color:black !important;}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
<div class="row mb-2"><!-- /.col -->
  <div class="col-sm-6">
      <h1 class="m-0 text-dark" style="font-size:25px;text-decoration:underline;font-family:PermanentMarker-Regular;">Home Page</h1>
    </div><!-- /.col -->
          <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item" style="font-family:Kalam-Light;"><a style="cursor:pointer" onclick="window.history.back()"><i class="fas fa-chevron-circle-left"></i> Back Pages</a></li>
              </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(auth()->guard()->check()): ?>
<?php if(Auth()->user()->debit_card == Null): ?>
<script type="text/javascript">location.href = '/settings/accounts';</script>
<?php else: ?>
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
          <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="card shadow">
      <div class="card-header custom-header-card"> <?php echo e($c->name); ?> <span class="float-right">
        <form action="<?php echo e(route('productions.category')); ?>">
            <input type="hidden" value="<?php echo e($c->name); ?>" name="category">
        <button type="submit" class="btn-outline-primary" style="font-size:12px;">More Products...</button>
        </form>
      </span></div>
      <div class="card-body custom-body-card">
          <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($content->category_products == $c->name): ?>
          <div class="col-xl-3 float-left">
          <div class="wow fadeInDown float-left hover-style" data-wow-duration="1s">
              <a class="title-col-xl-3"  href="
              <?php 
              $name = Crypt::encrypt($content->name_products);
              $views = base64_encode($content->name_products);
              echo "/productions/".$content->id."/views/".$name."/".$views;
              ?>"><?php echo e(base64_decode($content->name_products)); ?></a>
              <img src="<?php echo e(asset($content->main_pictures)); ?>" class="img-col-xl-3">
              <div class="card-footer custom-card-footer">
            <!----<button class="float-left btn-secondary"><i class="far fa-thumbs-up">Likes</i></button>
            <button class="btn-secondary"><i class="far fa-comments">Comments</i></button>
            <button class="float-right btn-secondary"><i class="fas fa-external-link-alt">Share</i></button>---->
            <p class="left"><i class="fas fa-clock" class="icon-15"></i> <?php echo e($content->created_at->diffForHumans()); ?></p>
            <p class="left"><i class="fas fa-tag" class="icon-15"></i> <?php echo e($content->category_products); ?></p>
            <?php if($content->remaining_products > 0): ?>
            
              <?php if(Auth()->user()->saldo < $content->price): ?>
              <button class="btn btn-primary font-12" data-placement="bottom" title="Can't buy because your saldo is not enough" data-toggle="tooltip" style="text-decoration: line-through;">Rp. <?php echo e($content->price); ?></button>
              <?php endif; ?>
              <?php if(Auth()->user()->saldo > $content->price): ?>
              <button class="btn btn-primary font-12" data-placement="bottom" title="Buy Now" data-toggle="modal" data-target="#BuyProducts<?php echo e($content->id); ?>">Rp. <?php echo e($content->price); ?></button>
              <button class="btn btn-danger font-12" data-toggle="tooltip" data-placement="bottom" title="Stock Products">Remaining <?php echo e($content->remaining_products); ?></button>
              <?php endif; ?>
            <?php endif; ?>
            <?php if($content->remaining_products == 0): ?>
              <?php if(Auth()->user()->saldo < 0): ?>
              <button class="btn btn-primary font-12" data-placement="bottom" title="Can't buy because your saldo is not enough and sold out" data-toggle="tooltip" style="text-decoration: line-through;">Rp. <?php echo e($content->price); ?></button>
              <?php endif; ?>
              <?php if(Auth()->user()->saldo > 0): ?>
              <button class="btn btn-primary font-12" data-placement="bottom" title="Sold Out" data-toggle="tooltip" style="text-decoration: line-through;">Rp. <?php echo e($content->price); ?></button>
              <?php endif; ?>
            <?php endif; ?>
          </div>
          </div>
          </div>
          <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div><!--./card-body-->
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
</div>

<?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- Modal -->
<div class="modal fade" id="BuyProducts<?php echo e($content->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable|modal-dialog-centered modal-sm|modal-lg|modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Buy <?php echo e(base64_decode($content->name_products)); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo e(route('productions.buy', $content->id)); ?>" method="POST"><?php echo csrf_field(); ?>
          <input type="hidden" name="buy_products" value="<?php echo e($content->id); ?>">
          <input type="hidden" name="price" value="<?php echo e($content->price); ?>">
          <input type="hidden" name="stock" value="<?php echo e($content->remaining_products); ?>">
          <input type="number" name="remaining" maxlength="1" class="form-control" data-toggle="tooltip" title="How many buy ?" data-placement="right">
          <button type="submit" class="btn btn-outline-primary" name="buy">Buy Now</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php endif; ?>

<?php if(auth()->guard()->guest()): ?>
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
          <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="card" style="box-shadow: -5px 4px 3px 4px #b9b9b9;">
      <div class="card-header" style="font-family:Cinzel-Bold;border-left: 15px solid #8577f3;
      margin-top: -15px;background: linear-gradient(45deg, #54d4da, #e400ff);"> <?php echo e($c->name); ?> <span class="float-right">
        <form action="<?php echo e(route('productions.category')); ?>">
            <input type="hidden" value="<?php echo e($c->name); ?>" name="category">
        <button type="submit" class="btn-outline-primary" style="font-size:12px;">More Products...</button>
        </form>
      </span></div>
      <div class="card-body" style="font-family:Cinzel-Reqular;max-width:100%;min-width:100%;overflow:auto;position:relative;display:flex;flex-wrap: wrap;">
          <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($content->category_products == $c->name): ?>
          <div class="col-xl-3 float-left">
          <div class="wow fadeInDown float-left hover-style" style="animation-duration: 1s;">
              <a style="font-size: 13px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;width: 250px;color:black !important;"  href="
              <?php 
              $name = Crypt::encrypt($content->name_products);
              $views = base64_encode($content->name_products);
              echo "/productions/".$content->id."/views/".$name."/".$views;
              ?>"><?php echo e(base64_decode($content->name_products)); ?></a>
              <img src="<?php echo e(asset($content->main_pictures)); ?>" style="width: 100%;height: 200px;">
              <div class="card-footer" style="text-align: center;font-size: 11px;background: none;">
            <!----<button class="float-left btn-secondary"><i class="far fa-thumbs-up">Likes</i></button>
            <button class="btn-secondary"><i class="far fa-comments">Comments</i></button>
            <button class="float-right btn-secondary"><i class="fas fa-external-link-alt">Share</i></button>---->
            <p style="text-align:left;"><i class="fas fa-clock" style="font-size:15px;"></i> <?php echo e($content->created_at->diffForHumans()); ?></p>
            <p style="text-align:left;"><i class="fas fa-tag" style="font-size:15px;"></i> <?php echo e($content->category_products); ?></p>
            <button class="btn btn-primary" style="font-size: 12px;" data-placement="bottom" title="Can't buy because your as guest account" data-toggle="tooltip">Price $<?php echo e($content->price); ?></button>
            <button class="btn btn-danger" style="font-size: 12px;" data-toggle="tooltip" data-placement="bottom" title="Stock Products">Favorite</button>
          </div>
          </div>
          </div>
          <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div><!--./card-body-->
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\product\resources\views\home\production\index.blade.php ENDPATH**/ ?>