<?php $__env->startSection('css'); ?>
<style>
.hover-card:hover{box-shadow: -18px -14px 1px rgba(191, 204, 204, 0.35), 0 4px 30px rgba(109, 187, 176, 0.94);transition: all 2s;margin-top: -15px;}
</style> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
<div class="row justify-content-center">
  <div class="col-md-8">
  <div class="card hover-card">
  <div class="card-header">New Messages</div>
    <div class="card-body">
      <form action="<?php echo e(route('messages.store')); ?>" method="post"><?php echo csrf_field(); ?>
        <div class="form-row">
          <input type="text" value="<?php echo e(auth()->user()->id); ?>" name="user_id" style="display: none;">
          <div class="form-group col-md-6">
            <label class="col-form-label">From</label>
            <input type="text" name="from" class="form-control" value="<?php echo e(auth()->user()->email); ?>" readonly required>
          </div>
          <div class="form-group col-md-6">
            <label class="col-form-label">To</label>
            <input type="text" name="to" class="form-control" placeholder="Type to mail sends">
          </div>
        </div>
        <label class="col-form-label">Subjects</label>
        <input class="form-control" name="subjects" placeholder="Type here to subjects">
        <label class="col-form-label">Messages</label>
        <textarea class="form-control" name="sendmessages" maxlength="1024" placeholder="Type here to messages"></textarea>
      <button class="btn btn-primary" style="margin-top: 10px;" type="submit">Sends</button>
      </form>  
    </div>
  </div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\product2\resources\views/home/messages/new.blade.php ENDPATH**/ ?>