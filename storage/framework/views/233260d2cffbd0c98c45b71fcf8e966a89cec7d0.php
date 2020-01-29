<?php $__env->startSection('content'); ?>
<?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($p->id == auth()->user()->id): ?>
<script type="text/javascript">location.href = '/404';</script>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<div class="col-md-12 card">
	<div class="card-header">Create My Profiles</div>
	<div class="card-body">
		<form method="post" action="<?php echo e(route('profile.store')); ?>" enctype="multipart/form-data"><?php echo csrf_field(); ?>
			<input type="hidden" name="profile_create" value="<?php echo e(auth()->user()->id); ?>">
		<div class="form-group col-xl-6 float-left">
			<input class="form-control" placeholder="name" type="text" name="name">
			<input class="form-control" placeholder="email" type="text" name="email">
			<select name="status" class="custom-select">
  				<option selected>None</option>
  				<option value="Single" required>Single</option>
  				<option value="Have girlfriends" required>Have girlfriends</option>
  				<option value="Have boyfriends" required>Have boyfriends</option>
			</select>
			<select name="last_study" class="custom-select">
  				<option selected>College</option>
  				<option value="Vocation School" required>Vocation School</option>
  				<option value="High School" required>High School</option>
  				<option value="Middle School" required>Middle School</option>
  				<option value="Elementary School" required>Elementary School</option>
			</select>
			<input class="form-control" placeholder="identity_card" type="number" name="identity_card">
			<input class="form-control" placeholder="debit_card" type="number" name="debit_card">
		</div>
		<div class="form-group col-xl-6 float-right">
			<input class="form-control" placeholder="number" type="number" name="number">
			<input class="form-control" placeholder="hbd" type="date" name="hbd">
			<input class="form-control" placeholder="description" type="text" name="description" maxlength="255">
			<input class="form-control" placeholder="locate" type="text" name="locate">
		<div class="input-group mb-3">
        	<div class="input-group-prepend">
          	<span class="input-group-text" id="inputGroupFileAddon02">Pictures 1</span>
        	</div>
        	<div class="custom-file">
          	<input type="file" name="avatars" accept="image/*" class="custom-file-input" required>
          	<label class="custom-file-label">Choose images file</label>
        	</div>
      	</div>
			</div>
		<button type="submit">Create Profile</button>
		</form>
	</div><!--./cardbody-->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\product\resources\views\home\profile\create.blade.php ENDPATH**/ ?>