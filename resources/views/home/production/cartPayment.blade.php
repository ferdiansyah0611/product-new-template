@extends('templates')
@section('name')
@endsection
@section('content')
@foreach($showPay as $d)
<div class="row">
	<div class="col-xl-8 col-md-8 col-xs-8">
		<?php 
		$image = json_decode($d->main_pictures, true);
		?>
		<div class="card" style="background-color: bisque;">
			<div class="card-header">
				<h5 class="card-title" style="font-family: 'Cuprum-Medium';">{{$d->name_products}}</h5>
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
					<div class="bd-example">
					  	<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
					    	<ol class="carousel-indicators">
					    	<?php 
					    		if($image['image_1'] == true && $image['image_2'] == null)
					    		{
					    			echo "<li data-target='#carouselExampleCaptions' data-slide-to='0' class='active'></li>";
					    		}
					    		elseif($image['image_1'] == true && $image['image_2'] !== null)
					    		{
					    			echo "<li data-target='#carouselExampleCaptions' data-slide-to='0' class='active'></li>";
					    			echo "<li data-target='#carouselExampleCaptions' data-slide-to='1'></li>";
					    		}
					    	?>
					    	</ol>
					    	<div class="carousel-inner">
						      	<?php
						      	$active 		= 	"<div class='carousel-item active'>";
						      	$carousel 		=	"<div class='carousel-item'>";
						      	$div_caption 	= 	"<div class='carousel-caption d-none d-md-block'>";
						      	$h5				= 	"<h5>First slide label</h5>";
						      	$p 				=	"<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>";
						      	$end_div 		= 	"</div>";

								if($image['image_1'] == true && $image['image_2'] == null)
								{
									echo $active;
									echo "<img src='".url('storage/image').'/'.$image['image_1']."' class='d-block w-100' alt='Image'>";
										echo $div_caption;
											echo $h5;
											echo $p;
										echo $end_div;
									echo $end_div;
									
								}
								elseif($image['image_1'] == true && $image['image_2'] !== null)
								{
									echo $active;
									echo "<img src='".url('storage/image').'/'.$image['image_1']."' class='d-block w-100' alt='Image'>";
										echo $div_caption;
											echo $h5;
											echo $p;
										echo $end_div;
									echo $end_div;

									echo $carousel;
									echo "<img src='".url('storage/image').'/'.$image['image_2']."' class='d-block w-100' alt='Image'>";
										echo $div_caption;
											echo $h5;
											echo $p;
										echo $end_div;
									echo $end_div;
								}
								?>
					        <!-- <div class="carousel-caption d-none d-md-block">
					          <h5>First slide label</h5>
					          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
					        </div>
					      </div>
					      <div class="carousel-item">
					        <img src="..." class="d-block w-100" alt="...">
					        <div class="carousel-caption d-none d-md-block">
					          <h5>Second slide label</h5>
					          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					        </div>
					      </div>
					      <div class="carousel-item">
					        <img src="..." class="d-block w-100" alt="...">
					        <div class="carousel-caption d-none d-md-block">
					          <h5>Third slide label</h5>
					          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
					        </div>
					      </div> -->
							    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
							      	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							      	<span class="sr-only">Previous</span>
							    </a>
							    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
							      	<span class="carousel-control-next-icon" aria-hidden="true"></span>
							      	<span class="sr-only">Next</span>
							    </a>
					  		</div>
						</div><!-- #carouselExampleCaptions -->
						{{$d->description_products}}
					</div><!-- bd-example -->
				</div><!-- card-block -->
			</div><!-- card-body -->
		</div><!-- card -->
	</div><!-- col-xl-8 col-md-8 col-xs-8 -->
		<div class="col-xl-4 col-md-4 col-xs-4">
			<div class="card">
				<div class="card-header"><h5 class="card-title">Methode Payments</h5></div>
				<div class="card-body">
					<div class="card-block">
						<p>Purchase Amount : {{\Request::get('remaining')}}</p>
						<p>1 Units = {{$d->price}}</p>
						<p>Totals : Rp. {{$d->price}} x {{\Request::get('remaining')}} = Rp. <?php echo $count = $d->price * \Request::get('remaining'); ?></p>
						<form method="POST" action="{{route('productions.buy', $d->id)}}">@csrf
							<input type="hidden"name="add" value="{{$d->id}}">
							<input type="hidden" name="price" value="{{$d->price}}">
							<input type="hidden" name="price" value="<?php echo $count = $d->price * \Request::get('remaining'); ?>">
							<input type="hidden" name="stock" value="{{$d->remaining_products}}">
							<input type="hidden" name="remaining" value="{{\Request::get('remaining')}}">
							<p>
							<button class="btn btn-outline-danger" name="added" style="padding: 10px;border-radius: 0;"><i class="fas fa-cart-plus"></i>Add To Cart</button>
							<button type="submit" class="btn btn-danger" name="buy" style="padding: 10px;border-radius: 0;">Buy Now</button>
							</p>
						</form>
						<form>
							<i class="fab fa-cc-visa" style="font-size: 50px;color:blue;" data-toggle="tooltip" data-placement="bottom" title="Visa"></i>
							<i class="fab fa-cc-stripe" style="font-size: 50px;color:blue;" data-toggle="tooltip" data-placement="bottom" title="Stripe"></i>
							<i class="fab fa-cc-paypal" style="font-size: 50px;color:blue;" data-toggle="tooltip" data-placement="bottom" title="Paypal"></i>
							<i class="fab fa-cc-mastercard" style="font-size: 50px;color:blue;" data-toggle="tooltip" data-placement="bottom" title="Mastercard"></i>
							<i class="fab fa-cc-apple-pay" style="font-size: 50px;color:blue;" data-toggle="tooltip" data-placement="bottom" title="Apple Pay"></i>
							<i class="fab fa-amazon-pay" style="font-size: 50px;color:blue;" data-toggle="tooltip" data-placement="bottom" title="Amazon Pay"></i>
						</form>
					</div>
					<a href="{{ route('payment') }}" class="btn btn-success" style="display: none;">Pay $100 from Paypal</a>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	@endsection