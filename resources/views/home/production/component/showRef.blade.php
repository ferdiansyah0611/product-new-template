@foreach($production->question as $q)
      <div class="col-xl-12 float-left" style="font-family: 'Cuprum-Bold';margin-top:10px;" id="productsid{{$production->id}}">
        <div class="col-xl-1 float-left" style="padding:0px;">
          <?php
          $user_data = DB::table('users')->where('id', $q->user_id)->get();
          foreach($user_data as $data){
          if($data->avatars == null)
          echo "<img src='".asset('user-default.png')."' style='width: 100%;float: left;border-radius: 50%;margin: auto;height: 96px;'>";
          }
          if($data->avatars == true){
          echo "<img src='".asset($data->avatars)."' style='width: 100%;float: left;border-radius: 50%;margin: auto;height: 96px;'>";
        }
          ?>
        </div><!--./col-xl-1-->
        <div class="col-xl-11 float-left">
        {{$q->name}} 
        @if($q->star == '1')
        <i class="fas fa-star stars-color"></i>
        <i class="far fa-star stars-color"></i>
        <i class="far fa-star stars-color"></i>
        <i class="far fa-star stars-color"></i>
        <i class="far fa-star stars-color"></i>@endif
        @if($q->star == '2')
        <i class="fas fa-star stars-color"></i>
        <i class="fas fa-star stars-color"></i>
        <i class="far fa-star stars-color"></i>
        <i class="far fa-star stars-color"></i>
        <i class="far fa-star stars-color"></i>@endif
        @if($q->star == '3')
        <i class="fas fa-star stars-color"></i>
        <i class="fas fa-star stars-color"></i>
        <i class="fas fa-star stars-color"></i>
        <i class="far fa-star stars-color"></i>
        <i class="far fa-star stars-color"></i>@endif
        @if($q->star == '4')
        <i class="fas fa-star stars-color"></i>
        <i class="fas fa-star stars-color"></i>
        <i class="fas fa-star stars-color"></i>
        <i class="fas fa-star stars-color"></i>
        <i class="far fa-star stars-color"></i>@endif
        @if($q->star == '5')
        <i class="fas fa-star stars-color"></i>
        <i class="fas fa-star stars-color"></i>
        <i class="fas fa-star stars-color"></i>
        <i class="fas fa-star stars-color"></i>
        <i class="fas fa-star stars-color"></i>@endif
      
        <span class="float-right">{{$q->created_at}}<p id="gfg"></p> </span>
      
        <div style="text-align: center;">
          <p class="text-comment">{{$q->comment}}</p>
          @if($q->img == true)
          <p style="text-align: left;" class="img-comment"><img src="{{$q->img}}" style="width: 50px;"><img src="{{$q->img}}" class="img-blocks"></p>
      @endif
      @if($production->user_id == auth()->user()->id)
            <form method="post" action="{{route('productions.delete', $q->id)}}">@csrf @method('DELETE')
          <p class="help" style="text-align: left;">
          <i class="far fa-thumbs-up" data-target="#like{{$q->id}}" data-toggle="modal">@php
            echo $count = DB::table('like_questions')->where('question_id', $q->id)->pluck('like')->count();
          @endphp  Likes </i>  
            <button type="submit" class="btn btn-danger float-right delete-icon"><i class="fas fa-trash"></i></button>
          </p>
          </form>
          <div class="dropdown-divider"></div>
            @endif
        </div>
      </div>

      </div><!--./col-xl-11-->
        @endforeach