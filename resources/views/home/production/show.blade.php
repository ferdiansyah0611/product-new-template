@extends('layouts.template')
@section('css')
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Pangolin&display=swap" rel="stylesheet">
<style type="text/css">a{color: black;}.icon-sosial{font-size: 24px;}
.span-social{display: none;}
.social-btn:hover .span-social{display: inline;transition: 2s all ease-in-out !important;}
.stars-color{color: #d0011b;}
.help{color: #dedede;}
.help:hover{color: white;cursor: pointer;}
.delete-icon{display: none;}
.help:hover .delete-icon{display: inline;}
.text-comment{font-family: cursive;
    float: unset;
    overflow-anchor: visible;
    overflow-wrap: break-word;text-align: left;}
.text-comment:hover{text-decoration: underline;cursor: not-allowed;}
* {box-sizing: border-box;}
.img-comment{width: 50px;}
.img-blocks{display: none;}
.img-comment:hover .img-blocks{display: inline-block;width: 200px;
    max-height: 300px;cursor: zoom-in;transition: 2s all ease-in-out;}
.btn-star{padding: 10px 20px 10px 20px;background:#ffc1c1;border: 4px ridge red;font-weight: bolder;font-variant: all-small-caps;}
.btn-star:hover{background: #f00;color: white;}
.container {position: relative;}
.mySlides {display: none;width: 100%;}
.item-img{max-height: 430px;width: 100%;}
.cursor {cursor: pointer;}
.prev,
.next {cursor: pointer;position: absolute;top: 40%;width: auto;padding: 16px;margin-top: -50px;color: white;font-weight: bold;font-size: 20px;border-radius: 0 3px 3px 0;user-select: none;-webkit-user-select: none;}
.next {right: 0;border-radius: 3px 0 0 3px;}
.prev:hover,.next:hover {background-color:#dedede;}
.numbertext {color: #f2f2f2;font-size: 12px;padding: 8px 12px;position: absolute;top: 0;}
.caption-container {text-align: center;background-color: #222;padding: 2px 16px;color: white;}
.row:after {content: "";display: table;clear: both;}
.column {float: left;width: 16.66%;}
.demo {opacity: 0.6;}
.active,.demo:hover {opacity: 1;}
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
<div class="col-xl-5 float-left card" style="border-radius: 0;box-shadow:none;">
  <!-- Full-width images with number text -->
  <div class="mySlides">
    <div class="numbertext">1 / 5</div>
      <img src="{{$production->main_pictures}}" class="item-img">
  </div>
@if($production->second_pictures == true)
  <div class="mySlides">
    <div class="numbertext">2 / 5</div>
      <img src="{{$production->second_pictures}}" class="item-img">
  </div>
@endif
@if($production->three_pictures == true)
  <div class="mySlides">
    <div class="numbertext">3 / 5</div>
      <img src="{{$production->three_pictures}}" class="item-img">
  </div>
@endif
@if($production->fourth_pictures == true)
  <div class="mySlides">
    <div class="numbertext">4 / 5</div>
      <img src="{{$production->fourth_pictures}}" class="item-img">
  </div>
@endif
@if($production->five_pictures == true)
  <div class="mySlides">
    <div class="numbertext">5 / 5</div>
      <img src="{{$production->five_pictures}}" class="item-img">
  </div>
@endif
  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>

  <div class="dropdown-divider"></div>

  <!-- Thumbnail images -->
  <div class="row" style="width: 500px;">
    <div class="column">
      <img class="demo cursor" src="{{$production->main_pictures}}" style="width:100%" onclick="currentSlide(1)" alt="The Woods">
    </div>
    @if($production->second_pictures == true)
    <div class="column">
      <img class="demo cursor" src="{{$production->second_pictures}}" style="width:100%" onclick="currentSlide(2)" alt="Cinque Terre">
    </div>
    @endif
    @if($production->three_pictures == true)
    <div class="column">
      <img class="demo cursor" src="{{$production->three_pictures}}" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
    </div>
    @endif
    @if($production->fourth_pictures == true)
    <div class="column">
      <img class="demo cursor" src="{{$production->fourth_pictures}}" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
    </div>
    @endif
    @if($production->five_pictures == true)
    <div class="column">
      <img class="demo cursor" src="{{$production->five_pictures}}" style="width:100%" onclick="currentSlide(5)" alt="Nature and sunrise">
    </div>
    @endif
  </div>
  </div>
  <div class="col-xl-7 float-left card" style="border-radius: 0;box-shadow:none;">
    <p style="font-weight: bolder;font-size: 17px;padding-top: 10px;">{{base64_decode($production->name_products)}}</p>
    <div style="width: 100%;padding-left: 10px;background-color: #dedede;">
    <p style="color: #d0011b;font-weight: bolder;font-size: 24px;padding-top: 10px;">Rp. {{$production->price}}</p>
  </div>
  <div style="width: 100%;padding-top: 10px;font-family: 'Cuprum-Regular';">
  <p><span style="padding-right: 20px;color: #757575;">Balance</span> <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/a507d0e185dbd56e388652d8d8da845d.png"> Buy and get cashback up to Rp. 10.000</p>
  <p><span style="padding-right: 20px;color: #757575;">Delivery</span> <i class="fas fa-shipping-fast" style="padding-right: 2px;
    font-size: 21px;"></i> Free shipping with a minimum purchase Rp100.000</p>
    <form method="POST" action="{{route('productions.buy', $production->id)}}">@csrf
  <p><span style="padding-right: 20px;color: #757575;">Amount</span> 
    <input type="number" name="remaining" class="form-control col-xl-3" min="1" max="{{$production->remaining_products}}" maxlength="{{$production->remaining_products}}" style="display: inline;"> <span style="padding-left: 10px;">remaining {{$production->remaining_products}} units</span>
  </p>
  <input type="hidden"name="add" value="{{$production->id}}">
<input type="hidden" name="prices" value="{{$production->price}}">

<input type="hidden" name="buy_products" value="{{$production->id}}">
          <input type="hidden" name="price" value="{{$production->price}}">
          <input type="hidden" name="stock" value="{{$production->remaining_products}}">
  <p><button class="btn btn-outline-danger" name="added" style="padding: 10px;border-radius: 0;"><i class="fas fa-cart-plus"></i>Add To Cart</button>
  <button type="submit" class="btn btn-danger" name="buy" style="padding: 10px;border-radius: 0;">Buy Now</button></p>
  </form>
  <p><span style="padding-right: 37px;color: #757575;">Share</span>
    <button class="btn btn-outline-primary social-btn"><i class="fab fa-facebook icon-sosial"></i><span class="span-social">Facebook</span></button>
    <button class="btn btn-outline-primary social-btn"><i class="fab fa-twitter icon-sosial"></i><span class="span-social">Twitter</span></button>
    <button class="btn btn-outline-danger social-btn"><i class="fab fa-google-plus-g icon-sosial"></i><span class="span-social">Google+</span></button>
    <button class="btn btn-outline-danger social-btn"><i class="far fa-heart"></i> Favorite (7)</button>
  </p>
  </div>
  </div>
<div class="col-md-12 card">
      <div class="card-body" style="font-family: 'Cuprum-Bold';">
        <div style="border-right: 2px solid black">
        @php
            $data_user = DB::table('users')->where('id', $production->user_id)->get();
            foreach($data_user as $user){
            $data_products = DB::table('productions')->where('user_id', $production->user_id)->count('count');
              echo "<img style='width: 15%;float:left;padding-top: 19px;' src='".$user->avatars."'>";
              echo "<div class='float-left' style='margin-left:10px;border-right: 3px solid #c7c7c796;padding: 15px;'>";
              echo "<p>".$user->name.", live in ".$user->locate."</p>";
              echo "<p>".$user->description."</p>";
              echo "<button class='btn btn-danger'><i class='far fa-envelope'></i>Chat Now</button>";
              echo "<button class='btn btn-outline-secondary'>View Store</button>";
              echo "</div>";
              echo "<div class='float-left' style='margin-left:10px;border-right: 3px solid #c7c7c796;padding: 15px;'>";
              echo "<p>Join in <span style='color: #d0011b;'>".Carbon\Carbon::parse($user->created_at)->diffForHumans()."</span></p>";
              echo "<p>Product <span style='color: #d0011b;'>".$data_products."</span></p>";
              echo "<p>Presentation reply <span style='color: #d0011b;'>99%</span></p>";
              echo "</div>";
            };
        @endphp
      </div>
      </div>
    </div>
<div class="col-xl-12 card" style="margin-top: 17px;">
  <div class="card-header" style="text-decoration: underline;font-family: 'Pangolin', cursive;font-size: 20px;font-weight: bolder;background-color: white;padding: 10px;">Descriptions Products</div>
    <p style="font-family: 'Cuprum-Regular';">{!!Crypt::decrypt($production->description_products)!!}</p>
    <div class="dropdown-divider"></div>
    <div class="card-header" style="text-decoration: underline;font-family: 'Pangolin', cursive;font-size: 20px;font-weight: bolder;background-color: white;padding: 10px;">Details Products</div>
</div>
<div class="col-xl-12 bg-info float-left" style="margin-top: 10px;">
      <div class="card-header justify-content-center" style="padding: 10px;">
        @auth
      <form action="{{route('productions.question')}}" method="POST" enctype="multipart/form-data">@csrf
        <input class="form-control" type="hidden" name="user_id" value="{{auth()->user()->id}}">
        <input class="form-control" type="hidden" name="name" value="{{auth()->user()->name}}">
        <input class="form-control" type="hidden" name="production_id" value="{{$production->id}}">
        <input class="form-control" type="hidden" name="count" value="1">
        <div class="input-group col-md-6">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon02">Pictures 1</span>
        </div><!--./input-group-prepend-->
        <div class="custom-file">
          <input type="file" name="img" accept="image/*" class="custom-file-input">
          <label class="custom-file-label">Choose images file</label>
        </div><!--./custom-file-->
        <div class="float-left col-md-3">
      <select id="inputState" class="form-control" name="star">
        <option value="1" selected>1 Star</option>
        <option value="2">2 Star</option>
        <option value="3">3 Star</option>
        <option value="4">4 Star</option>
        <option value="5">5 Star</option>
      </select>
    </div><!--./float-left col-md-3-->
      </div><!--./input-group col-md-6-->
    <div class="float-left col-md-6" style="text-align: center;">
    
        <textarea class="form-control" name="comment" style="width: 100%;
    margin: 15px auto;
    height: 80px;"></textarea>
        <button type="submit" class="btn btn-primary" style="padding:5px;margin-top:10px;">Comments Now</button>
    </div><!--./float-left col-md-6-->
      </form>
      @endauth
      <div class="col-xl-6 float-right" style="margin-top: -40px;text-align:center;display:inline;">
      <p style="font-weight: bolder;font-size:larger">Filtering Comment</p>
      <div class="dropdown-divider"></div>
        <button class="btn-star" type="submit">1 Star</button></form>
        <button class="btn-star" type="submit">2 Star</button></form>
        <button class="btn-star" type="submit">3 Star</button></form>
        <button class="btn-star" type="submit">4 Star</button></form>
        <button class="btn-star" type="submit">5 Star</button></form>
      </div><!--./col-xl-6 float-right-->
      </div><!--./card-header-->
      @guest
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Whoops!</strong> If you want comments you must login or registration.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>
      @endguest
      <div class="card-body no-padding">
        @foreach($production->question as $q)
      <div class="col-xl-12 float-left" style="font-family: 'Cuprum-Bold';margin-top:10px;" id="productsid{{$production->id}}">
        <div class="col-xl-1 float-left" style="padding:0px;">
          @php
          $user_data = DB::table('users')->where('id', $q->user_id)->get();
          foreach($user_data as $data){
          echo "<img src='$data->avatars' style='width: 100%;float: left;border-radius: 50%;margin: auto;height: 100px;'>";
        }
          @endphp
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
      
        <span class="float-right">{{$q->created_at}}</span>
      
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
    
        <div class="dropdown-divider"></div>
        @endforeach
      </div><!--./card-body-->
    </div>
    </div>
</div>

@foreach($production->question as $q)
<!-- Modal -->
<div class="modal fade" id="like{{$q->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
  <div class="modal-body" style="text-align: center;">
  Do you want like comment ?
  <form action="{{route('productions.likequestion')}}" method="post">@csrf
  <input type="hidden" value="{{$q->id}}" name="question">
  <p><button type="submit" class="btn btn-primary">Yes</button>
  <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">No
  </button></p>
  </form>
  </div>
  </div>
  </div>
  </div>
@endforeach
@endsection
@section('js')
<script type="text/javascript">
var slideIndex = 1;
showSlides(slideIndex);
function plusSlides(n) {
  showSlides(slideIndex += n);
}
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
</script>
@endsection