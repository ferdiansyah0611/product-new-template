<?php
$getdisplay = DB::table('session_displays')->where('user_id', Auth()->user()->id)->get();
foreach($getdisplay as $get){
?>
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
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar <?php echo $get->main_menu_status;?>" id="bodyStyle" style="background: <?php if($get->body_color == null){ echo "url(".asset('image/'.$get->body_walpaper.'.jpg').")"; }if($get->body_walpaper == null){echo $get->body_color;}?> !important;">
    <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top <?php echo $get->navbar;?> navbar-shadow" id="navbarStyle">
      <div class="navbar-wrapper">
        <div class="navbar-header" style="height: 59px;">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left">
              <a class="nav-link nav-menu-main menu-toggle hidden-xs">
                <i class="icon-social-windows font-large-1">
                </i>
              </a>
            </li>
            <li class="nav-item">
              <a class="navbar-brand nav-link">
                <img alt="branding logo" src="{{asset('vendor/robust/themes/robust/app-assets/images/logo/robust-logo-light.png')}}" data-expand="{{asset('vendor/robust/themes/robust/app-assets/images/logo/robust-logo-light.png')}}" data-collapse="{{asset('vendor/robust/themes/robust/app-assets/images/logo/robust-logo-small.png')}}" class="brand-logo">
              </a>
            </li>
            <li class="nav-item hidden-md-up float-xs-right">
              <a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container">
                <i class="icon-ellipsis pe-2x icon-icon-rotate-right-right">
                </i>
              </a>
            </li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down">
                <a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-social-windows"></i></a></li>
                @auth
                <li class="nav-item hidden-sm-down">
                  <a href="javascript:void(0)" class="nav-link nav-link-reload" id="reload_page">
                    <i class="ficon icon-reload">
                    </i>
                  </a>
                </li>
                @endauth
                @auth
                <li class="nav-item hidden-sm-down">
                  <a href="" class="nav-link" data-toggle="tooltip" title="My Saldo" data-placement="bottom">Rp. {{Auth()->user()->saldo}}</a></li>@endauth
                </ul>
                <ul class="nav navbar-nav float-xs-right">
                  <li class="dropdown dropdown-language nav-item">
                    @auth
                    @if(Auth()->user()->languange == 'en')
                    <a id="dropdown-flag" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link">
                      <i class="flag-icon flag-icon-gb"></i>
                      <span class="selected-language">English</span>
                    </a>@endif
                    @if(Auth()->user()->languange == 'id')
                    <a id="dropdown-flag" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link">
                      <i class="flag-icon flag-icon-id"></i>
                      <span class="selected-language">Indonesia</span>
                    </a>@endif
                    @if(Auth()->user()->languange == 'de')
                    <a id="dropdown-flag" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link">
                      <i class="flag-icon flag-icon-de"></i>
                      <span class="selected-language">German</span>
                    </a>@endif
                    @if(Auth()->user()->languange == 'zh-Hans')
                    <a id="dropdown-flag" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link">
                      <i class="flag-icon flag-icon-cn"></i>
                      <span class="selected-language">China</span>
                    </a>@endif
                    @if(Auth()->user()->languange == 'fr')
                    <a id="dropdown-flag" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link">
                      <i class="flag-icon flag-icon-fr"></i>
                      <span class="selected-language">France</span>
                    </a>@endif
                    <div aria-labelledby="dropdown-flag" class="dropdown-menu">
                      <a href="javascript:void(0)" class="dropdown-item">
                        <form action="{{route('setting.changelang')}}" method="POST">@csrf
                          <input type="text" name="langID" value="en" hidden>
                          <button type="submit" class="btn btn-primary"><i class="flag-icon flag-icon-gb"></i> English</button>
                        </form></a>
                        <a href="javascript:void(0)" class="dropdown-item">
                          <form action="{{route('setting.changelang')}}" method="POST">@csrf
                            <input type="text" name="langID" value="id" hidden>
                            <button type="submit" class="btn btn-primary"><i class="flag-icon flag-icon-id"></i> Indonesian</button>
                          </form></a>
                          <a href="javascript:void(0)" class="dropdown-item">
                            <form action="{{route('setting.changelang')}}" method="POST">@csrf
                              <input type="text" name="langID" value="fr" hidden>
                              <button type="submit" class="btn btn-primary"><i class="flag-icon flag-icon-fr"></i> French</button>
                            </form></a>
                            <a href="javascript:void(0)" class="dropdown-item">
                              <form action="{{route('setting.changelang')}}" method="POST">@csrf
                                <input type="text" name="langID" value="zh-Hans" hidden>
                                <button type="submit" class="btn btn-primary"><i class="flag-icon flag-icon-cn"></i> Chinese</button>
                              </form></a>
                              <a href="javascript:void(0)" class="dropdown-item">
                                <form action="{{route('setting.changelang')}}" method="POST">@csrf
                                  <input type="text" name="langID" value="de" hidden>
                                  <button type="submit" class="btn btn-primary"><i class="flag-icon flag-icon-de"></i> Germany</button>
                                </form></a>
                              </div>
                              @endauth
                            </li>
                            @auth
                            <li class="dropdown dropdown-notification nav-item" id="notifAll">
                              <a href="#" data-toggle="dropdown" class="nav-link nav-link-label"><i class="ficon icon-bell4"></i><span class="tag tag-pill tag-default tag-danger tag-default tag-up"><?php echo $cou = DB::table('notifications')->where('email_to', Auth()->user()->email)->where('status', '0')->count(); ?></span></a>
                              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                  <h6 class="dropdown-header m-0"><span class="grey darken-2">{{ __('menu.notif') }}</span><span class="notification-tag tag tag-default tag-danger float-xs-right m-0"><?php echo $cou = DB::table('notifications')->where('email_to', Auth()->user()->email)->where('status', '0')->count(); ?> New</span></h6>
                                </li>
                                <li class="list-group scrollable-container">
                                  <?php
                                  $comment = DB::table('notifications')->where('email_to', Auth()->user()->email)->where('status', '0')->orderBy('created_at', 'DESC')->paginate('1');
                                  foreach($comment as $com){
                                  if($com->to == 'question'){
                                  echo "<a href='".url('/')."productions/".$com->link."/views"."' class='list-group-item'>";
                                    echo "<div class='media'>";
                                      echo "<div class='media-left valign-middle'>";
                                      echo "<i class='icon-speech-bubble icon-bg-circle bg-cyan'></i></div>";
                                      echo "<div class='media-body'>";
                                        echo "<h6 class='media-heading'>You have new comment!</h6>";
                                        echo "<p class='notification-text font-small-3 text-muted'>".$com->notification."</p><small>";
                                        echo "<time class='media-meta text-muted'>".\Carbon\Carbon::parse($com->created_at)->diffForHumans()."</time></small>";
                                      echo "</div></div></a>";
                                      }
                                      if($com->to == 'production'){
                                      echo "<a href='".url('/')."productions/".$com->link."/views"."' class='list-group-item'>";
                                        echo "<div class='media'>";
                                          echo "<div class='media-left valign-middle'>";
                                          echo "<i class='icon-speech-bubble icon-bg-circle bg-cyan'></i></div>";
                                          echo "<div class='media-body'>";
                                            echo "<h6 class='media-heading'>You have new product!</h6>";
                                            echo "<p class='notification-text font-small-3 text-muted'>".$com->notification."</p><small>";
                                            echo "<time class='media-meta text-muted'>".\Carbon\Carbon::parse($com->created_at)->diffForHumans()."</time></small>";
                                          echo "</div></div></a>";
                                          }
                                          if($com->to == 'purchases'){
                                          echo "<a href='".url('/')."productions/".$com->link."/views"."' class='list-group-item'>";
                                            echo "<div class='media'>";
                                              echo "<div class='media-left valign-middle'>";
                                              echo "<i class='icon-social-usd icon-bg-circle bg-cyan'></i></div>";
                                              echo "<div class='media-body'>";
                                                echo "<h6 class='media-heading'>You have new purchases!</h6>";
                                                echo "<p class='notification-text font-small-3 text-muted'>".$com->notification."</p><small>";
                                                echo "<time class='media-meta text-muted'>".\Carbon\Carbon::parse($com->created_at)->diffForHumans()."</time></small>";
                                              echo "</div></div></a>";
                                              }
                                              }
                                              ?>
                                            </li>
                                            <li class="dropdown-menu-footer">
                                              <div class="row">
                                                <form class="col-xl-6">@csrf
                                                  <button id="readNotification" class="btn btn-danger">{{ __('menu.readallnotif') }}</button>
                                                </form>
                                                <form class="col-xl-6">@csrf
                                                  <button id="deleteNotification" class="btn btn-danger">Delete All Notif</button>
                                                </form>
                                              </div>
                                            </li>
                                          </ul>
                                        </li>
                                        @endauth
                                        @auth
                                        <li class="dropdown dropdown-notification nav-item" id="notifMessages">
                                          <a href="#" data-toggle="dropdown" class="nav-link nav-link-label">
                                            <i class="ficon icon-mail6"></i>
                                            <span class="tag tag-pill tag-default tag-info tag-default tag-up">
                                            <?php echo $count = DB::table('messages')->where('to', Auth()->user()->email)->where('status', '0')->count(); ?></span></a>
                                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                              <li class="dropdown-menu-header">
                                                <h6 class="dropdown-header m-0"><span class="grey darken-2">{{ __('menu.messages') }}</span>
                                                <span class="notification-tag tag tag-default tag-info float-xs-right m-0">
                                                <?php echo $count = DB::table('messages')->where('to', Auth()->user()->email)->where('status', '0')->count(); ?> {{ __('menu.new') }}</span></h6>
                                              </li>
                                              <li class="list-group scrollable-container">
                                                <?php $data = DB::table('messages')->where('to', Auth()->user()->email)->where('messages.status', '0')->join('users', 'messages.user_id', '=', 'users.id')->get();
                                                $user = DB::table('users')->join('messages', 'users.id', '=', 'messages.user_id')->where('messages.status', '0')->paginate('1');
                                                foreach($user as $d){
                                                $getUser = DB::table('users')->where('user_id', $d->user_id)->paginate('5');
                                                echo "<a href='".route('messages.show', $d->id)."' class='list-group-item'>";
                                                  echo "<div class='media'>";
                                                    if($d->avatars == true){
                                                    echo "<div class='media-left'><span class='avatar avatar-sm avatar-online rounded-circle'><img src='".asset($d->avatars)."' alt='avatar'></span></div>";
                                                    }
                                                    if($d->avatars == null){
                                                    echo "<div class='media-left'><span class='avatar avatar-sm avatar-online rounded-circle'><img src='".asset('user-default.png')."' alt='avatar'></span></div>";
                                                    }
                                                    echo "<div class='media-body'>";
                                                      echo "<h6 class='media-heading'>".$d->name."</h6>";
                                                      echo "<p class='notification-text font-small-3 text-muted'>".base64_decode($d->messages)."</p><small>";
                                                      echo "<time datetime='2015-06-11T18:29:20+08:00' class='media-meta text-muted'>".\Carbon\Carbon::parse($d->created_at)->diffForHumans()."</time></small>";
                                                    echo "</div>";
                                                  echo "</div></a>";
                                                  }//foreach?>
                                                </li>
                                                <li class='dropdown-menu-footer'>
                                                  <a href='javascript:void(0)' class='dropdown-item text-muted text-xs-center'>";
                                                    
                                                  {{ __('menu.readallmessages') }}</a></li>
                                                </ul>
                                              </li>
                                              @endauth
                                              @guest
                                              <li class="nav-item">
                                                <a href="{{url('/login')}}" class="nav-link"><i class="icon-arrow36"></i></a>
                                              </li>@endguest
                                              @auth
                                              <li class="dropdown dropdown-user nav-item">
                                                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link">
                                                  
                                                  <span class="avatar avatar-online">
                                                    @if(Auth()->user()->avatars == null)
                                                    <img src="{{asset('user-default.png')}}" alt="avatar">
                                                    @endif
                                                    @if(Auth()->user()->avatars == true)
                                                    <img src="{{asset(Auth()->user()->avatars)}}" alt="avatar">
                                                    @endif
                                                  <i></i></span>
                                                  <span class="user-name">{{Auth::user()->name}}</span></a>
                                                  @endauth
                                                  @auth
                                                  <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="{{route('setting.account')}}" class="dropdown-item">
                                                    <i class="icon-head"></i> {{ __('menu.editprofile') }}</a>
                                                    <a href="{{route('messages.inbox')}}" class="dropdown-item">
                                                    <i class="icon-mail6"></i> {{ __('menu.myinbox') }}</a>
                                                    <a href="#" class="dropdown-item">
                                                    <i class="icon-clipboard2"></i> {{ __('menu.task') }}</a>
                                                    <a href="#" class="dropdown-item">
                                                    <i class="icon-calendar5"></i> {{ __('menu.calendar') }}</a>
                                                    <div class="dropdown-divider"></div><a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    <i class="icon-power3"></i>{{ __('menu.logout') }}
                                                  </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                                              </div>
                                              @endauth
                                            </li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </nav>
                                  <!-- main menu-->
                                  <div data-scroll-to-active="true" class="main-menu menu-fixed <?php echo $get->main_menu?> menu-accordion menu-shadow" id="menuStyle">
                                    <!-- main menu header-->
                                    <div class="main-menu-header">
                                      <form method="get" action="{{url('/searching')}}">
                                        <input type="text" name="search" placeholder="Search" class="menu-search form-control round"/>
                                      </form>
                                    </div>
                                    <!-- / main menu header-->
                                    <!-- main menu content-->
                                    <div class="main-menu-content">
                                      <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                                        @auth
                                        <li class="nav-item">
                                          <a href="">
                                            <i class="icon-home3"></i><span class="menu-title">{{ __('menu.dashboard') }}</span>
                                            <span class="tag tag tag-primary tag-pill float-xs-right mr-2">2</span>
                                          </a>
                                          <ul class="menu-content">
                                            <li class="active"><a href="{{route('dashboard.index')}}" class="menu-item">{{ __('menu.dashboard') }}</a>
                                          </li>
                                          <li><a href="{{route('dashboard.manageusers')}}" class="menu-item">{{ __('menu.usermanage') }}</a>
                                          <li><a href="{{route('dashboard.managedb')}}" class="menu-item">{{ __('menu.dbmanage') }}</a>
                                        </li>
                                      </ul>
                                    </li>
                                    @endauth
                                    <li class="nav-item"><a href="#">
                                      <i class="icon-briefcase4"></i>
                                      <span class="menu-title">{{ __('menu.pages') }}</span></a>
                                      <ul class="menu-content">
                                        <li><a href="{{url('/')}}" class="menu-item">{{ __('menu.allpages') }}</a>
                                      </li>
                                      <li><a href="#" class="menu-item">{{ __('menu.category') }}</a>
                                      <ul class="menu-content">
                                        <?php
                                        $category = DB::table('categories')->orderBy('name', 'ASC')->get();
                                        foreach($category as $c){
                                        echo "<li><a href='".url('/')."/productions/category/view-for?category=".$c->name."' class='menu-item'>".$c->name."</a></li>";
                                        }?>
                                      </ul>
                                    </li>
                                  </ul>
                                </li>
                                @auth
                                <li class=" nav-item"><a href="#"><i class="icon-ios-albums-outline"></i><span class="menu-title">{{ __('menu.purchase') }}</span></a>
                                <ul class="menu-content">
                                  <li><a href="{{route('productions.create')}}" class="menu-item">{{ __('menu.latest') }}</a>
                                </li>
                                <li><a href="{{route('purchase.pending')}}" class="menu-item">{{ __('menu.pending') }}</a>
                              </li>
                              <li><a href="{{route('purchase.receive')}}" class="menu-item">{{ __('menu.receive') }}</a>
                            </li>
                          </ul>
                        </li>
                        <li class=" nav-item"><a href="#"><i class="icon-android-cart"></i><span class="menu-title">{{ __('menu.products') }}</span></a>
                        <ul class="menu-content">
                          @if(Auth()->user()->role == '2')<li><a href="{{route('productions.create')}}" class="menu-item">{{ __('menu.newproducts') }}</a></li>@endif
                          <li><a href="{{route('productions.manage')}}" class="menu-item">{{ __('menu.manageproducts') }}</a></li>
                          <li><a href="{{route('productions.request')}}" class="menu-item">{{ __('menu.requestproducts') }}</a></li>
                        </ul>
                      </li>
                      <li class=" nav-item"><a href="#"><i class="icon-android-chat"></i><span class="menu-title">{{ __('menu.messages') }}</span></a>
                      <ul class="menu-content">
                        <li>
                          <a href="" class="menu-item">Admin Chat</a>
                        </li>
                        <li>
                          <a href="" class="menu-item">Chatting</a>
                        </li>
                        <li>
                          <a href="" class="menu-item">Emails</a>
                        </li>
                        <li><a href="{{route('messages.create')}}" class="menu-item">{{ __('menu.createmessages') }}</a>
                      </li>
                      <li><a href="{{route('messages.index')}}" class="menu-item">{{ __('menu.inbox') }}</a>
                    </li>
                    <li><a href="" class="menu-item">{{ __('menu.send') }}</a>
                  </li>
                  <li><a href="{{url('/messages/archives')}}" class="menu-item">{{ __('menu.archive') }}</a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="">
                <i class="fas fa-file"></i>
                <span class="menu-title">{{ __('menu.file') }}</span>
              </a>
              <ul class="menu-content">
                <li>
                  <a href="" class="menu-item">{{ __('menu.document') }}</a>
                  <ul class="menu-content">
                    <li><a href="{{url('/files/word')}}" class='menu-item'>{{ __('menu.word') }}</a></li>
                    <li><a href="{{url('/files/excel')}}" class='menu-item'>{{ __('menu.excel') }}</a></li>
                    <li><a href="{{url('/files/powerpoint')}}" class='menu-item'>{{ __('menu.powerpoint') }}</a></li>
                  </ul>
                </li>
                <li>
                  <a href="" class="menu-item">{{ __('menu.media') }}</a>
                  <ul class="menu-content">
                    <li><a href="{{url('/files/image')}}" class='menu-item'>{{ __('menu.image') }}</a></li>
                    <li><a href="{{url('/files/video')}}" class='menu-item'>{{ __('menu.video') }}</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#">
                <i class="icon-android-settings"></i>
                <span class="menu-title">{{ __('menu.setting') }}</span>
              </a>
              <ul class="menu-content">
                <li><a href="{{route('setting.account')}}" class="menu-item">{{ __('menu.account') }}</a>
              </li>
              <li><a href="{{route('setting.display')}}" class="menu-item">{{ __('menu.display') }}</a>
            </li>
            <li><a href="{{route('setting.history')}}" class="menu-item">{{ __('menu.historylogin') }}</a>
          </li>
          <li><a href="component-collapse.html" class="menu-item">{{ __('menu.notif') }}</a>
        </li>
        <li><a href="component-dropdowns.html" class="menu-item">{{ __('menu.pay') }}</a>
      </li>
    </ul>
  </li>
  @endauth
  <li class=" navigation-header"><span data-i18n="nav.category.support">{{ __('menu.support') }}</span><i data-toggle="tooltip" data-placement="right" data-original-title="Support" class="icon-ellipsis icon-ellipsis"></i>
</li>
<li class=" nav-item"><a href="https://github.com/pixinvent/robust-free-bootstrap-admin-template/issues"><i class="icon-support"></i><span data-i18n="nav.support_raise_support.main" class="menu-title">{{ __('menu.raisesupport') }}</span></a>
</li>
<li class=" nav-item"><a href="https://pixinvent.com/free-bootstrap-template/robust-lite/documentation"><i class="icon-document-text"></i><span data-i18n="nav.support_documentation.main" class="menu-title">{{ __('menu.documentation') }}</span></a>
</li>
</ul>
</div>
<!-- /main menu content-->
<!-- main menu footer-->
<!-- include includes/menu-footer-->
<!-- main menu footer-->
</div>
<div class="app-content content container-fluid" id="appContentStyle">
<div class="content-wrapper" id="contentwrapperStyle">
<div class="content-header row"></div>
<div class="content-body" id="content">
<section class="flexbox-container">
<div class="col-xl-12">
<div class="card">
  <form>@csrf
    <textarea name="content" class="form-control my-editor"></textarea>
    <button type="submit">Save</button>
  </form>
</div>
</div><!-- col-xl-12 -->
</section><!--  section -->
</div>
</div>
</div>
{{--
dark-theme:
navbar[navbar-dark]
.main-menu[menu-dark]
light-theme:
navbar[navbar-light]
.main-menu[menu-light]
semi-dark-theme:
navbar[navbar-light]
.main-menu[menu-dark]
--}}
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
<script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script>
var editor_config = {
path_absolute : "/",
selector: "textarea.my-editor",
plugins: [
"advlist autolink lists link image charmap print preview hr anchor pagebreak",
"searchreplace wordcount visualblocks visualchars code fullscreen",
"insertdatetime media nonbreaking save table contextmenu directionality",
"emoticons template paste textcolor colorpicker textpattern"
],
toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
relative_urls: false,
file_browser_callback : function(field_name, url, type, win) {
var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
if (type == 'image') {
cmsURL = cmsURL + "&type=Images";
} else {
cmsURL = cmsURL + "&type=Files";
}

tinyMCE.activeEditor.windowManager.open({
file : cmsURL,
title : 'Filemanager',
width : x * 0.8,
height : y * 0.8,
resizable : "yes",
close_previous : "no"
});
}
};

tinymce.init(editor_config);
</script>
</body>
</html>
<?php
}
?>