@extends('layouts.template')
@section('content')
<div class="mx-auto col-md-12 card" style="display:block;text-align:center;">
@foreach ($data as $my_cart)
<div class="col-xl-3 float-left no-padding">
@php
$product = DB::table('productions')->where('id', base64_decode($my_cart->production_id))->get();
foreach($product as $prod){
echo "<img src='".$prod->main_pictures."' class='img-col-xl-3'>";
echo "<p class='font-12 left'>Amount : ".$my_cart->amount." units</p>";
echo "<p class='font-12 left'>Rp. ".$my_cart->totals."</p>";
echo "<p><button class='btn btn-primary font-12'>Buy Now</button>";
echo "<button class='btn btn-danger font-12'>Delete Cart</button></p>";
}
@endphp
</div>
@endforeach
</div>
@endsection