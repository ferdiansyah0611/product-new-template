 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
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
        <ul class="navbar-nav ml-auto"><?php if(auth()->guard()->check()): ?>
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
                <i class="fas fa-envelope mr-2"></i> <?php
                $notif_messages = DB::table('messages')->where('to', Auth()->user()->email)->where('status', 0)->pluck('count')->count();
              echo $notif_messages;
            ?> new messages
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
            <a href="<?php echo e(route('productions.viewcart')); ?>" class="nav-link"><i class="fas fa-cart-plus"></i>
<span class="badge badge-warning navbar-badge"><?php echo $cart = DB::table('carts')->where('user_id', Auth()->user()->id)->sum('count');?></span>
            </a>
          </li>
          <?php endif; ?>
          <?php if(auth()->guard()->guest()): ?>
          <li class="nav-item">
          <a href="<?php echo e(url('/login')); ?>" class="nav-link">Login</a>
          </li>
          <li class="nav-item">
          <a href="<?php echo e(url('/register')); ?>" class="nav-link">Registration</a>
          </li>
          <?php endif; ?>
        </ul>
      </nav>
      <!-- /.navbar --><?php /**PATH C:\wamp64\www\product2\resources\views/layouts/templateNavbar.blade.php ENDPATH**/ ?>