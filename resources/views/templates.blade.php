<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="refresh" content="10800;url={{url('/login')}}">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @auth
        <title>{{$title}}</title>@endauth
        <link rel="apple-touch-icon" sizes="60x60" href="/vendor/robust/themes/robust/app-assets/images/ico/apple-icon-60.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/vendor/robust/themes/robust/app-assets/images/ico/apple-icon-76.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/vendor/robust/themes/robust/app-assets/images/ico/apple-icon-120.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/vendor/robust/themes/robust/app-assets/images/ico/apple-icon-152.png">
        <link rel="shortcut icon" type="image/x-icon" href="/vendor/robust/themes/robust/app-assets/images/ico/favicon.ico">
        <link rel="shortcut icon" type="image/png" href="/vendor/robust/themes/robust/app-assets/images/ico/favicon-32.png">
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
        <link rel="stylesheet" type="text/css" href="{{asset('vendor/robust/themes/robust/assets/css/style.css')}}">
        <!-- BEGIN Custom CSS-->
        <link rel="stylesheet" href="{{asset('/vendor/template/plugins/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/vendor/multi-theme/src/css/application.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/vendor/animate/animate.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/css/responsive.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('vendor/robust/themes/robust/assets/css/style.css')}}">
        <!-- END Custom CSS-->
        @yield('css')
    </head>
    <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar" id="bodyStyle">
        <div class="alert alert-success alert-dismissible fade in mb-2" role="alert" id="alertSuccess" style="position: fixed;z-index: 99;right: 0;display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <span id="alertSuccessContent"></span>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade in mb-2" role="alert" style="position: fixed;z-index: 99;right: 0;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <strong>Well done!</strong> {{$message}}
        </div>
        @endif
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade in mb-2" role="alert" style="position: fixed;z-index: 99;right: 0;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <strong>Warning</strong> {{$message}}
        </div>
        @endif
        @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade in mb-2" role="alert" style="position: fixed;z-index: 99;right: 0;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <strong>Whoops!</strong> There were some problems with your input.
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>
        @endforeach</ul>
    </div>
    @endif
    <!-- navbar-fixed-top-->
    @include('navbar')
    <!-- main menu-->
    @include('mainmenu')
    <div class="app-content content container-fluid" id="appContentStyle">
        <div class="content-wrapper" id="contentwrapperStyle">
            <div class="content-header row"></div>
            <div class="content-body" id="content">
                <div id="alert"></div>
                @yield('content')
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <footer class="footer footer-static bg-info bg-darken-3 navbar-border" id="footerStyle" style="display: none;">
        <div class="col-xl-6 float-left">
            <p><a href="{{route('about.disclaimer')}}" class="text-white" style="font-weight: 900;" data-toggle="tooltip" data-placement="right" title="View Disclaimer...">Disclaimer</a></p>
            <p><a href="{{route('about.programming')}}" class="text-white" style="font-weight: 900;" data-toggle="tooltip" data-placement="right" title="View Programming...">Programming</a></p>
        </div>
        <div class="col-xl-6 float-left">
            <p><a href="{{route('about.privacy')}}" class="text-white" style="font-weight: 900;" data-toggle="tooltip" data-placement="right" title="View Privacy & Policy...">Privacy & Policy</a></p>
            <p><a href="{{route('about.community')}}" class="text-white" style="font-weight: 900;" data-toggle="tooltip" data-placement="right" title="View Community...">Community</a></p>
        </div>
        <p class="clearfix text-muted text-sm-center mb-0 px-2">
            <span class="float-md-left d-xs-block d-md-inline-block text-white">Copyright  &copy; 2020 <a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank" class="text-bold-800 text-white">FERDIANSYAH </a>, All rights reserved. </span>
            <span class="float-md-right d-xs-block d-md-inline-block text-white">Hand-crafted & Made with <i class="icon-heart5 pink"></i></span>
        </p>
    </footer>
    <!-- Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document" style="max-width: 1060px !important;">
        <div class="modal-content">
          <div class="modal-header">
            
            <fieldset class="row py-2 col-xl-10 col-md-10">
            <div class="input-group col-xs-12">
                <input type="text" class="keySearch form-control form-search form-control-lg input-lg border-grey border-lighten-1 " placeholder="Search..." aria-describedby="button-addon2" name="search">
                <span class="input-group-btn" id="button-addon2">
                    <button class="btn btn-lg btn-secondary border-grey border-lighten-1" type="button"><i class="icon-ios-search-strong"></i></button>
                </span>
            </div>
            </fieldset>
            <fieldset class="row py-2 col-md-2">
                <select class="customselect custom-select form-control form-control-lg input-lg border-grey border-lighten-1 ">
                    <option value="product" selected>Product</option>
                    <option value="users">User</option>
                </select>
            </fieldset>
          </div>
          <div class="modal-body">
            
            <p id="countSearchText"></p>
            <div id="searchBody"></div>
          </div>
          <div class="modal-footer">
            <h5 class="modal-title btn btn-primary" style="display: none;" id="searchModalTitle"></h5>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-info" id="nextSearch" data-id="">Next</button>
          </div>
        </div>
      </div>
    </div>
    @yield('modal')
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
    <script src="{{asset('vendor/robust/themes/robust/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
    <script src="{{asset('vendor/robust/themes/robust/app-assets/js/core/app.js')}}" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    @auth
    <script defer>
    sessionStorage.setItem("account",JSON.stringify([
      "{{Auth()->user()->name}}",
      "{{Auth()->user()->email}}",
      "{{Auth()->user()->created_at}}",
    ])
    );
    
    </script>
    <script src="{{asset('js/search.js')}}" type="text/javascript" defer></script>
    @endauth
    @yield('js')
    @yield('ajax')
</body>
</html>
<!--- & C:/Users/ferdi/AppData/Local/Programs/Python/Python38-32/python.exe -u "c:\wamp64\www\product2\public\py\jarvis.py"-->