@extends('templates')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/vendor/datatables/media/css/jquery.dataTables.css')}}">
@endsection
@section('content')
<?php
//$conn = new mysqli("localhost","root","");
//var_dump($conn);
?>
<div class="row" id="topDashboard">
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-cyan bg-darken-2 media-left media-middle">
                        <i class="icon-camera7 font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-cyan white media-body">
                        <h5>My Products</h5>
                        <h5 class="text-bold-400" id="myProducts"><?php echo $products = DB::table('productions')->where('user_id', Auth()->user()->id)->count('count'); ?></h5>
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
                        <h5 class="text-bold-400" id="allUsers"><?php echo $user = DB::table('users')->count('count'); ?></h5>
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
                        <h5 class="text-bold-400" id="myOrders"><?php echo $ord = DB::table('purchases')->where('user_id', Auth()->user()->id)->count(); ?></h5>
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
                        <h5 class="text-bold-400" id="myPurchases">Rp. <?php echo $profit = DB::table('purchases')->where('user_id', Auth()->user()->id)->sum('totals');?></h5>
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
      <div class="card-header">
        <h5>Charts total profits</h5>
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
      <div class="card-header">
        <h5>Charts total earning</h5>
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
            @if(Auth()->user()->avatars == null)
            <img src="{{asset('user-default.png')}}" alt="" style="border-radius: 50%;height: 180px;width: 100%;">
            @else
            <img src="{{asset(Auth()->user()->avatars)}}" alt="" style="border-radius: 50%;height: 180px;width: 100%;">
            @endif
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
    <div class="col-xl-4 col-lg-12">
        <div class="card bg-cyan">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-left media-middle">
                            <i class="icon-file-openoffice white font-large-2 float-xs-left"></i>
                        </div>
                        <div class="media-body white text-xs-right">
                            <h3><?php echo $files = DB::table('files')->where('user_id', Auth()->user()->id)->count(); ?></h3>
                            <span>My Files</span>
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
                            <span>Chatting</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-android-chat white font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>{{-- col-xl-4 col-lg-12 --}}
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
                        <li>
                          <a data-action="reload">
                            <i class="icon-reload"></i>
                          </a>
                        </li>
                        <li>
                          <a data-action="expand">
                            <i class="icon-expand2"></i>
                          </a>
                        </li>
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
    
</div>
<div class="row match-height">
@if(Auth()->user()->role == '2')
<div class="font-12 col-xl-8 col-lg-12">
  <div class="card">
      <div class="card-header border-0">
        <h3 class="card-title">
          <i class="fas fa-th mr-1"></i>Category
        </h3>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="reload"><i class="icon-reload"></i></a></li>
              <li><a data-action="close"><i class="icon-cross2"></i></a></li>
            </ul>
          </div>
      </div>
      <div class="card-body">
        <div class="card-block">
        <div class="table-responsive">
              <table class="table table-bordered" id="tableCategory">
                    <thead style="background: cadetblue;">
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
        </div>
        <div class="card-footer bg-transparent">
        <form id="myForm">@csrf
          <div class="col-xl-12 text-center float-left">
            <input type="text" name="name" class="form-control col-xl-4 float-left" data-readonly="true" data-fgColor="#39CCCC" style="width:100%;" placeholder="Name Category">
            <select name="display" class="custom-select col-xl-6 float-left" data-toggle="tooltip" data-placement="right" title="Display Index">
                                  <option value="show" selected>Show</option>
                                  <option value="hide">Hide</option>
                          </select>
                          <button class="btn btn-primary col-xl-6 float-left" id="addCategory">Added</button>
          </div><!-- ./col -->
            
          </form>
      </div><!-- /.card-footer -->
    </div>{{-- card-block --}}
      </div><!-- /.card-body -->
    </div>
  </div><!-- /.card --><!-- /.Left col -->
  @endif
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
@if(Auth()->user()->role == '2')
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
    </div><!-- /.card-header -->
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
      </div><!-- /.users-list -->
    </div><!-- /.card-body -->  
  </div><!--/.card col-xl-8 col-lg-12 -->
  <div class="col-xl-4 col-md-12 col-sm-12">
    <div class="card">
    <div class="card-header border-0">
      <h3 class="card-title">
        <i class="fas fa-th mr-1"></i>Saldo Randoms
      </h3>
    </div>
    <div class="card-body">
      <div class="card-block">
      <form action="{{route('admin.api.createdatasaldo')}}" method="POST">@csrf
        <input type="number" name="saldo" class="form-control col-xl-6 float-left mt-1" placeholder="Input number in money...">
        <input type="date" name="expired" class="form-control col-xl-6 float-left mt-1">
        <button type="submit" class="btn btn-primary col-xl-12 mt-1">New</button>
      </form>
      </div>
    </div><!-- /.card-body -->
    </div><!-- /.card -->
  </div><!-- col-xl-4 col-md-12 col-sm-12 -->
</div><!-- row -->
@endif
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
@endsection
@section('ajax')
<script src="{{asset('/vendor/datatables/media/js/jquery.dataTables.js')}}" defer></script>
<script type="text/javascript">
$(function(){
  $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
  var tabelCategory = $('#tableCategory').DataTable({
    serverSide:true,
    processing:true,
    ajax:"{{route('admin.api.categorymanage')}}",
    columns:[
    {data:'name',name:'name'},
    {data:'display',name:'display'},
    {data: 'action',name: 'action', orderable: false, searchable: false },
    ],
  });
  $('#addCategory').click(function(e){
    e.preventDefault();
    $.ajax({
    url: "{{route('admin.api.categorycreatedata')}}",
    method: 'post',
    data: $('#myForm').serialize(),
    success: function(e){
      tabelCategory.draw();
    },
    error: function(e){
      console.log(e);
    },
  });
});
  $('body').on('click', '.deleteCategory', function(e){
    category_id = $(this).data('id');
    e.preventDefault();
    $.ajax({
      url:"{{url('/admin/api-admin/post/category-delete')}}"+'/'+category_id,
      type:'delete',
      success:function(){
        tabelCategory.draw();
      },
      error:function(e){
        console.log(e);
      }
    });
  });

  setInterval(function(){
    $.get("{{route('admin.api.topdashboards')}}", function(data) {
      $('#myProducts').html(data.data.my_products);
      $('#allUsers').html(data.data.all_users);
      $('#myOrders').html(data.data.my_orders);
      $('#myPurchases').html(data.data.my_purchases);
    });
  }, 60000);
});
</script>
@endsection