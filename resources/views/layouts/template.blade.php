<!DOCTYPE html>
<html>
  <head>@auth
    <title>{{$title}}</title>@endauth
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="10800;url={{url('/login')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--if use internet
    <link href="https://pagecdn.io/lib/font-awesome/5.12.0-1/css/all.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mobile-detect/1.4.4/mobile-detect.min.js"></script>
    <link rel="stylesheet" href="{{asset('/vendor/template/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/vendor/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/vendor/template/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/vendor/multi-theme/src/css/application.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/vendor/animate/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/responsive.css')}}">
    <!--Icons-->
    <link rel="icon" type="image/x-icon" href="{{asset('/vendor/icon/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{asset('/vendor/icon/simple-celtic-knot-152-267423.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('/vendor/icon/simple-celtic-knot-144-267423.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{asset('/vendor/icon/simple-celtic-knot-120-267423.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('/vendor/icon/simple-celtic-knot-114-267423.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('/vendor/icon/simple-celtic-knot-72-267423.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('/vendor/icon/simple-celtic-knot-57-267423.png')}}">
    <link rel="icon" href="{{asset('/vendor/icon/simple-celtic-knot-32-267423.png')}}" sizes="32x32">
    @yield('css')
  </head>
  <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    @if ($message = Session::get('success'))
    <div class="alert alert-danger wow slideInLeft alert-dismissible fade show" role="alert" id="alert-success" data-wow-duration="2s">
      {{$message}}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert-errors">
      <strong>Whoops!</strong> There were some problems with your input.
      <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>
    @endforeach</ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>@endif
  <div class="wrapper">
    @include('layouts.templateNavbar')
    @include('layouts.templateAside')
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          @yield('header')
        </div>
        </div><!-- /.content-header -->
        <section class="content" style="padding:0;">
          <div class="container-fluid">
            <div class="row">
              <div id="app">
              <app></app>
            </div>
            @yield('content')
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </section><!-- /.content -->
            <button class="btn btn-danger" id="myBtn" onclick="topFunction()"><i class="fas fa-arrow-alt-circle-up"></i></button>
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
              <div class="col-xl-6 float-left">
                <p><a href="{{route('about.disclaimer')}}" class="footer-link" data-toggle="tooltip" data-placement="right" title="View Disclaimer...">Disclaimer</a></p>
                <p><a href="{{route('about.programming')}}" class="footer-link" data-toggle="tooltip" data-placement="right" title="View Programming...">Programming</a></p>
              </div>
              <div class="col-xl-6 float-left">
                <p><a href="{{route('about.privacy')}}" class="footer-link" data-toggle="tooltip" data-placement="right" title="View Privacy & Policy...">Privacy & Policy</a></p>
                <p><a href="{{route('about.community')}}" class="footer-link" data-toggle="tooltip" data-placement="right" title="View Community...">Community</a></p>
              </div>
              <strong class="cinzel-bold">Copyright &copy; 2020.</strong>
              <span class="cinzel-bold">All rights reserved.</span>
            </footer>
          </div>
          <!-- ./wrapper -->
          <!--------------script--------------------------->
          <script src="{{asset('/vendor/template/plugins/jquery/jquery.min.js')}}"></script>
          <script type="text/javascript" src="{{asset('/vendor/animate/wow.min.js')}}"></script>
          <script>
          wow = new WOW(
          );
          wow.init();
          </script>
          <script src="{{asset('/vendor/template/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
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
          <script src="{{asset('/vendor/template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
          <script src="{{asset('/vendor/template/plugins/summernote/summernote-bs4.min.js')}}"></script>
          <script src="{{asset('/vendor/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
          <script src="{{asset('/vendor/template/dist/js/adminlte.js')}}"></script>
          <script src="{{asset('/vendor/template/dist/js/demo.js')}}"></script>
          <script type="text/javascript">
          $(function () {
          $('[data-toggle="tooltip"]').tooltip()
          })
          </script>
          <!-- ChartJS -->
          <script src="{{asset('vendor/template/plugins/chart.js/Chart.min.js')}}"></script>
          @yield('js')
        </body>
      </html>