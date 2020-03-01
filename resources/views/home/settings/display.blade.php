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
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <style type="text/css">
    body{
    scroll-behavior: smooth;
    }
    </style>
  </head>
  <body>
    <div class="col-xl-12 p-0 position-fixed col-md-12">
      <div class="match-height">
        <div class="col-xl-1 col-md-2 p-0">
          <div class="card font-small-1">
            <div class="card-body">
              <div class="card-block p-0 pt-1">
                <form id="formDisplay">@csrf
                  <p class="mb-0 text-xl-center font-small-2 border-bottom-black"><<< Navbar >>></p>
                  
                  <input type="hidden" name="myID" value="{{Auth()->user()->id}}">
                  
                  <select class="mt-1 custom-select col-xl-12" name="navbar" data-toggle="popover" data-content="Choose one your theme navbar" data-trigger="hover" data-original-title="Navbar Theme">
                    <option value="navbar-light" selected>Navbar Light</option>
                    <option value="navbar-dark">Navbar Dark</option>
                  </select>
                  
                  <select name="navbar_font_size" title="Font Size" class="custom-select col-xl-12" data-toggle="popover" data-content="Font size in navbar" data-trigger="hover" data-original-title="Font Navbar">
                    <option value="5px">5 px</option><option value="6px">6 px</option><option value="7px">7 px</option><option value="8px">8 px</option><option value="9px">9 px</option><option value="10px">10 px</option><option value="11px">11 px</option><option value="12px">12 px</option><option value="13px">13 px</option><option value="14px">14 px</option><option value="15px">15 px</option><option value="16px">16 px</option><option value="17px">17 px</option><option value="18px">18 px</option><option value="19px">19 px</option><option value="20px">20 px</option><option value="21px">21 px</option><option value="22px">22 px</option>
                    
                  </select>
                  <p class="mb-0 text-xl-center pt-1 font-small-2 border-bottom-black"><<< Menu >>></p>
                  <select class="mt-1 custom-select col-xl-12" name="main_menu" data-toggle="popover" data-content="Choose one your menu themes" data-trigger="hover" data-original-title="Menu Theme">
                    <option value="menu-light" selected>Menu Light</option>
                    <option value="menu-dark">Menu Dark</option>
                  </select>
                  
                  <select class="custom-select col-xl-12" name="main_menu_status" data-toggle="popover" data-content="Choose style menu" data-trigger="hover" data-original-title="Style Menu">
                    <option value="menu-expanded" selected>Menu Expanded</option>
                    <option value="menu-collapsed">Menu Collapse</option>
                  </select>
                  
                  <select class="custom-select col-xl-12" name="main_menu_font_size" data-toggle="popover" data-content="Font size in main menu" data-trigger="hover" data-original-title="Font Main Menu">
                    <option value="5px">5 px</option><option value="6px">6 px</option><option value="7px">7 px</option><option value="8px">8 px</option><option value="9px">9 px</option><option value="10px">10 px</option><option value="11px">11 px</option><option value="12px">12 px</option><option value="13px">13 px</option><option value="14px">14 px</option><option value="15px">15 px</option><option value="16px">16 px</option><option value="17px">17 px</option><option value="18px">18 px</option><option value="19px">19 px</option><option value="20px">20 px</option><option value="21px">21 px</option><option value="22px">22 px</option>
                  </select>
                  <p class="mb-0 text-xl-center pt-1 font-small-2 border-bottom-black"><<< Body >>></p>
                  
                  <select class="custom-select col-xl-12" name="body_walpaper" data-toggle="popover" data-content="Choose background image in body" data-trigger="hover" data-original-title="Background With Image">
                    <option value="" selected>No walpaper</option>
                    <option value="walpaper-1">Walpaper 1</option>
                    <option value="walpaper-2">Walpaper 2</option>
                    <option value="walpaper-3">Walpaper 3</option>
                    <option value="walpaper-4">Walpaper 4</option>
                    <option value="walpaper-5">Walpaper 5</option>
                    <option value="walpaper-6">Walpaper 6</option>
                    <option value="walpaper-7">Walpaper 7</option>
                    <option value="walpaper-8">Walpaper 8</option>
                    <option value="walpaper-9">Walpaper 9</option>
                    <option value="walpaper-10">Walpaper 10</option>
                  </select>
                  <input type="color" name="body_color" title="Background Color" class="form-control col-xl-12">
                  
                  <select class="custom-select col-xl-12" name="body_page" title="Type Pages">
                    <option value="multipage">Multipage</option>
                    <option value="singlepage">Singlepage</option>
                  </select>
                  <p class="mb-0 text-xl-center pt-1 font-small-2 border-bottom-black"><< Animations >></p>
                  <select class="custom-select col-xl-12" name="animate_status" title="Animations Pages">
                    <option value="use-animate">Use animations</option>
                    <option value="no-animate">No animations</option>
                  </select>
                  <select class="custom-select col-xl-12" name="animate_time" title="Time Animations">
                    <option value="1s">1 seconds</option><option value="2s">2 seconds</option><option value="3s">3 seconds</option><option value="4s">4 seconds</option><option value="5s">5 seconds</option>
                  </select>
                  <button id="storeData" class="btn btn-primary col-xl-12 mt-1">Save</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-10 col-md-8 p-0" style="min-height: 550px;">
          <div class="card resizable draggable">
            <div class="card-header">
              <h5 class="card-title">Your Session Display</h5>
              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                  <li><a id="refreshFrame"><i class="icon-reload"></i></a></li>
                  <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                  <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="card-block p-0" id="framePreview">
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-1 col-md-2 p-0">
          <div class="card font-small-1">
            <div class="card-body">
              <div class="card-block">
              </div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLong">Walpapper</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>{{-- ./col-xl-12 --}}
  <!-- BEGIN VENDOR JS-->
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
  <script src="{{asset('vendor/parallax/parallax.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('vendor/robust/themes/robust/app-assets/js/scripts/tooltip/tooltip.js')}}" type="text/javascript"></script>
  <script src="{{asset('vendor/robust/themes/robust/app-assets/js/scripts/popover/popover.js')}}" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
  <script>
  $(document).ready(function(){
  $.ajaxSetup({
  headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
  });
  $('#storeData').click(function(e){
  e.preventDefault();
  $.ajax({
  method: 'post',
  url: "{{route('setting.storedisplay')}}",
  data: $('#formDisplay').serialize(),
  success: function(){
  $('#framePreview').html("<iframe src='{{url('settings/preview')}}' width='100%' height='550px'></iframe>");
  },
  error:function(e){
  console.log(e);
  }
  });
  });
  $('.resizable').resizable();
  $('.draggable').draggable();
  $('.tooltipCustom').tooltip();
  $('#framePreview').html("<iframe src='{{url('settings/preview')}}' width='100%' height='550px'></iframe>");
  $('#refreshFrame').click(function(){
  $('#framePreview').html("<iframe src='{{url('settings/preview')}}' width='100%' height='550px'></iframe>");
  })
  });
  </script>
