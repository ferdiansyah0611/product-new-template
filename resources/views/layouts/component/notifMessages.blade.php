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
                  }//foreach
                    echo "</li>";
                    echo "<li class='dropdown-menu-footer'><a href='javascript:void(0)' class='dropdown-item text-muted text-xs-center'>";
                  ?>
                {{ __('menu.readallmessages') }}</a></li>
              </ul>