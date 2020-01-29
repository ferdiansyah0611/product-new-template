<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{asset('/vendor/icon/favicon.ico')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">Ferdiansyah Store</span>
    </a> 
 <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->@auth
      @if(Auth()->user()->avatars == Null)
       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
              <img src="{{asset('user-default.png')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
          <a href="{{route('setting.account')}}" class="d-block">{{Auth::user()->name}}</a>
          </div>
        </div>
      @else
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset(Auth()->user()->avatars)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="" data-toggle="modal" data-target="#modelInfo" class="d-block">{{Auth::user()->name}}</a><span style="color: #c2c7d0;">Rp. {{Auth()->user()->saldo}}</span>
            </div>
          </div>
      @endif
      @endauth
      @guest
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <i class="fas fa-user-circle nav-icon " id="icon-guest"></i>
        </div>
        <div class="info">
        <a href="{{url('/login')}}" class="d-block">Guest</a>
        </div>
      </div>@endguest

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->@auth
          @if(auth()->user()->role == 2)<li class="nav-item has-treeview menu-open">
            <a href="" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt  color-icon"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('dashboard.index')}}" class="nav-link left-icon">
                  <i class="fas fa-chart-line nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="{{route('dashboard.manageusers')}}" class="nav-link left-icon">
                      <i class="fas fa-user-friends nav-icon"></i>
                    <p>User Manage</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.managedb')}}" class="nav-link left-icon">
                        <i class="fas fa-database nav-icon"></i>
                      <p>Database Manage</p>
                    </a>
                  </li>
            </ul>
          </li>@endif
          @endauth
          <li class="nav-item">
            <a href="{{route('production.index')}}" class="nav-link">
              <i class="nav-icon fas fas fa-file-alt  color-icon"></i>
              <p>
                All Products
              </p>
            </a>
        </li>
          @auth
          <li class="nav-header">ACCOUNT</li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-receipt  color-icon"></i>
              <p>
                Puchase
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('production.create')}}" class="nav-link left-icon">
                  <i class="fas fa-crosshairs nav-icon"></i>
                  <p>Recent</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('purchase.pending')}}" class="nav-link left-icon">
                  <i class="fas fa-spinner nav-icon"></i>
                  <p>Pending</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('purchase.receive')}}" class="nav-link left-icon">
                  <i class="fas fa-handshake nav-icon"></i>
                  <p>Receive</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('productions.topup')}}" class="nav-link left-icon">
                  <i class="fas fa-handshake nav-icon"></i>
                  <p>Top Up</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart  color-icon"></i>
              <p>
                Products
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('production.create')}}" class="nav-link left-icon">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>New Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('productions.manage')}}" class="nav-link left-icon">
                  <i class="fas fa-edit nav-icon"></i>
                  <p>Manage Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('production.draft')}}" class="nav-link left-icon">
                  <i class="fas fa-save nav-icon"></i>
                  <p>Draft Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('productions.request')}}" class="nav-link left-icon">
                  <i class="fas fa-wave-square nav-icon"></i>
                  <p>Request Products</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon far fa-envelope color-icon"></i><span class="badge badge-primary right">@php
                  $notif_messages = DB::table('messages')->where('to', Auth()->user()->email)->where('status', '0')->pluck('count')->count();
                echo $notif_messages;
              @endphp</span>
              <p>
                Messages 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('messages.create')}}" class="nav-link left-icon">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>New Messages</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('messages.index')}}" class="nav-link left-icon">
                  <i class="fas fa-envelope nav-icon"></i>
                  <p>Inbox <span class="badge badge-primary right">@php
                      $notif_messages = DB::table('messages')->where('to', Auth()->user()->email)->where('status', '0')->pluck('count')->count();
                    echo $notif_messages;
                  @endphp</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link left-icon">
                  <i class="fas fa-paper-plane nav-icon"></i>
                  <p>Sends</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/messages/archives')}}" class="nav-link left-icon">
                  <i class="fas fa-archive nav-icon"></i>
                  <p>Archive</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-cog  color-icon"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('setting.account')}}" class="nav-link left-icon">
                  <i class="fas fa-user-circle nav-icon"></i>
                  <p>Account</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{route('setting.display')}}" class="nav-link left-icon">
                  <i class="fas fa-tv nav-icon"></i>
                  <p>Display</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{route('setting.history')}}" class="nav-link left-icon">
                  <i class="fas fa-history nav-icon"></i>
                  <p>History Login</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link left-icon">
                  <i class="fas fa-bell nav-icon"></i>
                  <p>Notification</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link left-icon">
                  <i class="fas fa-money-bill"></i>
                  <p>Method Payments</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-question-circle color-icon"></i>
              <p>
                Help
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/password/reset')}}" class="nav-link left-icon">
                  <i class="fas fa-key nav-icon"></i>
                  <p>Forget Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link left-icon">
                  <i class="fas fa-envelope nav-icon"></i>
                  <p>Customer Services</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt color-icon"></i>
              <p>
                Logout
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        </li>
          @endauth
          <li class="nav-header">MORE</li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>About</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

@auth
  <div class="modal fade" id="modelInfo" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">My Profiles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
          <div class="container-fluid">
              <div class="col-xl-12" style="text-align: center;">
                  <img src="{{asset(Auth()->user()->avatars)}}" class="img-fluid" style="border-radius: 50%;height: 230px;">
                </div>
                <div class="col-xl-6 float-left">
                  <p class="bolder-padding15">ID User</p>
                  <div class="dropdown-divider"></div>
                  <p class="bolder">Long Name</p>
                  <div class="dropdown-divider"></div>
                  <p class="bolder">Email</p>
                  <div class="dropdown-divider"></div>
                  <p class="bolder">Born</p>
                  <div class="dropdown-divider"></div>
                  <p class="bolder">Number Phone</p>
                  <div class="dropdown-divider"></div>
                  <p class="bolder">Last Study</p>
                  <div class="dropdown-divider"></div>
                  <p class="bolder">Status</p>
                  <div class="dropdown-divider"></div>
                  <p class="bolder">Locations</p>
                  <div class="dropdown-divider"></div>
                </div>
                <div class="col-xl-6 float-right">
                  <p class="padding-top15">: {{base64_encode(Auth()->user()->name)}}</p>
                  <div class="dropdown-divider"></div>
                  <p>: {{Auth()->user()->name}}</p>
                  <div class="dropdown-divider"></div>
                  <p>: {{Auth()->user()->email}}</p>
                  <div class="dropdown-divider"></div>
                  <p>: {{Auth()->user()->born}}</p>
                  <div class="dropdown-divider"></div>
                  <p>: {{Auth()->user()->number}}</p>
                  <div class="dropdown-divider"></div>
                  <p>: {{Auth()->user()->last_study}}</p>
                  <div class="dropdown-divider"></div>
                  <p>: {{Auth()->user()->status}}</p>
                  <div class="dropdown-divider"></div>
                  <p>: {{Auth()->user()->locate}}</p>
                  <div class="dropdown-divider"></div>
                </div>
                <div class="col-xl-12" class="center">
                  <button class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="My likers" type="submit">
                    @php
                        echo $likers = DB::table('likes')->where('user_id', Auth()->user()->id)->pluck('like')->count()
                    @endphp Likes</button>
                  <button class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Totals my favorite products">0 My Favorite Products</button>
              
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endauth