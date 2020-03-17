@extends('templates')
@section('css')
<style type="text/css">
.show-profile-footer{
	opacity: 0.8;
}
.show-profile-footer:hover{
	opacity: 1;
	transition: 1.5s cubic-bezier(1,0,0,1);
}
</style>
@endsection
@section('content')
@foreach($data as $user)
<div class="row">
	<div class="col-xl-12 mb-2">
		<div style="min-height: 200px;" data-image-src="{{asset('image/walpaper-7.jpg')}}" data-parallax="scroll" data-speed="1.7">
		<div class="card-header">
		<h5 class="card-title">{{$user->name_store}}</h5>
		</div><!-- card-header -->
		<div class="card-body">
		<div class="card-block">
			<div class="col-xl-2 col-md-2 col-xs-3">
        @if($user->avatars == null)
				<img src="{{url('user-default.png')}}" style="border-radius: 50%;height: 100px;">
			 @else
       <img src="{{asset($user->avatars)}}" style="border-radius: 50%;height: 100px;">
      @endif
      </div>
			<div class="col-xl-10 col-md-10 col-xs-9">
				<p class="text-white">
					<i class="icon-ios-paper" style="font-size: 20px;"></i>
					<span style="font-size: 13px;">Description > {{$user->description}}</span>
				</p>
				<p></p>
				@if($user->languange == 'id')
				<button class="btn btn-primary text-white">
					<i class="flag-icon flag-icon-id" style="font-size: 20px;"></i><span style="font-size: 14px;" class="pl-1">Indonesia</span></button>
				@endif
				<button class="btn btn-primary text-white">
					<i class="icon-android-call" style="font-size: 20px;"></i><span style="font-size: 14px;" class="pl-1">{{$user->number}}</span></button>
				<button class="btn btn-primary text-white">
					<i class="icon-ribbon-a" style="font-size: 20px;"></i><span style="font-size: 14px;" class="pl-1">{{$user->last_study}}</span></button>
			</div>
		</div><!-- card-block -->
		</div><!-- card-body -->
		<div class="card-footer show-profile-footer">
      <form action="{{route('friend.invite')}}" method="post">@csrf
        <input type="text" name="friendsID" value="{{$user->id}}" hidden>
        
			
      <?php 
      $dataFriends = DB::table('friendlies')->where('user_id', Auth()->user()->id)->get();
      foreach($dataFriends as $d){
        if($d->friends_id == $user->id){
          echo "<button type='submit' name='unFriends' class='btn btn-info' data-toggle='tooltip' data-placement='bottom' title='Unfollow Friends'><i class='icon-user-minus'></i></button>";
        }
        else{
          echo "<button type='submit' name='addFriends' class='btn btn-info' data-toggle='tooltip' data-placement='bottom' title='Add Friends'><i class='icon-android-person-add'></i></button>";
        }
      } ?>
			<button class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Follow"><i class="icon-android-favorite-outline"></i></button>
			<button class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Chat Now"><i class="icon-android-chat"></i></button>
			<button class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Reporting User"><i class="icon-alert-circled"></i></button>
      </form>
		</div>
		</div><!-- card -->
	</div><!-- col-xl-12 -->
	<div class="col-xl-12">
		<div class="card">
		<div class="card-header">
			<h5 class="card-title">Latest Products</h5>
		</div>
		<div class="card-body">
		<div class="card-block">
		<?php 
		$latest = DB::table('productions')->where('user_id', $user->id)->orderBy('created_at', 'ASC')->paginate('20');
		foreach($latest as $product){
		
		?>
		<div class="col-xl-3 float-left">
		<div class="wow fadeInDown float-left hover-style" data-wow-duration="1s">
              <a class="title-col-xl-3"  href="{{url('/productions/views', $product->title)}}">{{base64_decode($product->name_products)}}</a>
              <img src="{{url('storage/image/'.$product->main_pictures)}}" class="img-col-xl-3">
              <div class="card-footer custom-card-footer">
            <!----<button class="float-left btn-secondary"><i class="far fa-thumbs-up">Likes</i></button>
            <button class="btn-secondary"><i class="far fa-comments">Comments</i></button>
            <button class="float-right btn-secondary"><i class="fas fa-external-link-alt">Share</i></button>---->
            <p class="left"><i class="fas fa-clock" class="icon-15"></i> {{\Carbon\Carbon::parse($product->created_at)->diffForHumans()}}</p>
            <p class="left"><i class="fas fa-tag" class="icon-15"></i> {{$product->category_products}}</p>
            <p class="left"><i class="icon-cart4" class="icon-15"></i> {{$product->remaining_products}} units</p>
            @if($product->remaining_products > 0)
            
              @if(Auth()->user()->saldo < $product->price)
              <button class="btn btn-primary font-12" data-placement="bottom" title="Can't buy because your saldo is not enough" data-toggle="tooltip" style="text-decoration: line-through;">Rp. {{$product->price}}</button>
              @endif
              @if(Auth()->user()->saldo > $product->price)
              <button class="btn btn-primary font-12" data-placement="bottom" title="Buy Now" data-toggle="modal" data-target="#BuyProducts{{$product->id}}">Rp. {{$product->price}}</button>
              <button class="btn btn-danger font-12" data-toggle="tooltip" data-placement="bottom" title="Stock Products">Add cart</button>
              @endif
            @endif
            @if($product->remaining_products == 0)
              @if(Auth()->user()->saldo < 0)
              <button class="btn btn-primary font-12" data-placement="bottom" title="Can't buy because your saldo is not enough and sold out" data-toggle="tooltip" style="text-decoration: line-through;">Rp. {{$product->price}}</button>
              @endif
              @if(Auth()->user()->saldo > 0)
              <button class="btn btn-primary font-12" data-placement="bottom" title="Sold Out" data-toggle="tooltip" style="text-decoration: line-through;">Rp. {{$product->price}}</button>
              @endif
            @endif
          </div>
          </div>
      	</div>
          <?php 
          }//foreach ?>
		</div>
		</div>
		</div>
	</div><!-- col-xl-12 -->
	<div class="col-xl-12">
		<div class="card">
		<div class="card-header">
			<h5 class="card-title">Document Publish</h5>
		</div><!-- card-header -->
		<div class="card-body">
		<div class="card-block" style="max-height: 400px;overflow: auto;">
		<div class="table-responsive">
        <table class="table table-hover mb-0">
        <thead>
            <tr>
            <th>Name file</th>
            <th>Type</th>
            <th>Version</th>
            <th>Last Modified</th>
            <th>Size</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	<?php 
        	$doc = DB::table('files')->where('user_id', $user->id)->where('privacy', '2')->paginate('25');
        	foreach($doc as $d){
        	if($d->word == true){
        		echo "<tr class='bg-deep-purple bg-lighten-3'>";
        		echo "<td class='text-truncate'>".$d->name_file."</td>";
        		echo "<td class='text-truncate'>Word</td>";
        		echo "<td class='text-truncate'>".$d->version."</td>";
        		echo "<td class='text-truncate'>".$d->updated_at."</td>";
        		echo "<td class='text-truncate'>".File::size(storage_path('app/public/document/'.$d->word))." bytes</td>";
        		echo "<td class='text-truncate'><button type='button' class='btn btn-danger'><a href='".asset($d->word)."' class='text-white' download>Download</a></button></td>";
        		echo "</tr>";
        	}
        	if($d->excel == true){
        		echo "<tr class='bg-green bg-lighten-3'>";
        		echo "<td class='text-truncate'>".$d->name_file."</td>";
        		echo "<td class='text-truncate'>Excel</td>";
        		echo "<td class='text-truncate'>".$d->version."</td>";
        		echo "<td class='text-truncate'>".$d->updated_at."</td>";
        		echo "<td class='text-truncate'>".File::size(storage_path('app/public/document/'.$d->excel))." bytes</td>";
        		echo "<td class='text-truncate'><button type='button' class='btn btn-danger'><a href='".asset($d->excel)."' class='text-white' download>Download</a></button></td>";
        		echo "</tr>";
        		}
        	if($d->powerpoint == true){
        		echo "<tr class='bg-orange bg-darken-2'>";
        		echo "<td>".$d->name_file."</td>";
        		echo "<td class='text-truncate'>Powerpoint</td>";
        		echo "<td class='text-truncate'>".$d->version."</td>";
        		echo "<td class='text-truncate'>".$d->updated_at."</td>";
        		echo "<td class='text-truncate'>".File::size(storage_path('app/public/document/'.$d->powerpoint))." bytes</td>";
        		echo "<td class='text-truncate'><button type='button' class='btn btn-danger'><a href='".asset($d->powerpoint)."' class='text-white' download>Download</a></button></td>";
        		echo "</tr>";
        		}
        	if($d->image == true){
        		echo "<tr class='bg-grey bg-lighten-3'>";
        		echo "<td>".$d->name_file."</td>";
        		echo "<td class='text-truncate'>Image</td>";
        		echo "<td class='text-truncate'>".$d->version."</td>";
        		echo "<td class='text-truncate'>".$d->updated_at."</td>";
        		echo "<td class='text-truncate'>".File::size(storage_path('app/public/image/'.$d->image))." bytes</td>";
        		echo "<td class='text-truncate'><button type='button' class='btn btn-danger'><a href='".asset($d->image)."' class='text-white' download>Download</a></button></td>";
        		echo "</tr>";
        		}
        	if($d->video == true){
        		echo "<tr class='bg-brown bg-lighten-3'>";
        		echo "<td class='text-truncate'>".$d->name_file."</td>";
        		echo "<td class='text-truncate'>Word</td>";
        		echo "<td class='text-truncate'>".$d->version."</td>";
        		echo "<td class='text-truncate'>".$d->updated_at."</td>";
        		echo "<td class='text-truncate'>".File::size(storage_path('app/public/video/'.$d->video))." bytes</td>";
        		echo "<td class='text-truncate'><a href='".asset($d->video)."' class='text-white' download><button type='button' class='btn btn-danger'>Download</button></a></td>";
        		echo "</tr>";
        		}
        	}
        	?>
        </tbody>
        </table>
    	</div>
		</div><!-- card-block -->
		</div><!-- cad-body -->
		</div><!-- card -->
	</div><!-- col-xl-12 -->
</div><!-- row -->
@endforeach
@endsection
@section('js')
<script src="{{asset('vendor/parallax/parallax.min.js')}}" type="text/javascript"></script>
@endsection