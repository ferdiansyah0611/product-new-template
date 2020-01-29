<?php $__env->startSection('header'); ?>
<div class="row mb-2"><!-- /.col -->
  <div class="col-sm-6">
      <h1 class="m-0 text-dark" style="font-size:25px;text-decoration:underline;font-family:PermanentMarker-Regular;">Dashboard</h1>
    </div><!-- /.col -->
          <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item" style="font-family:Kalam-Light;"><a style="cursor:pointer" onclick="window.history.back()"><i class="fas fa-chevron-circle-left"></i> Back Pages</a></li>
              </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">CPU Traffic</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number"><?php echo e($likers); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
</div>
<!-- /.col -->
<!-- fix for small devices only -->
<div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">My Products</span>
                <span class="info-box-number"><?php $count = DB::table('productions')->where('user_id', Auth::user()->id)->pluck('count')->count(); echo $count; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number"><?php echo e($count_users); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
<div class="row col-xl-12">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Monthly Recap Report</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Change Date</a>
                      <a href="#" class="dropdown-item">Reset data</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Sales: 1 Jan, 2019 - 30 Jul, 2019</strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Goal Completion</strong>
                    </p>

                    <div class="progress-group">
                      Add Products to Cart
                      <span class="float-right"><b><?php echo $count = DB::table('carts')->where('user_id', Auth()->user()->id)->count('count');?></b>/200</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 10%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Complete Purchase
                      <span class="float-right"><b><?php echo $count = DB::table('purchases')->where('user_id', Auth()->user()->id)->count('count');?></b>/400</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 75%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Visitors</span>
                      <span class="float-right"><b>480</b>/800</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 60%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Direct Chat
                      <span class="float-right"><b><?php echo $chat = DB::table('messages')->where('to', Auth()->user()->email)->sum('count');?></b>/500</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <?php
                      $purchase = "ok";
                      $count = DB::table('productions')->where('user_id', Auth()->user()->id)->count('count');
                      if($count < '4'){
                        echo "<span class='description-percentage text-danger'><i class='fas fa-caret-down'></i> 1%</span>";
                      }
                      elseif($count < '8'){
                        echo "<span class='description-percentage text-success'><i class='fas fa-caret-up'></i> 2%</span>";
                      }
                      ?>
                      <h5 class="description-header">Rp. <?php echo $sales = DB::table('productions')->where('user_id', Auth()->user()->id)->sum('price');?></h5>
                      <span class="description-text">TOTAL SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <?php
                      $purchase = "ok";
                      $count = DB::table('purchases')->where('user_id', Auth()->user()->id)->count('count');//max400
                      if($count < '4'){
                        echo "<span class='description-percentage text-danger'><i class='fas fa-caret-down'></i> 1%</span>";
                      }
                      elseif($count < '8'){
                        echo "<span class='description-percentage text-success'><i class='fas fa-caret-up'></i> 2%</span>";
                      }
                      ?>
                      <h5 class="description-header">Rp. <?php echo $count = DB::table('purchases')->where('user_id', Auth()->user()->id)->sum('totals');?></h5>
                      <span class="description-text">TOTAL PURCHASE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                      <h5 class="description-header">
                      Rp. <?php $profits = DB::table('productions')->where('user_id', Auth()->user()->id)->sum('profits');
                      $data_pro = DB::table('productions')->where('user_id', Auth()->user()->id)->get();
                      foreach($data_pro as $data){
                        echo $profits * $data->sold_out;
                      }
                      ?></h5>
                      <span class="description-text">TOTAL PROFIT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                      <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">GOAL COMPLETIONS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
  <div class="col-md-6">
  <div class="card bg-gradient-info font-12">
      <div class="card-header border-0">
        <h3 class="card-title">
          <i class="fas fa-th mr-1"></i>Category
        </h3>
        <div class="card-tools">
          <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse"><i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn bg-info btn-sm" data-card-widget="remove"><i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
      <!--table--->
      <table class="table table-bordered data-table">
              <thead>
              <tr>
              <th>Name</th>
              <th>Created</th>
              <th>Action</th>
              </tr>
              </thead>
              <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tbody>
              <td><?php echo e($p->name); ?></td>
              <td><?php echo e($p->created_at->diffForHumans()); ?></td>
              <td style="text-align: center;">
              <form action="<?php echo e(route('dashboard.deletecategory', $p->id)); ?>" method="post"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
              <a href="<?php echo e(route('dashboard.editcategory', $p->id)); ?>

              " class="btn btn-primary font-12">Edit</a>
              <a style="color: white;cursor: pointer;" class="btn btn-danger font-12" data-toggle="modal" data-target="#deleteData<?php echo e($p->id); ?>">Delete</a>
              <!-- Modal -->
          <div class="modal fade" id="deleteData<?php echo e($p->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable|modal-dialog-centered modal-sm|modal-lg|modal-xl" role="document">
          <div class="modal-content" style="margin-top:50%;">
          <div class="modal-body" style="color:black;">
                  Do you want delete data ?
                  <p><button type="submit" class="btn btn-primary">Yes</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">No
                  </button></p>
          </div>
          </div>
          </div>
          </div>
                  </form>
              </td>
              </tbody>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </table>
        </div>
      </div><!-- /.card-body -->
      <div class="card-footer bg-transparent">
        <form method="post" action="<?php echo e(route('dashboard.newcategory')); ?>"><?php echo csrf_field(); ?>
          <div class="col-xl-12 text-center float-left">
            <input type="text" name="create_category" class="form-control col-xl-4 float-left" data-readonly="true" data-fgColor="#39CCCC" style="width:100%;" placeholder="Name Category">
            <select name="display" class="custom-select col-xl-4 float-left" data-toggle="tooltip" data-placement="right" title="Display Index">
                                  <option value="show" selected>Show</option>
                                  <option value="hide">Hide</option>
                          </select>
                          <button type="submit" class="btn btn-primary col-xl-4 float-left">Added</button>
          </div><!-- ./col -->
            
          </form>
      </div>
                <!-- /.card-footer -->
  </div><!-- /.card --><!-- /.Left col -->
  <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Latest Members</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger">8 New Members</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li>
                        <?php if($user->avatars == true): ?>
                        <img class="col-xl-3" src="<?php echo e(asset($user->avatars)); ?>" alt="User Image" style="height: 114px;">
                        <?php endif; ?>
                        <?php if($user->avatars == null): ?>
                        <img class="col-xl-3" src="<?php echo e(asset('user-default.png')); ?>" alt="User Image" style="height: 114px;">
                        <?php endif; ?>
                        <a class="users-list-name" href="#"><?php echo e($user->name); ?></a>
                        <span class="users-list-date"><?php echo e(Carbon\Carbon::parse($user->created_at)->diffForHumans()); ?></span>
                      </li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="javascript::">View All Users</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
  </div>
  <!--Notif-->
  <div class="col-md-6">
    <div class="card bg-gradient-primary">
          <div class="card-header border-0">
            <h3 class="card-title">
              <i class="far fa-bell mr-1"></i>All Notification
            </h3>
            <div class="card-tools">
              <button type="button" class="btn bg-primary btn-sm" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn bg-primary btn-sm" data-card-widget="remove"><i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
          <?php if(auth()->user()->role == 2): ?>
          <?php $__currentLoopData = $notification_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <p id="notif_delete<?php echo e($notif->id); ?>" style="font-size:12px;margin-top:-10px;"><?php echo e($notif->notification); ?>. <?php echo e($notif->created_at->diffForHumans()); ?> 
            <button class="btn-danger" onclick="document.getElementById('notif_delete<?php echo e($notif->id); ?>').style.display = 'none';"><i class="fas fa-trash"></i></button></p>
          
          
          
          
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <form action="<?php echo e(route('dashboard.deleteallnotification')); ?>" method="POST"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
          <p><button class="btn btn-danger">Delete All</button>
          <?php echo e($notification_products->links()); ?></p>
          </form>
          <?php endif; ?>
          </div><!-- /.card-body -->
    </div><!-- /.card notif-->
    <?php if(Auth()->user()->role == '2'): ?>
    <div class="card bg-gradient-info">
    <div class="card-header border-0">
      <h3 class="card-title">
        <i class="fas fa-th mr-1"></i>Saldo Randoms
      </h3>
      <div class="card-tools">
        <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn bg-info btn-sm" data-card-widget="remove"><i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <form action="<?php echo e(route('dashboard.randomsaldo')); ?>" method="POST"><?php echo csrf_field(); ?>
        <input type="number" name="saldo" class="form-control col-xl-6 float-left" placeholder="Input number in money...">
        <input type="date" name="expired" class="form-control col-xl-6 float-left">
        <button type="submit" class="btn btn-primary col-xl-12">New</button>
      </form>
    </div><!-- /.card-body -->
    </div><!-- /.card -->
    <?php endif; ?>
    <!-- TABLE: LATEST ORDERS -->
    <div class="card" style="font-size: 12px;">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Purchase ID</th>
                      <th>Products</th>
                      <th>Status</th>
                      <th>Locate</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $pu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><a href="pages/examples/invoice.html"><?php echo e($purchase->purchase_id); ?></a></td>
                      <td>
                        <?php
                        $data_pro = App\Models\Production::where('id',$purchase->production_id)->get();
                        foreach($data_pro as $data){
                          echo base64_decode($data->name_products);
                        }
                        ?>
                        <?php echo e(base64_decode($purchase->name_products)); ?></td>
                      <td>
                        <?php if($purchase->status == 'Pending'): ?>
                        <span class="badge badge-danger"><?php echo e($purchase->status); ?></span>
                        <?php endif; ?>
                        <?php if($purchase->status == 'Delivery'): ?>
                        <span class="badge badge-warning"><?php echo e($purchase->status); ?></span>
                        <?php endif; ?>
                        <?php if($purchase->status == 'Processing'): ?>
                        <span class="badge badge-info"><?php echo e($purchase->status); ?></span>
                        <?php endif; ?>
                        <?php if($purchase->status == 'Shipped'): ?>
                        <span class="badge badge-success"><?php echo e($purchase->status); ?></span>
                        <?php endif; ?>
                      </td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo e($purchase->locate); ?></div>
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
    </div>
    <!-- /.card -->
    <!--Recently Added Products-->
    <div class="card">
    <div class="card-header">
      <h3 class="card-title">Recently Added Products</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
      </div>
    </div><!-- /.card-header -->
    <div class="card-body p-0">
      <ul class="products-list product-list-in-card pl-2 pr-2">
      <?php $__currentLoopData = $latest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li class="item">
        <div class="product-img">
          <img src="<?php echo e(asset($recent->main_pictures)); ?>" alt="Product Image" class="img-size-50">
        </div>
        <div class="product-info">
          <a href="javascript:void(0)" class="product-title"><?php echo e($recent->category_products); ?>

          <span class="badge badge-warning float-right">Rp. <?php echo e($recent->price); ?></span></a>
          <span class="product-description"><?php echo e(base64_decode($recent->name_products)); ?></span>
        </div>
      </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div><!-- /.card-body -->
    <div class="card-footer text-center">
      <a href="javascript:void(0)" class="uppercase">View All Products</a>
    </div><!-- /.card-footer -->
    </div><!-- /.card -->
  </div><!--./col-md-6-->

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('/vendor/template/plugins/chart.js/Chart.min.js')); ?>"></script>
<script src="<?php echo e(asset('/vendor/template/plugins/sparklines/sparkline.js')); ?>"></script>
<script src="<?php echo e(asset('/vendor/template/plugins/jqvmap/jquery.vmap.min.js')); ?>"></script>
<script src="<?php echo e(asset('/vendor/template/plugins/jqvmap/maps/jquery.vmap.usa.js')); ?>"></script>
<script src="<?php echo e(asset('/vendor/template/plugins/jquery-knob/jquery.knob.min.js')); ?>"></script>
<script src="<?php echo e(asset('/vendor/template/plugins/moment/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('/vendor/template/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(asset('/vendor/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
<script>
  $(function () {

  'use strict'

  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */

  //-----------------------
  //- MONTHLY SALES CHART -
  //-----------------------

  // Get context with jQuery - using jQuery's .get() method.
  var salesChartCanvas = $('#salesChart').get(0).getContext('2d')

  var salesChartData = {
    labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [
      {
        label               : 'Digital Goods',
        backgroundColor     : 'rgba(60,141,188,0.9)',
        borderColor         : 'rgba(60,141,188,0.8)',
        pointRadius          : false,
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : [38, 48, 40, 19, 86, 27, 90]
      },
      {
        label               : 'Electronics',
        backgroundColor     : 'rgba(210, 214, 222, 1)',
        borderColor         : 'rgba(210, 214, 222, 1)',
        pointRadius         : false,
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : [65, 59, 80, 81, 56, 55, 40]
      },
    ]
  }

  var salesChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines : {
          display : false,
        }
      }],
      yAxes: [{
        gridLines : {
          display : false,
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  var salesChart = new Chart(salesChartCanvas, { 
      type: 'line', 
      data: salesChartData, 
      options: salesChartOptions
    }
  )

  //---------------------------
  //- END MONTHLY SALES CHART -
  //---------------------------

  //-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {
      labels: [
          'Chrome', 
          'IE',
          'FireFox', 
          'Safari', 
          'Opera', 
          'Navigator', 
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var pieOptions     = {
      legend: {
        display: false
      }
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'doughnut',
      data: pieData,
      options: pieOptions      
    })

  //-----------------
  //- END PIE CHART -
  //-----------------

  /* jVector Maps
   * ------------
   * Create a world map with markers
   */
  $('#world-map-markers').mapael({
      map: {
        name : "usa_states",
        zoom: {
          enabled: true,
          maxLevel: 10
        },
      },
    }
  );

  // $('#world-map-markers').vectorMap({
  //   map              : 'world_en',
  //   normalizeFunction: 'polynomial',
  //   hoverOpacity     : 0.7,
  //   hoverColor       : false,
  //   backgroundColor  : 'transparent',
  //   regionStyle      : {
  //     initial      : {
  //       fill            : 'rgba(210, 214, 222, 1)',
  //       'fill-opacity'  : 1,
  //       stroke          : 'none',
  //       'stroke-width'  : 0,
  //       'stroke-opacity': 1
  //     },
  //     hover        : {
  //       'fill-opacity': 0.7,
  //       cursor        : 'pointer'
  //     },
  //     selected     : {
  //       fill: 'yellow'
  //     },
  //     selectedHover: {}
  //   },
  //   markerStyle      : {
  //     initial: {
  //       fill  : '#00a65a',
  //       stroke: '#111'
  //     }
  //   },
  //   markers          : [
  //     {
  //       latLng: [41.90, 12.45],
  //       name  : 'Vatican City'
  //     },
  //     {
  //       latLng: [43.73, 7.41],
  //       name  : 'Monaco'
  //     },
  //     {
  //       latLng: [-0.52, 166.93],
  //       name  : 'Nauru'
  //     },
  //     {
  //       latLng: [-8.51, 179.21],
  //       name  : 'Tuvalu'
  //     },
  //     {
  //       latLng: [43.93, 12.46],
  //       name  : 'San Marino'
  //     },
  //     {
  //       latLng: [47.14, 9.52],
  //       name  : 'Liechtenstein'
  //     },
  //     {
  //       latLng: [7.11, 171.06],
  //       name  : 'Marshall Islands'
  //     },
  //     {
  //       latLng: [17.3, -62.73],
  //       name  : 'Saint Kitts and Nevis'
  //     },
  //     {
  //       latLng: [3.2, 73.22],
  //       name  : 'Maldives'
  //     },
  //     {
  //       latLng: [35.88, 14.5],
  //       name  : 'Malta'
  //     },
  //     {
  //       latLng: [12.05, -61.75],
  //       name  : 'Grenada'
  //     },
  //     {
  //       latLng: [13.16, -61.23],
  //       name  : 'Saint Vincent and the Grenadines'
  //     },
  //     {
  //       latLng: [13.16, -59.55],
  //       name  : 'Barbados'
  //     },
  //     {
  //       latLng: [17.11, -61.85],
  //       name  : 'Antigua and Barbuda'
  //     },
  //     {
  //       latLng: [-4.61, 55.45],
  //       name  : 'Seychelles'
  //     },
  //     {
  //       latLng: [7.35, 134.46],
  //       name  : 'Palau'
  //     },
  //     {
  //       latLng: [42.5, 1.51],
  //       name  : 'Andorra'
  //     },
  //     {
  //       latLng: [14.01, -60.98],
  //       name  : 'Saint Lucia'
  //     },
  //     {
  //       latLng: [6.91, 158.18],
  //       name  : 'Federated States of Micronesia'
  //     },
  //     {
  //       latLng: [1.3, 103.8],
  //       name  : 'Singapore'
  //     },
  //     {
  //       latLng: [1.46, 173.03],
  //       name  : 'Kiribati'
  //     },
  //     {
  //       latLng: [-21.13, -175.2],
  //       name  : 'Tonga'
  //     },
  //     {
  //       latLng: [15.3, -61.38],
  //       name  : 'Dominica'
  //     },
  //     {
  //       latLng: [-20.2, 57.5],
  //       name  : 'Mauritius'
  //     },
  //     {
  //       latLng: [26.02, 50.55],
  //       name  : 'Bahrain'
  //     },
  //     {
  //       latLng: [0.33, 6.73],
  //       name  : 'São Tomé and Príncipe'
  //     }
  //   ]
  // })

})

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\product2\resources\views/home/dashboard/index.blade.php ENDPATH**/ ?>