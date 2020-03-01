@extends('templates')
@section('header')
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
@endsection
@section('content')
<div class="row" id="topDashboard">
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-cyan bg-darken-2 media-left media-middle">
                        <i class="icon-camera7 font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-cyan white media-body">
                        <h5>New Products</h5>
                        <h5 class="text-bold-400"><?php echo $products = DB::table('productions')->where('user_id', Auth()->user()->id)->count('count'); ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-deep-orange bg-darken-2 media-left media-middle">
                        <i class="icon-user1 font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-deep-orange white media-body">
                        <h5>New Users</h5>
                        <h5 class="text-bold-400"><?php echo $user = DB::table('users')->count('count'); ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-teal bg-darken-2 media-left media-middle">
                        <i class="icon-cart font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-teal white media-body">
                        <h5>New Orders</h5>
                        <h5 class="text-bold-400"><?php echo $ord = DB::table('purchases')->where('user_id', Auth()->user()->id)->count(); ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-pink bg-darken-2 media-left media-middle">
                        <i class="icon-banknote font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-pink white media-body">
                        <h5>Total Purchase</h5>
                        <h5 class="text-bold-400">Rp. <?php echo $profit = DB::table('purchases')->where('user_id', Auth()->user()->id)->sum('totals');?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Statistics -->
<!--project Total Earning, visit & post-->
<div class="row">
  <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="earning-chart position-relative">
                    <div class="chart-title position-absolute mt-2 ml-2" style="right: 30px;">
                        <h1 class="display-4">Rp. <?php echo $profit = DB::table('purchases')->where('user_id', Auth()->user()->id)->sum('me'); ?></h1>
                        <span class="text-muted">Total Profits</span>
                    </div>
                    <canvas id="earning-chart-10" class="height-450 block"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-9 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="earning-chart position-relative">
                    <div class="chart-title position-absolute mt-2 ml-2" style="right: 30px;">
                        <h1 class="display-4">Rp. <?php echo $profit = DB::table('purchases')->where('user_id', Auth()->user()->id)->sum('profits'); ?></h1>
                        <span class="text-muted">Total Earning</span>
                    </div>
                    <canvas id="earning-chart" class="height-450 block"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card" style="border-top: 10px outset #22d2db;box-shadow: 4px 5px 5px 10px aqua;border-left: 10px outset #22d2db;">
            <div class="card-header">
                Profile
            </div>
            <div class="card-body" style="padding:5px;">
            <img src="{{asset(Auth()->user()->avatars)}}" alt="" style="border-radius: 50%;height: 180px;width: 100%;">
            <p>{{Auth()->user()->email}}</p>
            <p>{{Auth()->user()->status}}</p>
            <p>{{Auth()->user()->born}}</p>
            <p>{{Auth()->user()->locate}}</p>
        </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <canvas id="posts-visits" class="height-400"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/project Total Earning, visit & post-->
