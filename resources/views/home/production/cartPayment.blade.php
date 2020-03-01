@extends('templates')
@section('name')
@endsection
@section('content')
@foreach($showPay as $d)
<div class="row">
	<div class="col-xl-5 col-md-5 col-xs-5">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title" style="font-family: 'Cuprum-Medium';">{{base64_decode($d->name_products)}}</h5>
				<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
				<div class="heading-elements">
					<ul class="list-inline mb-0">
						<li><a data-action="reload"><i class="icon-reload"></i></a></li>
						<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="card-body" style="padding: 10px;font-family: 'Solway-Regular';">
				<div class="card-block">
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
					
				</div>
			</div>{{--./card-body--}}
		</div>
		</div><!-- col-xl-5 col-md-5 col-xs-5 -->
		<div class="col-xl-5 col-md-5 col-xs-5">
			<div class="card">
				<div class="card-header"><h5 class="card-title">Methode Payments</h5></div>
				<div class="card-body">
					<div class="card-block">
						<form>
							<i class="fab fa-cc-visa" style="font-size: 50px;color:blue;" data-toggle="tooltip" data-placement="bottom" title="Visa"></i>
							<i class="fab fa-cc-stripe" style="font-size: 50px;color:blue;" data-toggle="tooltip" data-placement="bottom" title="Stripe"></i>
							<i class="fab fa-cc-paypal" style="font-size: 50px;color:blue;" data-toggle="tooltip" data-placement="bottom" title="Paypal"></i>
							<i class="fab fa-cc-mastercard" style="font-size: 50px;color:blue;" data-toggle="tooltip" data-placement="bottom" title="Mastercard"></i>
							<i class="fab fa-cc-apple-pay" style="font-size: 50px;color:blue;" data-toggle="tooltip" data-placement="bottom" title="Apple Pay"></i>
							<i class="fab fa-amazon-pay" style="font-size: 50px;color:blue;" data-toggle="tooltip" data-placement="bottom" title="Amazon Pay"></i>
						</form>
					</div>
					<a href="{{ route('payment') }}" class="btn btn-success">Pay $100 from Paypal</a>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	@endsection
	@section('ajax')
	<script type="text/javascript">
	$(document)ready(function(){
		$('#visa').click(function(){
		});
	});
	</script>
	@endsection