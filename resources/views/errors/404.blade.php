<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Error 400</title>
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('vendor/robust/themes/robust/app-assets/images/ico/apple-icon-60.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('vendor/robust/themes/robust/app-assets/images/ico/apple-icon-76.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('vendor/robust/themes/robust/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('vendor/robust/themes/robust/app-assets/images/ico/apple-icon-152.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('vendor/robust/themes/robust/app-assets/images/ico/favicon.ico')}}">
    <link rel="shortcut icon" type="image/png" href="{{asset('vendor/robust/themes/robust/app-assets/images/ico/favicon-32.png')}}">
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
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/robust/themes/robust/app-assets/css/pages/error.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/robust/themes/robust/assets/css/style.css')}}">
    <!-- END Custom CSS-->
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body" style="margin-top: 30px;"><section class="flexbox-container">
    <div class="col-md-10 offset-md-1 col-xs-10 offset-xs-1">
    <div class="card-header bg-transparent no-border">
        <h2 class="error-code text-xs-center mb-2">404</h2>
        <h3 class="text-uppercase text-xs-center">Not Founds Page</h3>
    </div>
    <div class="card-body collapse in">
        <fieldset class="row py-2">
            <div class="input-group col-xs-12">
                <input type="text" class="form-control form-control-lg input-lg border-grey border-lighten-1 " placeholder="Search..." aria-describedby="button-addon2" name="search" id="keyword">
                <span class="input-group-btn" id="button-addon2">
					<button class="btn btn-lg btn-secondary border-grey border-lighten-1" type="button"><i class="icon-ios-search-strong"></i></button>
				</span>
            </div>
        </fieldset>
        <div class="row py-2">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <a href="index.html" class="btn btn-primary btn-block font-small-3"><i class="icon-home3"></i> Back to Home</a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <a href="#" class="btn btn-danger btn-block font-small-3"><i class="icon-ios-search-strong"></i>  Advanced search</a>
            </div>
            </div>
            <div class="card" id="cardContent" style="display: none;">
            	<div class="card-header" id="headerContent"></div>
            	<div class="card-block" id="contentStyle" style="max-height: 610px;overflow: auto;"></div>
            </div>
        </div>
        <div class="card-footer bg-transparent">
            <div class="row">
                <p class="text-muted text-xs-center col-xs-12 py-1">© 2020 <a href=""><?php echo $_SERVER['SERVER_NAME'];?> </a>Crafted with <i class="icon-heart5 pink"> </i> by <a href="http://themeforest.net/user/pixinvent/portfolio" target="_blank">FERDIANSYAH</a></p>
                <div class="text-xs-center">
                    <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-facebook"><span class="icon-facebook3"></span></a>
                    <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-twitter"><span class="icon-twitter3"></span></a>
                    <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-linkedin"><span class="icon-linkedin3 font-medium-4"></span></a>
                    <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-github"><span class="icon-github font-medium-4"></span></a>
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <script src="{{asset('vendor/robust/themes/robust/app-assets/js/core/libraries/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('vendor/robust/themes/robust/app-assets/vendors/js/ui/tether.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('vendor/robust/themes/robust/app-assets/js/core/libraries/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('vendor/robust/themes/robust/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('vendor/robust/themes/robust/app-assets/vendors/js/ui/unison.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('vendor/robust/themes/robust/app-assets/vendors/js/ui/blockUI.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('vendor/robust/themes/robust/app-assets/vendors/js/ui/jquery.matchHeight-min.js')}}" type="text/javascript"></script>
    <script src="{{asset('vendor/robust/themes/robust/app-assets/vendors/js/ui/screenfull.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('vendor/robust/themes/robust/app-assets/vendors/js/extensions/pace.min.js')}}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset('vendor/robust/themes/robust/app-assets/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="{{asset('vendor/robust/themes/robust/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
    <script src="{{asset('vendor/robust/themes/robust/app-assets/js/core/app.js')}}" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('body').on('keyup','#keyword',function(e){
		$('.product').remove();
		e.preventDefault();
		var value = $(this).val();
		$.get("{{url('searching?search=')}}"+value, function(data) {
			if(value == ''){
				$('#cardContent').css('display','block');
				$('.product').remove();
				$('#contentStyle').html("<h3 class='text-uppercase notfound text-xs-center'>No Data Found</h3>");
			}
			else{
			$.each(data.data, function(index, val) {
				$('.notfound').empty();
				$('#cardContent').css('display','block');
				$('#headerContent').html("<h5>Total data result : "+data.total+"</h5>");
					 $('#contentStyle')
					 .append("<div class='product col-xl-3' id='products' data-id="+val.id+"><img src="+"{{url('/storage/image')}}"+'/'+val.main_pictures+" width='100%' height='120px'>"+val.title+"</div>");
				});
			}
				
		});
		
	});
});
</script>
  </body>
</html>
