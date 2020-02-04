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