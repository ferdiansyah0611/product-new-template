@extends('layouts.template')
@section('content')
@if($search == true)
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
      <div class="card">
      <div class="card-header">Searching for <?php echo $searching = base64_decode($search); ?> ...</div>
      <div class="card-body">
@foreach($products as $p)
@if($p->name_products == true)
      <div class="wow fadeInDown col-md-3 float-left" style="animation-duration: 1.5s;">
      <a  href="
      <?php 
      $name = Crypt::encrypt($p->name_products);
      $views = base64_encode($p->name_products);
      echo "/productions/".$p->id."/views/".$name."/".$views;
      ?>">{{base64_decode($p->name_products)}}</a>
      <img src="{{asset($p->main_pictures)}}" style="width: 100%;height: 200px;">
      <div class="card-footer" style="text-align: center;font-size: 11px;background: none;">
    <!----<button class="float-left btn-secondary"><i class="far fa-thumbs-up">Likes</i></button>
    <button class="btn-secondary"><i class="far fa-comments">Comments</i></button>
    <button class="float-right btn-secondary"><i class="fas fa-external-link-alt">Share</i></button>---->
    @if($p->remaining_products > 0)
            <button class="btn btn-primary" style="font-size: 12px;" data-placement="bottom" title="Buy Now" data-toggle="modal" data-target="#BuyProducts{{$p->id}}">Price ${{base64_decode($p->price)}}</button>
            @endif
            @if($p->remaining_products == 0)
            <button class="btn btn-primary" style="font-size: 12px;" data-placement="bottom" title="Can't buy because remaining is 0" data-toggle="tooltip">Price ${{base64_decode($p->price)}}</button>
            @endif
    <button class="btn btn-danger" style="font-size: 12px;" data-toggle="tooltip" data-placement="top" title="Stock Products">Remaining {{$p->remaining_products}}</button>
  </div>
      </div>
      @endif
      @if($p->name_products == false)
      not
      @endif
@endforeach
      </div>
      </div>
      </div>
    </div>
</div>
@endif
@if($search == false)
Not
@endif
@endsection