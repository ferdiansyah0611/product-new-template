<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav">
          <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-social-windows font-large-1"></i></a></li>
          <li class="nav-item"><a href="index.html" class="navbar-brand nav-link"><img alt="branding logo" src="{{asset('vendor/robust/themes/robust/app-assets/images/logo/robust-logo-light.png')}}" data-expand="{{asset('vendor/robust/themes/robust/app-assets/images/logo/robust-logo-light.png')}}" data-collapse="{{asset('vendor/robust/themes/robust/app-assets/images/logo/robust-logo-small.png')}}" class="brand-logo"></a></li>
          <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
        </ul>
      </div>
      <div class="navbar-container content container-fluid">
        <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
          <ul class="nav navbar-nav">
            <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-social-windows"></i></a></li>
            @auth
            <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li>@endauth
            @auth
            <li class="nav-item hidden-sm-down"><a href="" class="nav-link">Rp. {{Auth()->user()->saldo}}</a></li>@endauth
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
            <li class="dropdown dropdown-notification nav-item">
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
                    echo "<a href='".url('/')."/productions/".$com->link."/views"."' class='list-group-item'>";
                    echo "<div class='media'>";
                    echo "<div class='media-left valign-middle'>";
                    echo "<i class='icon-speech-bubble icon-bg-circle bg-cyan'></i></div>";
                    echo "<div class='media-body'>";
                    echo "<h6 class='media-heading'>You have new comment!</h6>";
                    echo "<p class='notification-text font-small-3 text-muted'>".$com->notification."</p><small>";
                    echo "<time datetime='2015-06-11T18:29:20+08:00' class='media-meta text-muted'>".\Carbon\Carbon::parse($com->created_at)->diffForHumans()."</time></small>";
                    echo "</div></div></a>";
                    }
                    
                  }
                  
                  ?>
                </li>
                <li class="dropdown-menu-footer"><a href="javascript:void(0)" class="dropdown-item text-muted text-xs-center">{{ __('menu.readallnotif') }}</a></li>
              </ul>
            </li>
            @endauth
            @auth
            <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown" class="nav-link nav-link-label"><i class="ficon icon-mail6"></i><span class="tag tag-pill tag-default tag-info tag-default tag-up"><?php echo $count = DB::table('messages')->where('to', Auth()->user()->email)->where('status', '0')->count(); ?></span></a>
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <h6 class="dropdown-header m-0"><span class="grey darken-2">{{ __('menu.messages') }}</span>
                    <span class="notification-tag tag tag-default tag-info float-xs-right m-0"><?php echo $count = DB::table('messages')->where('to', Auth()->user()->email)->where('status', '0')->count(); ?> {{ __('menu.new') }}</span></h6>
                </li>
                <li class="list-group scrollable-container">
                  <?php $data = DB::table('messages')->where('to', Auth()->user()->email)->where('messages.status', '0')->join('users', 'messages.user_id', '=', 'users.id')->get();
                  $user = DB::table('users')->join('messages', 'users.id', '=', 'messages.user_id')->where('messages.status', '0')->get();
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
                    <li class='dropdown-menu-footer'><a href='javascript:void(0)' class='dropdown-item text-muted text-xs-center'>";
                  
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