</body>
</html>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Preview</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="col-xl-12">
        <div class="bd-example">
          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="5"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="6"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="7"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="8"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="9"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{asset('image/walpaper-1.jpg')}}" class="d-block w-100" style="height:550px;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Walpaper 1</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{asset('image/walpaper-2.jpg')}}" class="d-block w-100" style="height:550px;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Walpaper 2</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{asset('image/walpaper-3.jpg')}}" class="d-block w-100" style="height:550px;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Walpaper 3</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{asset('image/walpaper-4.jpg')}}" class="d-block w-100" style="height:550px;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Walpaper 4</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{asset('image/walpaper-5.jpg')}}" class="d-block w-100" style="height:550px;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Walpaper 5</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{asset('image/walpaper-6.jpg')}}" class="d-block w-100" style="height:550px;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Walpaper 6</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{asset('image/walpaper-7.jpg')}}" class="d-block w-100" style="height:550px;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Walpaper 7</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{asset('image/walpaper-8.jpg')}}" class="d-block w-100" style="height:550px;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Walpaper 8</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{asset('image/walpaper-9.jpg')}}" class="d-block w-100" style="height:550px;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Walpaper 9</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{asset('image/walpaper-10.jpg')}}" class="d-block w-100" style="height:550px;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Walpaper 10</h5>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>