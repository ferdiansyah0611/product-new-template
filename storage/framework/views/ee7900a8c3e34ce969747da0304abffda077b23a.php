<!DOCTYPE html>
<html>
<head><?php if(auth()->guard()->check()): ?>
<title><?php echo e($title); ?></title><?php endif; ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="10800;url=<?php echo e(url('/login')); ?>">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<!--if use internet
<link href="https://pagecdn.io/lib/font-awesome/5.12.0-1/css/all.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->

<link rel="stylesheet" href="<?php echo e(asset('/vendor/template/plugins/fontawesome-free/css/all.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/vendor/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
<link href="https://fonts.googleapis.com/css?family=Baloo+Bhai&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(asset('/vendor/template/dist/css/adminlte.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/vendor/multi-theme/src/css/application.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/vendor/animate/animate.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/responsive.css')); ?>">
<!--Icons-->
<link rel="icon" type="image/x-icon" href="<?php echo e(asset('/vendor/icon/favicon.ico')); ?>">
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo e(asset('/vendor/icon/simple-celtic-knot-152-267423.png')); ?>">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo e(asset('/vendor/icon/simple-celtic-knot-144-267423.png')); ?>">
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo e(asset('/vendor/icon/simple-celtic-knot-120-267423.png')); ?>">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo e(asset('/vendor/icon/simple-celtic-knot-114-267423.png')); ?>">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo e(asset('/vendor/icon/simple-celtic-knot-72-267423.png')); ?>">
<link rel="apple-touch-icon-precomposed" href="<?php echo e(asset('/vendor/icon/simple-celtic-knot-57-267423.png')); ?>">
<link rel="icon" href="<?php echo e(asset('/vendor/icon/simple-celtic-knot-32-267423.png')); ?>" sizes="32x32">
	<?php echo $__env->yieldContent('css'); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<?php if($message = Session::get('success')): ?>
<div class="alert alert-danger wow slideInLeft alert-dismissible fade show" role="alert" id="alert-success" data-wow-duration="2s">
  <?php echo e($message); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif; ?>
<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert-errors">
    <strong>Whoops!</strong> There were some problems with your input.
    <ul><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div><?php endif; ?>

<div class="wrapper">
<?php echo $__env->make('layouts.templateNavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.templateAside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <?php echo $__env->yieldContent('header'); ?>
    </div>
  </div><!-- /.content-header -->
<section class="content" style="padding:0;">
<div class="container-fluid">
  <div class="row">
    <div id="app">
    <app></app>
</div>
  <?php echo $__env->yieldContent('content'); ?>
  </div><!-- /.row -->   
</div><!-- /.container-fluid -->
</section><!-- /.content -->
<button class="btn btn-danger" id="myBtn" onclick="topFunction()"><i class="fas fa-arrow-alt-circle-up"></i></button>
</div><!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="col-xl-6 float-left">
    <p><a href="<?php echo e(route('about.disclaimer')); ?>" class="footer-link" data-toggle="tooltip" data-placement="right" title="View Disclaimer...">Disclaimer</a></p>
    <p><a href="<?php echo e(route('about.programming')); ?>" class="footer-link" data-toggle="tooltip" data-placement="right" title="View Programming...">Programming</a></p> 
    </div>
    <div class="col-xl-6 float-left">
    <p><a href="<?php echo e(route('about.privacy')); ?>" class="footer-link" data-toggle="tooltip" data-placement="right" title="View Privacy & Policy...">Privacy & Policy</a></p>
    <p><a href="<?php echo e(route('about.community')); ?>" class="footer-link" data-toggle="tooltip" data-placement="right" title="View Community...">Community</a></p>
    </div>
    <strong class="cinzel-bold">Copyright &copy; 2020.</strong>
    <span class="cinzel-bold">All rights reserved.</span>
  </footer>
</div>
<!-- ./wrapper -->

<!--------------script--------------------------->
<script type="text/javascript" src="<?php echo e(asset('/vendor/animate/wow.min.js')); ?>"></script>
<script>
    wow = new WOW(
    );
    wow.init();
  </script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="<?php echo e(asset('/vendor/template/plugins/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('/vendor/template/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script>
mybutton = document.getElementById("myBtn");
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}</script>
<script src="<?php echo e(asset('/vendor/template/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('/vendor/template/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<script src="<?php echo e(asset('/vendor/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
<script src="<?php echo e(asset('/vendor/template/dist/js/adminlte.js')); ?>"></script>
<script src="<?php echo e(asset('/vendor/template/dist/js/demo.js')); ?>"></script>
<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<!-- ChartJS -->
<script src="<?php echo e(asset('vendor/template/plugins/chart.js/Chart.min.js')); ?>"></script>
<?php echo $__env->yieldContent('js'); ?>
</body>
<?php echo $__env->yieldContent('ajax'); ?>
</html><?php /**PATH C:\wamp64\www\product\resources\views\layouts\template.blade.php ENDPATH**/ ?>