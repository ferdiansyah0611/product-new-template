<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      <!-- main menu header-->
      <div class="main-menu-header">
        <input type="text" placeholder="Search" class="menu-search form-control round"/>
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
              <li><a id="manageUser" href="javascript:void(0)" class="menu-item">{{ __('menu.usermanage') }}</a>
                <li><a href="{{route('dashboard.managedb')}}" class="menu-item">{{ __('menu.dbmanage') }}</a>
              </li>
            </ul>
          </li>
          @endauth
          <li class=" nav-item"><a href="#"><i class="icon-briefcase4"></i><span class="menu-title">{{ __('menu.pages') }}</span></a>
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
          <li class=" nav-item"><a href="#"><i class="icon-android-settings"></i><span class="menu-title">{{ __('menu.setting') }}</span></a>
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