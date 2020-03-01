<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="refresh" content="10800;url={{url('/login')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register Account <?php echo $_SERVER['HTTP_HOST']; ?></title>
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="apple-touch-icon" sizes="60x60" href="../../app-assets/images/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../../app-assets/images/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../../app-assets/images/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../../app-assets/images/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../app-assets/images/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="../../app-assets/images/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/robust/themes/robust/app-assets/css/bootstrap.css')}}">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/robust/themes/robust/app-assets/fonts/icomoon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/robust/themes/robust/app-assets/fonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/robust/themes/robust/app-assets/vendors/css/extensions/pace.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/robust/themes/robust/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/robust/themes/robust/app-assets/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/robust/themes/robust/app-assets/css/colors.css')}}">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/robust/themes/robust/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/robust/themes/robust/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/robust/themes/robust/app-assets/css/core/colors/palette-gradient.css')}}">
    <!-- END Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/robust/themes/robust/app-assets/css/style.css')}}">
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" href="{{asset('/vendor/template/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/vendor/multi-theme/src/css/application.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/vendor/animate/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/robust/themes/robust/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
</head>
<body>
<div style="min-height: 1450px;background: transparent;" class="parallax-window" 
data-parallax="scroll" data-speed="0.2">
<section class="flexbox-container">
<div class="col-xl-12">
    <div class="col-md-6 offset-md-3 col-xs-12 offset-xs-1 box-shadow-2 p-0 mt-3 wow slideInLeft m-0" data-wow-duration="3s">
    <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
      <div class="card-header no-border">
        <div class="card-title text-xs-center">
          <img src="../../app-assets/images/logo/robust-logo-dark.png" alt="branding logo">
        </div>
        <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Create Account</span></h6>
      </div>
      <div class="card-body collapse in"> 
        <div class="card-block">
          <form class="form-horizontal form-simple" action="{{url('post-registration')}}" method="POST" id="regForm" novalidate>@csrf
            <fieldset class="form-group position-relative has-icon-left mb-1">
              <input type="text" class="form-control form-control-lg input-lg" id="user-name" placeholder="User Name" name="name">
              <div class="form-control-position">
                  <i class="icon-head"></i>
              </div>
            </fieldset>
            <fieldset class="form-group position-relative has-icon-left mb-1">
              <input type="email" class="form-control form-control-lg input-lg" id="user-email" placeholder="Your Email Address" name="email" required>
              <div class="form-control-position">
                  <i class="icon-mail6"></i>
              </div>
            </fieldset>
            <fieldset class="form-group position-relative has-icon-left">
              <input type="password" class="form-control form-control-lg input-lg" id="user-password" placeholder="Enter Password" name="password" required>
              <div class="form-control-position">
                  <i class="icon-key3"></i>
              </div>
            </fieldset>
            <fieldset class="form-group position-relative has-icon-left mb-1">
              <input type="date" class="form-control form-control-lg input-lg datepicker" name="born" required>
              <div class="form-control-position">
                  <i class="fas fa-date"></i>
              </div>
            </fieldset>
            <fieldset class="form-group position-relative has-icon-left mb-1">
            <input type="checkbox" name="">
            <label class="col-form-label">Agree terms of conditions in <?php echo $_SERVER['HTTP_HOST']; ?></label>
            </fieldset>
            <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Register</button>
          </form>
        </div>
        <p class="text-xs-center">Already have an account ? <a href="{{url('/login')}}" class="card-link">Login</a></p>
      </div>
    </div>
  </div>
  <div class="col-xl-6 col-md-5 col-lg-6 col-xs-12">
    <div class="card box-shadow-2 mt-3 wow fadeInDown" data-wow-duration="0.4s">
    <div class="card-header"><h5 class="card-title">Terms of conditions is required to read</h5></div>
    <div class="card-body">
    <div class="card-block"> 
    </div>
    </div>  
    </div>
  </div><!-- col-xl-5 -->
  <div class="col-xl-3 col-md-5 col-lg-6 col-xs-12">
    <div class="card box-shadow-2 mt-3 wow fadeInDown" data-wow-duration="0.4s">
    <div class="card-header"><h5 class="card-title">Payment Supports</h5></div>
    <div class="card-body">
    <div class="card-block">
      <i class="fab fa-cc-visa" style="font-size: 50px;color:blue;" data-toggle="tooltip" data-placement="bottom" title="Visa"></i>
      <i class="fab fa-cc-stripe" style="font-size: 50px;color:blue;" data-toggle="tooltip" data-placement="bottom" title="Stripe"></i>
      <i class="fab fa-cc-paypal" style="font-size: 50px;color:blue;" data-toggle="tooltip" data-placement="bottom" title="Paypal"></i>
      <i class="fab fa-cc-mastercard" style="font-size: 50px;color:blue;" data-toggle="tooltip" data-placement="bottom" title="Mastercard"></i>
      <i class="fab fa-cc-apple-pay" style="font-size: 50px;color:blue;" data-toggle="tooltip" data-placement="bottom" title="Apple Pay"></i>
      <i class="fab fa-amazon-pay" style="font-size: 50px;color:blue;" data-toggle="tooltip" data-placement="bottom" title="Amazon Pay"></i>
    </div>
    </div>  
    </div>
  </div><!-- col-xl-5 -->
</div><!-- col-xl-12 -->
<div class="col-xl-12 col-lg-12 col-xs-12 mt-2 p-0">
  <div class="col-xl-3 col-md-3 col-lg-3 col-xs-6">
    <div class="card box-shadow-2 mt-3 wow fadeInDown" data-wow-duration="2s">
    <div class="card-header"><h4 class="card-title">Member 1 Month</h4></div>
    <div class="card-body">
    <div class="card-block">
      <h5 class="border-bottom-black">Facilities</h5>
      <p class="font-small-2"><i class="icon-checkmark2"></i> <span id="oneMonthFacilitiesOne"></span></p>
      <p class="font-small-2"><i class="icon-checkmark2"></i> <span id="oneMonthFacilitiesTwo"></span></p>
      <p class="font-small-2"><i class="icon-checkmark2"></i> <span id="oneMonthFacilitiesThree"></span></p>
      <p class="font-small-2"><i class="icon-checkmark2"></i> <span id="oneMonthFacilitiesFourth"></span></p>
      <p class="font-small-2"><i class="icon-checkmark2"></i> <span id="oneMonthFacilitiesFive"></span></p>
      <p class="font-small-2"><i class="icon-cross"></i> <span id="oneMonthFacilitiesSix"></span></p>
      <p class="font-small-2"><i class="icon-checkmark2"></i> <span id="oneMonthFacilitiesSeven"></span></p>
      <h5 class="border-bottom-black">Benefits</h5>
      <p class="font-small-2"><i class="icon-checkmark2"></i> <span id="oneMonthBenefitOne"></span></p>
      <p class="font-small-2"><i class="icon-checkmark2"></i> <span id="oneMonthBenefitTwo"></span></p>
      <button type="button" class="btn btn-info">Rp. 60.000,00</button>
    </div>
    </div>  
    </div>
  </div><!-- col-xl-5 -->
  <div class="col-xl-3 col-md-3 col-lg-3 col-xs-6">
    <div class="card box-shadow-2 mt-3 wow fadeInDown" data-wow-duration="2s">
    <div class="card-header"><h4 class="card-title">Member 2 Month</h4></div>
    <div class="card-body">
    <div class="card-block">
    <h5 class="border-bottom-black">Facilities</h5>
    <p class="font-small-2"><i class="icon-checkmark2"></i> Dashboard pages comprehensive</p>
    <p class="font-small-2"><i class="icon-checkmark2"></i> Get clients up to 100</p>
    <p class="font-small-2"><i class="icon-checkmark2"></i> File storage up to 2GB</p>
    <p class="font-small-2"><i class="icon-checkmark2"></i> Get Restful API tokens</p>
    <p class="font-small-2"><i class="icon-checkmark2"></i> Custom design pages</p>
    <p class="font-small-2"><i class="icon-checkmark2"></i> Saving quota usage by using a single page application</p>
    <p class="font-small-2"><i class="icon-checkmark2"></i> Get saldo total up to Rp. 70.000,00</p>
    <h5 class="border-bottom-black">Benefits</h5>
    <p class="font-small-2"><i class="icon-checkmark2"></i> We guarantee your online business will be 100% successful.</p>
    <p class="font-small-2"><i class="icon-checkmark2"></i> We have very sophisticated security so your data will be safe from cybercrime</p>
    <button type="button" class="btn btn-info">Rp. 110.000,00</button> 
    </div>
    </div>  
    </div>
  </div><!-- col-xl-5 -->
  <div class="col-xl-3 col-md-3 col-lg-3 col-xs-6">
    <div class="card box-shadow-2 mt-3 wow fadeInDown" data-wow-duration="2s">
    <div class="card-header"><h4 class="card-title">Member 6 Month</h4></div>
    <div class="card-body">
    <div class="card-block">
    <h5 class="border-bottom-black">Facilities</h5>
    <p class="font-small-2"><i class="icon-checkmark2"></i> Dashboard pages comprehensive</p>
    <p class="font-small-2"><i class="icon-checkmark2"></i> Get clients up to 10000</p>
    <p class="font-small-2"><i class="icon-checkmark2"></i> File storage up to 10GB</p>
    <p class="font-small-2"><i class="icon-checkmark2"></i> Get Restful API tokens</p>
    <p class="font-small-2"><i class="icon-checkmark2"></i> Custom design pages</p>
    <p class="font-small-2"><i class="icon-checkmark2"></i> Saving quota usage by using a single page application</p>
    <p class="font-small-2"><i class="icon-checkmark2"></i> Get saldo total up to Rp. 149.000,00</p>
    <h5 class="border-bottom-black">Benefits</h5>
    <p class="font-small-2"><i class="icon-checkmark2"></i> We guarantee your online business will be 100% successful.</p>
    <p class="font-small-2"><i class="icon-checkmark2"></i> We have very sophisticated security so your data will be safe from cybercrime</p>
    <button type="button" class="btn btn-info">Rp. 250.000,00</button> 
    </div>
    </div>  
    </div>
  </div><!-- col-xl-5 -->
  <div class="col-xl-3 col-md-3 col-lg-3 col-xs-6">
    <div class="card box-shadow-2 mt-3 wow fadeInDown" data-wow-duration="2s">
    <div class="card-header"><h4 class="card-title">Member 12 Month</h4></div>
    <div class="card-body">
    <div class="card-block">
    <h5 class="border-bottom-black">Facilities</h5>
    <p class="font-small-2"><i class="icon-checkmark2"></i> Dashboard pages comprehensive</p>
    <p class="font-small-2"><i class="icon-checkmark2"></i> Get clients unlimited</p>
    <p class="font-small-2"><i class="icon-checkmark2"></i> File storage up to 50GB</p>
    <p class="font-small-2"><i class="icon-checkmark2"></i> Get Restful API tokens</p>
    <p class="font-small-2"><i class="icon-checkmark2"></i> Custom design pages</p>
    <p class="font-small-2"><i class="icon-checkmark2"></i> Saving quota usage by using a single page application</p>
    <p class="font-small-2"><i class="icon-checkmark2"></i> Get saldo total up to Rp. 220.000,00</p>
    <h5 class="border-bottom-black">Benefits</h5>
    <p class="font-small-2"><i class="icon-checkmark2"></i> We guarantee your online business will be 100% successful.</p>
    <p class="font-small-2"><i class="icon-checkmark2"></i> We have very sophisticated security so your data will be safe from cybercrime</p>
    <button type="button" class="btn btn-info">Rp. 449.000,00</button> 
    </div>
    </div>  
    </div>
  </div><!-- col-xl-5 -->
</div><!-- col-xl-12 -->
</section><!--  section -->
</div><!-- parallax -->
<script src="{{asset('vendor/robust/themes/robust/app-assets/js/core/libraries/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendor/parallax/parallax.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
  $(".datepicker").datepicker({
      changeMonth: true,
      changeYear: true
  });
$('#footerStyle').css("display", "none");
$('#navbarStyle').css("display", "none");
$('#menuStyle').css("display", "none");
$('#appContentStyle').css("margin", "0");
});
$('#contentwrapperStyle').css("padding", "0px");
$('.parallax-window').parallax({imageSrc:"{{asset('image/walpaper-9.jpg')}}"});
$('.parallax-window-2').parallax({imageSrc:"{{asset('image/walpaper-3.jpg')}}"});
</script>
<script type="text/javascript">
  //$.get("{{url('/api/category?page=1')}}", function(data) {
    /*optional stuff to do after success */
    //for(var gets in data.data){
      //console.log(data.data[gets].name);
    //}
  //});
$.get("{{url('api/users')}}", function(data) {
  $('#oneMonthFacilitiesOne').html(data.members.one_month.facilities.one);
  $('#oneMonthFacilitiesTwo').html(data.members.one_month.facilities.two);
  $('#oneMonthFacilitiesThree').html(data.members.one_month.facilities.three);
  $('#oneMonthFacilitiesFourth').html(data.members.one_month.facilities.fourth);
  $('#oneMonthFacilitiesFive').html(data.members.one_month.facilities.five);
  $('#oneMonthFacilitiesSix').html(data.members.one_month.facilities.six);
  $('#oneMonthFacilitiesSeven').html(data.members.one_month.facilities.seven);
  //benefits
  $('#oneMonthBenefitOne').html(data.members.one_month.benefits.one);
  $('#oneMonthBenefitTwo').html(data.members.one_month.benefits.two);
});
</script>
<script type="text/javascript" src="{{asset('/vendor/animate/wow.min.js')}}"></script>
<script>
    wow = new WOW(
    );
    wow.init();
  </script>
</body>
</html>