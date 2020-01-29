<?php $__env->startSection('content'); ?>
<div class="card col-md-8 mx-auto">
    <?php $__currentLoopData = $profile_user_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($profile->avatars == true): ?>
<img class="card-img-top mx-auto" src="<?php echo e(asset($profile->avatars)); ?>" alt="" style="border-radius: 50%;height: 230px;width:60%;">
    <?php endif; ?>
    <div class="card-body">
    <form method="post" action="<?php echo e(route('setting.update', $profile->id)); ?>" enctype="multipart/form-data"><?php echo csrf_field(); ?>
        <input type="hidden" name="profile_create" value="<?php echo e(auth()->user()->id); ?>">
    <div class="form-group col-xl-6 float-left">
        <label class="col-form-label col-md-12">Name</label>
        <label class="col-form-label col-md-12">Email</label>
        <label class="col-form-label col-md-12">Status</label>
        <label class="col-form-label col-md-12">Last Study</label>
        <label class="col-form-label col-md-12">Identity Card</label>
        <label class="col-form-label col-md-12">Debit Card</label>
        <label class="col-form-label col-md-12">Number Phone</label>
        <label class="col-form-label col-md-12">Date Born</label>
        <label class="col-form-label col-md-12">Description</label>
        <label class="col-form-label col-md-12">Location</label>
        <label class="col-form-label col-md-12">Photo Profiles</label>
    </div>
    <div class="form-group col-xl-6 float-right">
            <input class="form-control" placeholder="name" type="text" name="name" value="<?php echo e($profile->name); ?>">
            <input class="form-control" placeholder="email" type="text" name="email" value="<?php echo e($profile->email); ?>">
            <select name="status" class="custom-select">
                  <option value="<?php echo e($profile->status); ?>" selected>None</option>
                  <option value="Single" required>Single</option>
                  <option value="Have girlfriends" required>Have girlfriends</option>
                  <option value="Have boyfriends" required>Have boyfriends</option>
            </select>
            <select name="last_study" class="custom-select">
                  <option value="<?php echo e($profile->last_study); ?>" selected><?php echo e($profile->last_study); ?></option>
                  <option value="College">College</option>
                  <option value="Vocation School" required>Vocation School</option>
                  <option value="High School" required>High School</option>
                  <option value="Middle School" required>Middle School</option>
                  <option value="Elementary School" required>Elementary School</option>
            </select>
            <input value="<?php echo e($profile->identity_card); ?>" class="form-control" placeholder="identity_card" type="number" name="identity_card">
            <input value="<?php echo e($profile->debit_card); ?>" class="form-control" placeholder="debit_card" type="number" name="debit_card">
        <input value="<?php echo e($profile->number); ?>" class="form-control" placeholder="number" type="number" name="number">
        <input value="<?php echo e($profile->born); ?>" class="form-control" placeholder="hbd" type="date" name="born">
        <input value="<?php echo e($profile->description); ?>" class="form-control" placeholder="description" type="text" name="description" maxlength="255">
        <input value="<?php echo e($profile->locate); ?>" class="form-control" placeholder="locate" type="text" name="locate">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon02"><i class="fas fa-camera"></i> Pictures 1</span>
        </div>
        <div class="custom-file">
          <input type="file" name="avatars" accept="image/*" class="custom-file-input">
          <label class="custom-file-label">Choose images file</label>
        </div>
      </div>
        </div>
    <button class="btn btn-primary" type="submit">Create Profile</button>
    </form>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\product\resources\views\home\settings\account.blade.php ENDPATH**/ ?>