<!-- projects table with monthly chart -->
<div class="row">
    <div class="col-xl-8 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Latest Purchase</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body" id="latestPurchase">
                <div class="card-block">
                    <p class="m-0">Total purchase <?php  echo $co = DB::table('purchases')->where('user_id', Auth()->user()->id)->count(); ?><span class="float-xs-right"><a href="#" target="_blank">More data <i class="icon-arrow-right2"></i></a></span></p>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Purchase ID</th>
                                <th>Products</th>
                                <th>Status</th>
                                <th>Locate</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($pu as $purchase)
                            <tr>
                              <td class="text-truncate">{{$purchase->purchase_id}}</td>
                              <td class="text-truncate"><?php
                                $data_pro = App\Models\Production::where('id',$purchase->production_id)->get();
                                foreach($data_pro as $data){
                                  echo base64_decode($data->name_products);
                                }
                                ?>
                                {{base64_decode($purchase->name_products)}}
                              </td>
                              <td class="text-truncate">
                                  @if($purchase->status == 'Pending')
                                  <span class="badge badge-danger">{{$purchase->status}}</span>
                                  @endif
                                  @if($purchase->status == 'Delivery')
                                  <span class="badge badge-warning">{{$purchase->status}}</span>
                                  @endif
                                  @if($purchase->status == 'Processing')
                                  <span class="badge badge-info">{{$purchase->status}}</span>
                                  @endif
                                  @if($purchase->status == 'Shipped')
                                  <span class="badge badge-success">{{$purchase->status}}</span>
                                  @endif
                                </td>
                                <td class="valign-middle">{{$purchase->locate}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card bg-cyan">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-left media-middle">
                            <i class="icon-pencil white font-large-2 float-xs-left"></i>
                        </div>
                        <div class="media-body white text-xs-right">
                            <h3>278</h3>
                            <span>New Posts</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-teal">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body white text-xs-left">
                            <h3>156</h3>
                            <span>New Clients</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-user1 white font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-deep-orange">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-left media-middle">
                            <i class="icon-chat1 white font-large-2 float-xs-left"></i>
                        </div>
                        <div class="media-body white text-xs-right">
                            <h3><?php echo $com = DB::table('questions')->join('productions', 'questions.production_id', '=', 'productions.id')->where('productions.user_id', Auth()->user()->id)->count(); ?></h3>
                            <span>New Comments</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-cyan">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body white text-xs-left">
                            <h3>423</h3>
                            <span>Support Tickets</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-ios-help-outline white font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row match-height">
<div class="font-12 col-xl-8 col-lg-12">
  <div class="card">
      <div class="card-header border-0">
        <h3 class="card-title">
          <i class="fas fa-th mr-1"></i>Category
        </h3>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
              <li><a data-action="reload"><i class="icon-reload"></i></a></li>
              <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
              <li><a data-action="close"><i class="icon-cross2"></i></a></li>
            </ul>
          </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
      <!--table--->
      <table class="table table-bordered data-table" id="categoryIndex">
              <thead>
              <tr>
              <th>Name</th>
              <th>Created</th>
              <th>Action</th>
              </tr>
              </thead>
              @foreach($category as $p)
              <tbody>
              <td>{{$p->name}}</td>
              <td>{{$p->created_at->diffForHumans()}}</td>
              <td style="text-align: center;">
              <form action="{{route('dashboard.deletecategory', $p->id)}}" method="post">@csrf @method('DELETE')
              <a href="{{route('dashboard.editcategory', $p->id)}}
              " class="btn btn-primary font-12">Edit</a>
              <a style="color: white;cursor: pointer;" class="btn btn-danger font-12" data-toggle="modal" data-target="#deleteData{{$p->id}}">Delete</a>
              <!-- Modal -->
          <div class="modal fade" id="deleteData{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
              @endforeach
              </table>
        </div>
        <div class="card-footer bg-transparent">
        <form id="myForm" name="myForm">@csrf
          <div class="col-xl-12 text-center float-left">
            <input type="text" name="name" class="form-control col-xl-4 float-left" data-readonly="true" data-fgColor="#39CCCC" style="width:100%;" placeholder="Name Category">
            <select name="display" class="custom-select col-xl-6 float-left" data-toggle="tooltip" data-placement="right" title="Display Index">
                                  <option value="show" selected>Show</option>
                                  <option value="hide">Hide</option>
                          </select>
                          <button class="btn btn-primary col-xl-6 float-left" id="add">Added</button>
          </div><!-- ./col -->
            
          </form>
      </div><!-- /.card-footer -->
      </div><!-- /.card-body -->
    </div>
  </div><!-- /.card --><!-- /.Left col -->
  <div class="col-xl-4 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <h4 class="card-title">Contact Form</h4>
                    <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                </div>
                <div class="card-block">
                    <form class="form">
                        <div class="form-body">
                            <div class="form-group">
                                <label for="donationinput1" class="sr-only">Name</label>
                                <input type="text" id="donationinput1" class="form-control" placeholder="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="donationinput2" class="sr-only">Email</label>
                                <input type="email" id="donationinput2" class="form-control" placeholder="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="donationinput7" class="sr-only">Message</label>
                                <textarea id="donationinput7" rows="5" class="form-control square" name="message" placeholder="message"></textarea>
                            </div>
                        </div>
                        <div class="form-actions center">
                            <button type="submit" class="btn btn-outline-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
                <div class="card col-xl-8 col-lg-12">
                  <div class="card-header">
                    <h3 class="card-title">Latest Members</h3>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
              <li><a data-action="reload"><i class="icon-reload"></i></a></li>
              <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
              <li><a data-action="close"><i class="icon-cross2"></i></a></li>
            </ul>
          </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                  <div class="card-block  my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
                    <div class="row clearfix">
                      @foreach($users as $user)
                      @if($user->avatars == true)
                      <figure class="col-lg-4 col-md-6 col-xs-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                      
                      <p style="margin-bottom: 0;"><a class="users-list-name" style="font-size: 12px;" href="#">{{$user->name}}</a></p>
                      <img class="img-thumbnail img-fluid" src="{{asset($user->avatars)}}" itemprop="thumbnail" alt="Image description" style="height: 180px;" />
                      <p style="margin-bottom: 0;">
                      <span class="users-list-date" style="font-size: 12px;">{{Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</span>
                      </p>
                      </figure>
                      @endif
                      @if($user->avatars == null)
                      <figure class="col-lg-4 col-md-6 col-xs-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                      
                      <p style="margin-bottom: 0;"><a class="users-list-name" style="font-size: 12px;" href="#">{{$user->name}}</a></p>
                      <img class="img-thumbnail img-fluid" src="{{asset('user-default.png')}}" itemprop="thumbnail" alt="Image description" style="height: 180px;" />
                      <p style="margin-bottom: 0;">
                      <span class="users-list-date" style="font-size: 12px;">{{Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</span>
                      </p>
                      </figure>
                      @endif
                      @endforeach
                    </div>
                  </div>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  
                </div>
                <!--/.card -->
  <div class="col-xl-4 col-md-12 col-sm-12">
    <div class="card">
          <div class="card-header border-0">
            <h3 class="card-title">
              <i class="far fa-bell mr-1"></i>All Notification
            </h3>
            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
              <li><a data-action="close"><i class="icon-cross2"></i></a></li>
            </ul>
          </div>
          </div>
          <div class="card-body">
            <div class="row"> 
          @if(auth()->user()->role == 2)
          @foreach($notification_products as $notif)
          <p id="notif_delete{{$notif->id}}" style="font-size:12px;margin-top:-10px;padding-left: 30px;" class="col-xl-12">{{$notif->notification}}. {{$notif->created_at->diffForHumans()}} 
            <button class="btn-danger" onclick="document.getElementById('notif_delete{{$notif->id}}').style.display = 'none';"><i class="fas fa-trash"></i></button></p>
          @endforeach
          <form action="{{route('dashboard.deleteallnotification')}}" method="POST" style="margin-left: 30px;">@csrf @method('DELETE')
          <p><button class="btn btn-danger">Delete All</button>
          {{$notification_products->links()}}</p>
          </form>
          @endif
        </div>
      </div>
          </div><!-- /.card-body -->
    </div><!-- /.card notif-->
    @if(Auth()->user()->role == '2')
    <div class="col-xl-4 col-md-12 col-sm-12">
      <div class="card">
    <div class="card-header border-0">
      <h3 class="card-title">
        <i class="fas fa-th mr-1"></i>Saldo Randoms
      </h3>
    </div>
    <div class="card-body">
      <form action="{{route('dashboard.randomsaldo')}}" method="POST">@csrf
        <input type="number" name="saldo" class="form-control col-xl-6 float-left" placeholder="Input number in money...">
        <input type="date" name="expired" class="form-control col-xl-6 float-left">
        <button type="submit" class="btn btn-primary col-xl-12">New</button>
      </form>
    </div><!-- /.card-body -->
    </div><!-- /.card -->
  </div>
    @endif
</div>
<!--/ projects table with monthly chart -->
<div class="row col-xl-12">
  <!--Notif-->
  <div class="col-md-6">
    
    
    <!--Recently Added Products-->
    <div class="card">
    <div class="card-header">
      <h3 class="card-title">Recently Added Products</h3>
    </div><!-- /.card-header -->
    <div class="card-body p-0">
      <ul class="products-list product-list-in-card pl-2 pr-2">
      @foreach($latest as $recent)
      <li class="item">
        <div class="product-img">
          <img src="{{asset($recent->main_pictures)}}" alt="Product Image" class="img-size-50" style="width: 50px;height: 50px;">
        </div>
        <div class="product-info">
          <a href="javascript:void(0)" class="product-title">{{$recent->category_products}}
          <span class="badge badge-warning float-right">Rp. {{$recent->price}}</span></a>
          <span class="product-description">{{base64_decode($recent->name_products)}}</span>
        </div>
      </li>
      @endforeach
      </ul>
    </div><!-- /.card-body -->
    <div class="card-footer text-center">
      <a href="javascript:void(0)" class="uppercase">View All Products</a>
    </div><!-- /.card-footer -->
    </div><!-- /.card -->
  </div><!--./col-md-6-->

</div>
@endsection
@section('js')
<script src="{{asset('/vendor/template/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('/vendor/template/plugins/sparklines/sparkline.js')}}"></script>
<script src="{{asset('/vendor/template/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('/vendor/template/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{asset('/vendor/template/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{asset('/vendor/template/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('/vendor/template/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('/vendor/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script type="text/javascript">
/*=========================================================================================
    File Name: dashboard-2.js
    Description: intialize advance cards
    ----------------------------------------------------------------------------------------
    Item Name: Robust - Responsive Admin Theme
    Version: 1.2
    Author: GeeksLabs
    Author URL: http://www.themeforest.net/user/geekslabs
==========================================================================================*/
(function(window, document, $) {
    'use strict';    
    
    /*********************************************
    *               Total Earnings               *
    **********************************************/
    //Get the context of the Chart canvas element we want to select
    var ctx3 = document.getElementById("earning-chart").getContext("2d");

    // Chart Options
    var earningOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetStrokeWidth : 3,
        pointDotStrokeWidth : 4,
        tooltipFillColor: "rgba(0,0,0,0.8)",
        legend: {
            display: false,
            position: 'bottom',
        },
        hover: {
            mode: 'label'
        },
        scales: {
            xAxes: [{
                display: true,
            }],
            yAxes: [{
                display: true,
                ticks: {
                    min: 0,
                    max: 1000000,
                },
            }]
        },
        title: {
            display: false,
            fontColor: "#FFF",
            fullWidth: false,
            fontSize: 40,
            text: '82%'
        }
    };

    // Chart Data
    var earningData = {
        labels: ["January", "February", "March", "April", "May", "June", "July", "Agustus", "September", "Oktober", "November", "Desember"],
        datasets: [{
            label: "Earning",
            data: [
                <?php echo $purchases = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '1')->where('purchases.year', '2020')->sum('purchases.profits'); ?>,
                <?php echo $purchases = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '2')->where('purchases.year', '2020')->sum('purchases.profits'); ?>,
                <?php echo $purchases = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '3')->where('purchases.year', '2020')->sum('purchases.profits'); ?>,
                <?php echo $purchases = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '4')->where('purchases.year', '2020')->sum('purchases.profits'); ?>,
                <?php echo $purchases = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '5')->where('purchases.year', '2020')->sum('purchases.profits'); ?>,
                <?php echo $purchases = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '6')->where('purchases.year', '2020')->sum('purchases.profits'); ?>,
                <?php echo $purchases = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '7')->where('purchases.year', '2020')->sum('purchases.profits'); ?>,
                <?php echo $purchases = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '8')->where('purchases.year', '2020')->sum('purchases.profits'); ?>,
                <?php echo $purchases = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '9')->where('purchases.year', '2020')->sum('purchases.profits'); ?>,
                <?php echo $purchases = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '10')->where('purchases.year', '2020')->sum('purchases.profits'); ?>,
                <?php echo $purchases = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '11')->where('purchases.year', '2020')->sum('purchases.profits'); ?>,
                <?php echo $purchases = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '12')->where('purchases.year', '2020')->sum('purchases.profits'); ?>
                  ],
            backgroundColor: 'rgba(45,149,191,0.1)',
            borderColor: "transparent",
            borderWidth: 0,
            strokeColor : "#ff6c23",
            capBezierPoints: true,
            pointColor : "#fff",
            pointBorderColor: "rgba(45,149,191,1)",
            pointBackgroundColor: "#FFF",
            pointBorderWidth: 2,
            pointRadius: 4,
        }]
    };

    var earningConfig = {
        type: 'line',

        // Chart Options
        options : earningOptions,

        // Chart Data
        data : earningData
    };

    // Create the chart
    var earningChart = new Chart(ctx3, earningConfig);

