<!DOCTYPE html>
<html>
<head>
	<title>Erros</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo e(asset('/vendor/template/plugins/fontawesome-free/css/all.min.css')); ?>">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo e(asset('/vendor/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
	<link href="https://fonts.googleapis.com/css?family=Baloo+Bhai&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo e(asset('/vendor/template/dist/css/adminlte.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/vendor/multi-theme/src/css/application.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/vendor/animate/animate.min.css')); ?>">
<link rel="icon" type="image/x-icon" href="<?php echo e(asset('/vendor/icon/favicon.ico')); ?>">

<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo e(asset('/vendor/icon/simple-celtic-knot-152-267423.png')); ?>">

<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo e(asset('/vendor/icon/simple-celtic-knot-144-267423.png')); ?>">

<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo e(asset('/vendor/icon/simple-celtic-knot-120-267423.png')); ?>">

<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo e(asset('/vendor/icon/simple-celtic-knot-114-267423.png')); ?>">

<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo e(asset('/vendor/icon/simple-celtic-knot-72-267423.png')); ?>">

<link rel="apple-touch-icon-precomposed" href="<?php echo e(asset('/vendor/icon/simple-celtic-knot-57-267423.png')); ?>">

<link rel="icon" href="<?php echo e(asset('/vendor/icon/simple-celtic-knot-32-267423.png')); ?>" sizes="32x32">
	<style type="text/css">.daterangepicker{display: none !important;}
.left-icon{margin-left: 15px;}
</style>
	<?php echo $__env->yieldContent('css'); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php if($message = Session::get('success')): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed;top: 65px;right: 10px;z-index: 100;">
  <?php echo e($message); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif; ?>
<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed;top: 70px;right: 15px;z-index: 100;">
    <strong>Whoops!</strong> There were some problems with your input.
    <ul><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div><?php endif; ?>

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="font-family: 'Baloo Bhai', cursive;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" action="<?php echo e(url('/productions/for')); ?>" method="get">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo e(asset('/vendor/template/dist/img/user1-128x128.jpg')); ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo e(asset('/vendor/template/dist/img/user8-128x128.jpg')); ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo e(asset('/vendor/template/dist/img/user3-128x128.jpg')); ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
   <?php echo $__env->make('layouts.templateAside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <?php echo $__env->yieldContent('header'); ?>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        	<?php echo $__env->yieldContent('content'); ?>
          
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2018-2019 <a href="">My Products</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!--------------script--------------------------->
<script type="text/javascript" src="<?php echo e(asset('/vendor/animate/wow.min.js')); ?>"></script>
<script>
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();
  </script>
<script src="<?php echo e(asset('/vendor/template/plugins/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('/vendor/template/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
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
<?php echo $__env->yieldContent('js'); ?>
</body>
</html><?php /**PATH C:\wamp64\www\product2\resources\views/layouts/errors_template.blade.php ENDPATH**/ ?>