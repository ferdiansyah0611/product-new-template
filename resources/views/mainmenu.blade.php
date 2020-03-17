<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" id="menuStyle">
  <!-- main menu header-->
  <div class="main-menu-header">
    <input type="text" name="search" placeholder="Search" class="keySearch menu-search form-control round">
  </div>
  <!-- / main menu header-->
  <!-- main menu contenticon-home3 -->
  <div class="main-menu-content">
    <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
      @auth
      @if(Auth()->user()->role == 2)
      <li class="nav-item">
        <a href="">
          <i class="icon-android-unlock"></i><span class="menu-title">Administrator</span>
          <span class="tag tag tag-primary tag-pill float-xs-right mr-2">2</span>
        </a>
        <ul class="menu-content">
          <li class="active"><a href="{{route('admin.dashboardindex')}}" class="menu-item"><i class="icon-database"></i> My Dashboards</a></li>
          <li>
            <a href="" class="menu-item"><i class="icon-android-folder"></i> Manage Product</a>
            <ul class="menu-content">
              <li><a href="{{route('admin.product_create')}}" class='menu-item'><i class="icon-android-arrow-dropright"></i> Create</a></li>
              <li><a href="{{route('admin.products_management')}}" class='menu-item'><i class="icon-android-arrow-dropright"></i> Management</a></li>
              <li><a href="" class='menu-item'><i class="icon-android-arrow-dropright"></i> Restore</a></li>
              <li><a href="{{route('admin.product_request')}}" class='menu-item'><i class="icon-android-arrow-dropright"></i> Request</a></li>
              <li><a href="" class='menu-item'><i class="icon-android-arrow-dropright"></i> Backup Data</a></li>
              <li><a href="" class='menu-item'><i class="icon-android-arrow-dropright"></i> System Reporting</a></li>
            </ul>
          </li>
          <li>
            <a href="" class="menu-item"><i class="icon-android-folder"></i> Manage Users</a>
            <ul class="menu-content">
              <li><a href="" class='menu-item'><i class="icon-android-arrow-dropright"></i> Add New Users</a></li>
              <li><a href="{{route('admin.users_management')}}" class='menu-item'><i class="icon-android-arrow-dropright"></i> Management</a></li>
              <li><a href="" class='menu-item'><i class="icon-android-arrow-dropright"></i> Permission</a></li>
              <li><a href="" class='menu-item'><i class="icon-android-arrow-dropright"></i> Backup Data</a></li>
              <li><a href="" class='menu-item'><i class="icon-android-arrow-dropright"></i> System Reporting</a></li>
            </ul>
          </li>
          <li>
            <a href="" class="menu-item"><i class="icon-android-folder"></i> Manage Finances</a>
            <ul class="menu-content">
              <li><a href="" class='menu-item'><i class="icon-android-arrow-dropright"></i> Day Results</a></li>
              <li><a href="" class='menu-item'><i class="icon-android-arrow-dropright"></i> Monthly Results</a></li>
              <li><a href="" class='menu-item'><i class="icon-android-arrow-dropright"></i> Year Results</a></li>
            </ul>
          </li>
          <li>
            <a href="" class="menu-item"><i class="icon-android-folder"></i> Manage Newseed</a>
            <ul class="menu-content">
              <li><a href="{{route('admin.newseed.create')}}" class='menu-item'><i class="icon-android-arrow-dropright"></i> Create newseed</a></li>
              <li><a href="" class='menu-item'><i class="icon-android-arrow-dropright"></i> Management</a></li>
              <li><a href="" class='menu-item'><i class="icon-android-arrow-dropright"></i> Backup Data</a></li>
              <li><a href="" class='menu-item'><i class="icon-android-arrow-dropright"></i> System Reporting</a></li>
            </ul>
            <li>
            <a href="" class="menu-item"><i class="icon-android-folder"></i> Manage Objects</a>
            <ul class="menu-content">
              <li><a href="{{route('admin.create_object')}}" class='menu-item'><i class="icon-android-arrow-dropright"></i> Create Objects</a></li>
              <li><a href="" class='menu-item'><i class="icon-android-arrow-dropright"></i> Management</a></li>
            </ul>
          </li>
          </li>
          <li><a href="{{route('admin.database_management')}}" class="menu-item"><i class="icon-database"></i> {{ __('menu.dbmanage') }}</a>
        </ul>
      </li>
      @endif
      @if(Auth()->user()->role != '0')
      <li class="nav-item"><a href="#">
        <i class="icon-home3"></i>
        <span class="menu-title">Dashboard</span></a>
        <ul class="menu-content">
          <li class="active"><a href="{{route('member.dashboardindex')}}" class="menu-item"><i class="icon-database"></i> My Dashboards</a></li>
          <li><a href="#" class="menu-item"><i class="icon-android-folder"></i> My Product</a>
          <ul class="menu-content">
            <li><a href="" class='menu-item'><i class="icon-android-arrow-dropright"></i> Create</a></li>
            <li><a href='' class='menu-item'><i class="icon-android-arrow-dropright"></i> Management</a></li>
          </ul>
        </li>
        <li><a href="#" class="menu-item"><i class="icon-android-folder"></i> My Payment</a>
        <ul class="menu-content">
          <li><a href="" class='menu-item'><i class="icon-android-arrow-dropright"></i> Benefits</a></li>
          <li><a href="{{route('purchase.manage')}}" class='menu-item'><i class="icon-android-arrow-dropright"></i> Management</a></li>
        </ul>
      </li>
      <li>
        <a href="" class="menu-item"><i class="icon-android-folder"></i> My Finances</a>
        <ul class="menu-content">
          <li><a href="" class='menu-item'><i class="icon-android-arrow-dropright"></i> Day Results</a></li>
          <li><a href="" class='menu-item'><i class="icon-android-arrow-dropright"></i> Monthly Results</a></li>
          <li><a href="" class='menu-item'><i class="icon-android-arrow-dropright"></i> Year Results</a></li>
        </ul>
      </li>
    </ul>
  </li>
  @endif
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
<li><a href="" class="menu-item">{{ __('menu.latest') }}</a>
</li>
<li><a href="{{route('purchase.pending')}}" class="menu-item">{{ __('menu.pending') }}</a>
</li>
<li><a href="{{route('purchase.receive')}}" class="menu-item">{{ __('menu.receive') }}</a>
</li>
</ul>
</li>
<li class=" nav-item"><a href="#"><i class="icon-android-cart"></i><span class="menu-title">{{ __('menu.products') }}</span></a>
<ul class="menu-content">
@if(Auth()->user()->role == '2')
<li><a href="" class="menu-item">{{ __('menu.newproducts') }}</a></li>@endif
<li><a href="" class="menu-item">{{ __('menu.manageproducts') }}</a></li>
<li><a href="" class="menu-item">{{ __('menu.requestproducts') }}</a></li>
</ul>
</li>
<li class=" nav-item"><a href="#"><i class="icon-android-chat"></i><span class="menu-title">{{ __('menu.messages') }}</span></a>
<ul class="menu-content">
<li>
<a href="" class="menu-item">Admin Chat</a>
</li>
<li>
<a href="{{route('chatting.chatting')}}" class="menu-item">Chatting</a>
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
<li><a href="" class="menu-item">{{ __('menu.notif') }}</a>
</li>
<li><a href="" class="menu-item">{{ __('menu.pay') }}</a>
</li>
</ul>
</li>
@endauth
<li class=" navigation-header">
<span data-i18n="nav.category.support">{{ __('menu.support') }}</span>
<i data-toggle="tooltip" data-placement="right" data-original-title="Support" class="icon-ellipsis icon-ellipsis"></i>
</li>
<li class=" nav-item">
<a href="#"><i class="icon-support"></i>
<span class="menu-title">{{ __('menu.raisesupport') }}</span>
</a>
</li>
<li class=" nav-item"><a href="#"><i class="icon-document-text"></i><span class="menu-title">{{ __('menu.documentation') }}</span></a>
</li>
</ul>
</div>
</div>