//end

    


//end

    /*************************************************
    *               Posts Visits Ratio               *
    *************************************************/
    //Get the context of the Chart canvas element we want to select
    var ctx4 = $("#posts-visits");

    // Chart Options
    var PostsVisitsOptions = {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            position: 'top',
            labels: {
                boxWidth: 10,
                fontSize: 14
            },
        },
        hover: {
            mode: 'label'
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    lineWidth: 2,
                    color: "rgba(0, 0, 0, 0.05)",
                    zeroLineWidth: 2,
                    zeroLineColor: "rgba(0, 0, 0, 0.05)",
                    drawTicks: false,
                },
                ticks: {
                    fontSize: 14,
                }
            }],
            yAxes: [{
                display: true,
                ticks: {
                    min: 0,
                    max: 100
                }
            }]
        },
        title: {
            display: false,
            text: 'Chart.js Line Chart - Legend'
        }
    };

    // Chart Data
    var postsVisitsData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "My Orders of 2020",
            data: [<?php echo $jan = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '1')->where('purchases.year', '2020')->count(); ?>,
             <?php echo $jan = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '2')->where('purchases.year', '2020')->count(); ?>,
              <?php echo $jan = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '3')->where('purchases.year', '2020')->count(); ?>,
               <?php echo $jan = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '4')->where('purchases.year', '2020')->count(); ?>,
                <?php echo $jan = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '5')->where('purchases.year', '2020')->count(); ?>,
                 <?php echo $jan = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '6')->where('purchases.year', '2020')->count(); ?>,
                  <?php echo $jan = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '7')->where('purchases.year', '2020')->count(); ?>,
                   <?php echo $jan = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '8')->where('purchases.year', '2020')->count(); ?>,
                    <?php echo $jan = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '9')->where('purchases.year', '2020')->count(); ?>,
                     <?php echo $jan = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '10')->where('purchases.year', '2020')->count(); ?>,
                      <?php echo $jan = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '11')->where('purchases.year', '2020')->count(); ?>,
                       <?php echo $jan = DB::table('purchases')->join('productions', 'purchases.production_id', '=', 'productions.id')->where('purchases.month', '12')->where('purchases.year', '2020')->count(); ?>
                       ],
            lineTension: 0,
            fill: false,
            // borderDash: [5, 5],
            borderColor: "#37BC9B",
            pointBorderColor: "#37BC9B",
            pointBackgroundColor: "#FFF",
            pointBorderWidth: 3,
            pointRadius: 6,
        }, {
            label: "My Products of 2020",
            data: [
            <?php echo $jan = DB::table('productions')->where('user_id', Auth()->user()->id)->where('month', '1')->where('year', '2020')->count(); ?>,
             <?php echo $jan = DB::table('productions')->where('user_id', Auth()->user()->id)->where('month', '2')->where('year', '2020')->count(); ?>,
              <?php echo $jan = DB::table('productions')->where('user_id', Auth()->user()->id)->where('month', '3')->where('year', '2020')->count(); ?>,
               <?php echo $jan = DB::table('productions')->where('user_id', Auth()->user()->id)->where('month', '4')->where('year', '2020')->count(); ?>,
                <?php echo $jan = DB::table('productions')->where('user_id', Auth()->user()->id)->where('month', '5')->where('year', '2020')->count(); ?>,
                 <?php echo $jan = DB::table('productions')->where('user_id', Auth()->user()->id)->where('month', '6')->where('year', '2020')->count(); ?>,
                  <?php echo $jan = DB::table('productions')->where('user_id', Auth()->user()->id)->where('month', '7')->where('year', '2020')->count(); ?>,
                   <?php echo $jan = DB::table('productions')->where('user_id', Auth()->user()->id)->where('month', '8')->where('year', '2020')->count(); ?>,
                    <?php echo $jan = DB::table('productions')->where('user_id', Auth()->user()->id)->where('month', '9')->where('year', '2020')->count(); ?>,
                     <?php echo $jan = DB::table('productions')->where('user_id', Auth()->user()->id)->where('month', '10')->where('year', '2020')->count(); ?>,
                      <?php echo $jan = DB::table('productions')->where('user_id', Auth()->user()->id)->where('month', '11')->where('year', '2020')->count(); ?>,
                       <?php echo $jan = DB::table('productions')->where('user_id', Auth()->user()->id)->where('month', '12')->where('year', '2020')->count(); ?>
                       ],
            lineTension: 0,
            fill: false,
            borderColor: "#967ADC",
            pointBorderColor: "#967ADC",
            pointBackgroundColor: "#FFF",
            pointBorderWidth: 3,
            pointRadius: 6,
        }]
    };

    var postsVisitsConfig = {
        type: 'line',

        // Chart Options
        options : PostsVisitsOptions,

        data : postsVisitsData
    };

    // Create the chart
    var postsVisitsChart = new Chart(ctx4, postsVisitsConfig);


})(window, document, jQuery);

