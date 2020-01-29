<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      <!-- main menu header-->
      <div class="main-menu-header">
        <input type="text" placeholder="Search" class="menu-search form-control round"/>
      </div>
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
          <li class=" nav-item"><a href="index.html"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Dashboard</span><span class="tag tag tag-primary tag-pill float-xs-right mr-2">2</span></a>
            <ul class="menu-content">
              <li class="active"><a href="<?php echo e(route('dashboard.index')); ?>" class="menu-item">Dashboard</a>
              </li>
              <li><a href="<?php echo e(route('dashboard.manageusers')); ?>" class="menu-item">User Manage</a>
                <li><a href="<?php echo e(route('dashboard.managedb')); ?>" class="menu-item">Database Manage</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-briefcase4"></i><span data-i18n="nav.project.main" class="menu-title">Pages</span></a>
            <ul class="menu-content">
            <li><a href="<?php echo e(url('/')); ?>" class="menu-item">All Pages</a>
              </li>
              <li><a href="#" data-i18n="nav.error_pages.main" class="menu-item">Category</a>
                <ul class="menu-content">
                  <li><a href="error-400.html" data-i18n="nav.error_pages.error_400" class="menu-item">Error 400</a>
                  </li>
                  <li><a href="error-401.html" data-i18n="nav.error_pages.error_401" class="menu-item">Error 401</a>
                  </li>
                  <li><a href="error-403.html" data-i18n="nav.error_pages.error_403" class="menu-item">Error 403</a>
                  </li>
                  <li><a href="error-404.html" data-i18n="nav.error_pages.error_404" class="menu-item">Error 404</a>
                  </li>
                  <li><a href="error-500.html" data-i18n="nav.error_pages.error_500" class="menu-item">Error 500</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-ios-albums-outline"></i><span data-i18n="nav.cards.main" class="menu-title">Purchase</span></a>
            <ul class="menu-content">
              <li><a href="<?php echo e(route('production.create')); ?>" class="menu-item">Latest</a>
              </li>
              <li><a href="<?php echo e(route('purchase.pending')); ?>" class="menu-item">Pending</a>
              </li>
              <li><a href="<?php echo e(route('purchase.receive')); ?>" class="menu-item">Receive</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-whatshot"></i><span data-i18n="nav.advance_cards.main" class="menu-title">Products</span></a>
            <ul class="menu-content">
              <li><a href="<?php echo e(route('production.create')); ?>" class="menu-item">New Products</a>
              </li>
              <li><a href="<?php echo e(route('productions.manage')); ?>" class="menu-item">Manage Products</a>
              </li>
              <li><a href="<?php echo e(route('productions.request')); ?>" class="menu-item">Request Products</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-compass3"></i><span data-i18n="nav.content.main" class="menu-title">Messages</span></a>
            <ul class="menu-content">
              <li><a href="<?php echo e(route('messages.create')); ?>" class="menu-item">Create Messages</a>
              </li>
              <li><a href="<?php echo e(route('messages.index')); ?>" class="menu-item">Inbox</a>
              </li>
              <li><a href="" class="menu-item">Send</a>
              </li>
              <li><a href="<?php echo e(url('/messages/archives')); ?>" class="menu-item">Archive</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-grid2"></i><span data-i18n="nav.components.main" class="menu-title">Setting</span></a>
            <ul class="menu-content">
              <li><a href="<?php echo e(route('setting.account')); ?>" class="menu-item">Account</a>
              </li>
              <li><a href="<?php echo e(route('setting.display')); ?>" class="menu-item">Display</a>
              </li>
              <li><a href="<?php echo e(route('setting.history')); ?>" class="menu-item">History Login</a>
              </li>
              <li><a href="component-collapse.html" class="menu-item">Notification</a>
              </li>
              <li><a href="component-dropdowns.html" class="menu-item">Payment</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="changelog.html"><i class="icon-copy"></i><span data-i18n="nav.changelog.main" class="menu-title">Changelog</span><span class="tag tag tag-pill tag-danger float-xs-right">1.0</span></a>
          </li>
          <li class=" navigation-header"><span data-i18n="nav.category.support">Support</span><i data-toggle="tooltip" data-placement="right" data-original-title="Support" class="icon-ellipsis icon-ellipsis"></i>
          </li>
          <li class=" nav-item"><a href="https://github.com/pixinvent/robust-free-bootstrap-admin-template/issues"><i class="icon-support"></i><span data-i18n="nav.support_raise_support.main" class="menu-title">Raise Support</span></a>
          </li>
          <li class=" nav-item"><a href="https://pixinvent.com/free-bootstrap-template/robust-lite/documentation"><i class="icon-document-text"></i><span data-i18n="nav.support_documentation.main" class="menu-title">Documentation</span></a>
          </li>
        </ul>
      </div>
      <!-- /main menu content-->
      <!-- main menu footer-->
      <!-- include includes/menu-footer-->
      <!-- main menu footer-->
    </div><?php /**PATH C:\wamp64\www\product2\resources\views/mainmenu.blade.php ENDPATH**/ ?>