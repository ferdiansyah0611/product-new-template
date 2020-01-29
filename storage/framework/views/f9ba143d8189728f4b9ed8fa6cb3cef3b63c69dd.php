<?php $__env->startSection('content'); ?>
<div class="col-xl-8 mx-auto card">
<div class="card-header"><?php echo e($profile->name); ?></div>
	<div class="card-body">
	<div class="col-xl-12" style="text-align: center;">
		<img src="<?php echo e(asset($profile->avatars)); ?>" class="img-fluid" style="border-radius: 50%;height: 230px;">
	</div>
	<div class="col-xl-6 float-left">
		<p style="font-weight: bolder;padding-top: 15px;">ID User</p>
		<div class="dropdown-divider"></div>
		<p style="font-weight: bolder;">Long Name</p>
		<div class="dropdown-divider"></div>
		<p style="font-weight: bolder;">Email</p>
		<div class="dropdown-divider"></div>
		<p style="font-weight: bolder;">Born</p>
		<div class="dropdown-divider"></div>
		<p style="font-weight: bolder;">Number Phone</p>
		<div class="dropdown-divider"></div>
		<p style="font-weight: bolder;">Last Study</p>
		<div class="dropdown-divider"></div>
		<p style="font-weight: bolder;">Status</p>
		<div class="dropdown-divider"></div>
		<p style="font-weight: bolder;">Locations</p>
		<div class="dropdown-divider"></div>
	</div>
	<div class="col-xl-6 float-right">
		<p style="padding-top: 15px;">: <?php echo e($profile->id); ?></p>
		<div class="dropdown-divider"></div>
		<p>: <?php echo e($profile->name); ?></p>
		<div class="dropdown-divider"></div>
		<p>: <?php echo e($profile->email); ?></p>
		<div class="dropdown-divider"></div>
		<p>: <?php echo e($profile->hbd); ?></p>
		<div class="dropdown-divider"></div>
		<p>: <?php echo e($profile->number); ?></p>
		<div class="dropdown-divider"></div>
		<p>: <?php echo e($profile->last_study); ?></p>
		<div class="dropdown-divider"></div>
		<p>: <?php echo e($profile->status); ?></p>
		<div class="dropdown-divider"></div>
		<p>: <?php echo e($profile->locate); ?> <span class="badge badge-primary">Search for google maps</span></p>
		<div class="dropdown-divider"></div>
	</div>
	<div class="col-xl-12" style="text-align:center;">
		<button class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="My likers" type="submit"><?php echo e($likers); ?> Likes</button>
		<button class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Totals favorite products">0 Favorite Products</button>
	<button class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Click to reports">Reports</button>

	</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\product\resources\views\home\profile\me.blade.php ENDPATH**/ ?>