</script>

<script type="text/javascript">
(function(window, document, $) {
    'use strict'; 
    //Get the context of the Chart canvas element we want to select
    var ctx10 = document.getElementById("earning-chart-10").getContext("2d");

    // Chart Options
    var earningOptions10 = {
        responsive: true,
        maintainAspectRatio: false,
        datasetStrokeWidth : 3,
        pointDotStrokeWidth : 4,
        tooltipFillColor: "rgba(0,0,0,0.8)",
        legend: {
            display: false,
            position: 'bottom',
        },
        hover: {
            mode: 'label'
        },
        scales: {
            xAxes: [{
                display: true,
            }],
            yAxes: [{
                display: true,
                ticks: {
                    min: 0,
                    max: 5000000
                },
            }]
        },
        title: {
            display: false,
            fontColor: "#FFF",
            fullWidth: false,
            fontSize: 40,
            text: '82%'
        }
    };

    // Chart Data
    var earningData10 = {
        labels: ["January", "February", "March", "April", "May", "June", "July", "Agustus", "September", "Oktober", "November", "Desember"],
        datasets: [{
            label: "Earning",
            data: [
                <?php echo $purchases = DB::table('purchases')->where('month', '1')->where('year', '2020')->sum('purchases.me'); ?>,
                <?php echo $purchases = DB::table('purchases')->where('month', '2')->where('year', '2020')->sum('purchases.me'); ?>,
                <?php echo $purchases = DB::table('purchases')->where('month', '3')->where('year', '2020')->sum('purchases.me'); ?>,
                <?php echo $purchases = DB::table('purchases')->where('month', '4')->where('year', '2020')->sum('purchases.me'); ?>,
                <?php echo $purchases = DB::table('purchases')->where('month', '5')->where('year', '2020')->sum('purchases.me'); ?>,
                <?php echo $purchases = DB::table('purchases')->where('month', '6')->where('year', '2020')->sum('purchases.me'); ?>,
                <?php echo $purchases = DB::table('purchases')->where('month', '7')->where('year', '2020')->sum('purchases.me'); ?>,
                <?php echo $purchases = DB::table('purchases')->where('month', '8')->where('year', '2020')->sum('purchases.me'); ?>,
                <?php echo $purchases = DB::table('purchases')->where('month', '9')->where('year', '2020')->sum('purchases.me'); ?>,
                <?php echo $purchases = DB::table('purchases')->where('month', '10')->where('.year', '2020')->sum('purchases.me'); ?>,
                <?php echo $purchases = DB::table('purchases')->where('month', '11')->where('.year', '2020')->sum('purchases.me'); ?>,
                <?php echo $purchases = DB::table('purchases')->where('month', '12')->where('.year', '2020')->sum('purchases.me'); ?>
                  ],
            backgroundColor: 'rgba(45,149,191,0.1)',
            borderColor: "transparent",
            borderWidth: 0,
            strokeColor : "#ff6c23",
            capBezierPoints: true,
            pointColor : "#fff",
            pointBorderColor: "rgba(45,149,191,1)",
            pointBackgroundColor: "#FFF",
            pointBorderWidth: 2,
            pointRadius: 4,
        }]
    };

    var earningConfig10 = {
        type: 'line',

        // Chart Options
        options : earningOptions10,

        // Chart Data
        data : earningData10
    };

    // Create the chart
    var earningChart = new Chart(ctx10, earningConfig10);
  })(window, document, jQuery);
</script>
<script type="text/javascript">
$(document).ready(function(){
  $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
  $('#add').click(function(e){
    e.preventDefault();
    $.ajax({
    url: "{{url('/dashboards/category/added')}}",
    method: 'post',
    data: $('#myForm').serialize(),
    success: function(result){
      console.log(result.success);
    },
  });
});
  $('#manageUser').click(function(){
  $('#content').load('{{ url('/dashboards/manage/users')}}');
  $('#manageUser').addClass('bg-primary');
  });
  
    setInterval(function() {
      $('#latestPurchase').load('{{ url('/dashboards/purchaseIndex')}}');
    }, 60000);
    setInterval(function() {
      $('#categoryIndex').load('{{ url('/dashboards/categoryIndex')}}');
    }, 60000);
    setInterval(function() {
      $('#topDashboard').load('{{ url('/dashboards/topDashboard')}}');
    }, 60000);
});
</script>
@endsection