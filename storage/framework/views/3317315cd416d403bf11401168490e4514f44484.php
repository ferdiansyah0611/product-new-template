<?php $__env->startSection('content'); ?>
<div class="mx-auto">
	<div class="card col-md-12">
		<div class="card-header">Recharge Balance</div>
		<div class="card-body">
			<form action="<?php echo e(route('production.isisaldo')); ?>" method="POST"><?php echo csrf_field(); ?>
				<input type="text" name="number" class="form-control" placeholder="Keywords your code">
				<button class="btn btn-primary w-100" style="margin-top: 10px;" type="submit">Check</button>
			</form>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\product\resources\views\home\purchase\topup.blade.php ENDPATH**/ ?>