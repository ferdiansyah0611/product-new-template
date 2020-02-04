@extends('templates')
@section('name')
@endsection
@section('content')
@foreach($showPay as $d)
<div class="row">
<div class="col-xl-12 col-md-12 col-xs-12">
	<div class="card">
		<div class="card-header">
			
			{{base64_decode($d->name_products)}}
			
			<h5></h5>
			<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
		</div>
		<div class="card-body" style="padding: 10px;">
			<p>Purchase Amount : {{\Request::get('remaining')}}</p>
			<p>1 Units = {{$d->price}}</p>
			<p>Totals : Rp. {{$d->price}} x {{\Request::get('remaining')}} = Rp. <?php echo $count = $d->price * \Request::get('remaining'); ?></p>
			<form method="POST" action="{{route('productions.buy', $d->id)}}">@csrf
  			<input type="hidden"name="add" value="{{$d->id}}">
			<input type="hidden" name="prices" value="{{$d->price}}">
			<input type="hidden" name="buy_products" value="{{$d->id}}">
          	<input type="hidden" name="price" value="{{$d->price}}">
          	<input type="hidden" name="stock" value="{{$d->remaining_products}}">
  			<p>
  				<button class="btn btn-outline-danger" name="added" style="padding: 10px;border-radius: 0;"><i class="fas fa-cart-plus"></i>Add To Cart</button>
  				<button type="submit" class="btn btn-danger" name="buy" style="padding: 10px;border-radius: 0;">Buy Now</button></p>
  			</form>
		</div>{{--./card-body--}}
	</div>
</div>
</div>
@endforeach
@endsection
@section('name')
@endsection