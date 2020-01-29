<?php $__env->startSection('content'); ?>
<div class="mx-auto col-md-12 card" style="display:block;text-align:center;">
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $my_cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-xl-3 float-left no-padding">
<?php
$product = DB::table('productions')->where('id', base64_decode($my_cart->production_id))->get();
foreach($product as $prod){
echo "<img src='".$prod->main_pictures."' class='img-col-xl-3'>";
echo "<p class='font-12 left'>Amount : ".$my_cart->amount." units</p>";
echo "<p class='font-12 left'>Rp. ".$my_cart->totals."</p>";
echo "<p><button class='btn btn-primary font-12'>Buy Now</button>";
echo "<button class='btn btn-danger font-12'>Delete Cart</button></p>";
}
?>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\product\resources\views\home\production\cart.blade.php ENDPATH**/ ?>