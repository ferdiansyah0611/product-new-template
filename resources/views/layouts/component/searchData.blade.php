@extends('templates')
@section('content')
<div class="row">
<div class="col-xl-12">
@foreach($productData as $product)
<div class="col-xl-3 col-md-6 col-sm-12">
	<div class="card">
	<div class="card-body">
	<div class="card-block">
		<h4 class="card-title">{{base64_decode($product->name_products)}}</h4>
		<h6 class="card-subtitle text-muted">{{$product->created_at}}</h6>
	</div>
	<img class="img-fluid" src="{{asset($product->main_pictures)}}" alt="Card image cap">
	<div class="card-block">
		<p class="card-text">Bear claw sesame snaps gummies chocolate.</p>
		<a href="{{route('productions.show', $product->title)}}" class="card-link pink">View</a>
	</div>
	</div>
	</div>
</div>
@endforeach
{{$productData->links()}}
</div>
<div class="col-xl-12">
	<div class="card">
		<div class="card-header">
			Searching data for users
		</div><!-- card-header -->
		<div class="card-body">
		@foreach($userData as $user)
		<div class="col-xl-3 col-md-3 col-xs-6 card text-xl-center text-xs-center text-md-center"> 
		<a href="{{url('/profiles/views',$user->name_store)}}">{{$user->name}}</a>
		@if($user->avatars == true)
		<img src="{{asset($user->avatars)}}" class="img-col-xl-3" style="border: 3px solid aqua;border-radius: 50%;">
		@else
		<img src="{{asset('user-default.png')}}" class="img-col-xl-3" style="border: 3px solid aqua;border-radius: 50%;">
		@endif
		</div>
		@endforeach
		</div><!-- card-body -->
	</div>
</div>
</div>
@endsection
@section('name')
@endsection