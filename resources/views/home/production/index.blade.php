@extends('templates')
@section('css')
<style type="text/css">
.black-color{color:black !important;}
.hover-underline:hover{
text-decoration: underline;
}
</style>
@endsection
@section('content')
@auth
@if(Auth()->user()->debit_card == Null)
<script type="text/javascript">location.href = '/settings/accounts';</script>
@else
<div class="col-xl-12 p-0">
  <div class="card">
    <div class="card-body">
      <div class="card-block">
        <div id="carousel-interval" class="carousel slide" data-ride="carousel" data-interval="5000" style="height: 400px;">
          <ol class="carousel-indicators">
            <li data-target="#carousel-interval" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-interval" data-slide-to="1"></li>
            <li data-target="#carousel-interval" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox" style="height: 400px;">
            <div class="carousel-item active">
              <img src="{{asset('image/walpaper-1.jpg')}}" alt="First slide" style="height: 400px;width: 100%;">
            </div>
            <div class="carousel-item">
              <img src="{{asset('image/walpaper-1.jpg')}}" alt="Second slide" style="height: 400px;width: 100%;">
            </div>
            <div class="carousel-item">
              <img src="{{asset('image/walpaper-1.jpg')}}" alt="Third slide" style="height: 400px;width: 100%;">
            </div>
          </div>
          <a class="left carousel-control" href="#carousel-interval" role="button" data-slide="prev">
            <span class="icon-prev" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-interval" role="button" data-slide="next">
            <span class="icon-next" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>{{-- card --}}
</div>
<div class="col-xl-12 p-0">
  <div class="card">
    <div class="card-header">
      <h5 class="card-title">Newseed</h5>
    </div>
    <div class="card-body">
      <div class="card-block">
        @foreach($datanewseed as $seed)
        <div class="col-xl-3">
          <img src="{{url('storage/image/'.$seed->file)}}" alt="" width="100%" height="120px">
          <p class="text-lg-center"><a href="{{route('newseeds.show', $seed->title)}}">{{$seed->title}}</a></p>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="nav-vertical card col-xl-12" style="padding: 0;min-height: 120px;display: none;">
    <ul class="nav nav-tabs nav-left">
      <li class="nav-item">
        <a class="nav-link active" id="baseVerticalLeft-tab1" data-toggle="tab" aria-controls="tabVerticalLeft1" href="#tabVerticalLeft1" aria-expanded="true" style="font-family: 'Solway-ExtraBold';">Udah tau member?</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="baseVerticalLeft-tab2" data-toggle="tab" aria-controls="tabVerticalLeft2" href="#tabVerticalLeft2" aria-expanded="false" style="font-family: 'Solway-ExtraBold';">100% Keuntungan untukmu</a>
      </li>
    </ul>
    <div class="tab-content px-1">
      <div role="tabpanel" class="tab-pane active" id="tabVerticalLeft1" aria-expanded="true" aria-labelledby="baseVerticalLeft-tab1">
        <h4 style="font-family: 'KaushanScript-Regular';">Mau Jualan Online Tapi Gak Punya Produk?</h4>
        <p style="font-family: 'Cinzel-Bold';">Gabung Afiliasi aja di Jakmall.com!
          Ayo jual produk-produk yang ada di Jakmall.com ke toko online-mu dengan harga suka-suka. Selebihnya, Jakmall yang urus pengirimannya sampai ke tangan konsumen, atas nama toko kamu. Mudah bukan?
        Ga perlu stok barang & 100% keuntungan milik kamu!</p>
      </div>
      <div class="tab-pane" id="tabVerticalLeft2" aria-labelledby="baseVerticalLeft-tab2">
        <h4 style="font-family: 'KaushanScript-Regular';">Dapatkan 100% Keuntungannya!</h4>
        <p style="font-family: 'Cinzel-Bold';">Harga Produk Termurah
          Untung Lebih Besar!
          Pilihan Produk Lengkap
          Beserta Foto & Deskripsinya.
          Fitur Inventori Afiliasi
          Mudah Pantau Perubahan Stok & Harga.
          Fitur Pengiriman Cashless
          Mudah Input No. Resi Cashless Dari Toko Online-mu.
          Tanpa Perlu Stok Barang
          Kami yang Urus Pengiriman.
          Pengiriman Cepat
          Barang dikirim 1x24 Jam*
          Layanan Support
        Butuh Bantuan? Tim Kami Siap Menjawab Kendalamu.</p>
      </div>
    </div>
  </div>
</div>
<div class="col-md-12 p-0">
  <?php
  $cate = DB::table('categories')->where('display', 'show')->get();
  foreach($cate as $categor){?>
  <div class="card col-xl-6 p-0">
    <div class="card-header"><h5 class="card-title"><?php echo $categor->name; ?></h5>
      <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
      <div class="heading-elements">
        <ul class="list-inline mb-0">
          <form action="{{route('productions.category', $categor->name)}}" style="display: inline;">
            <li><button style="padding-right: 10px;background: none;border: none;" class="cursor-pointer"><i class="icon-fast-forward2" style="font-size: 17px;"></i></button></li>
            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
          </form>
        </ul>
      </div>
    </div>
    <div class="card-body custom-body-card p-0">
      <div class="card-block xs-p-0">
        <?php
        $prod = DB::table('productions')->where('status', 'public')->where('category_products', $categor->name)->orderBy('updated_at', 'DESC')->paginate(4);
        foreach($prod as $pro){
        if($pro->category_products == $categor->name){
        ?>
        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-6 float-left">
          <div class="wow fadeInDown float-left hover-style" data-wow-duration="1s" style="clear: both;overflow: hidden;">
            <?php
            if ($pro->remaining_products == '0') {
            echo "<div class='tag tag-pill tag-default' style='position: absolute;border-radius: 0;left: 14px;'>Sold Outs</div>";
            }
            elseif($pro->conditions == '1'){
            echo "<div class='tag tag-pill tag-info' style='position: absolute;border-radius: 0;left: 14px;'>New</div>";
            }
            elseif($pro->conditions == '1' && $pro->remaining_products == '0'){
            echo "<div class='tag tag-pill tag-info' style='position: absolute;border-radius: 0;left: 14px;'>New</div>";
            }
            elseif ($pro->conditions == '2') {
            echo "<div class='tag tag-pill tag-primary' style='position: absolute;border-radius: 0;left: 14px;'>Seconds</div>";
            }
            
            ?>
            <div class="tag tag-pill tag-danger" style="position: absolute;border-radius: 0;right: 14px;"><?php if($pro->discount == true){echo "-".$pro->discount."%";}?></div>
            <img src="{{asset($pro->main_pictures)}}" class="img-col-xl-3">
            <div class="card-footer custom-card-footer p-0">
              <a class="title-col-xl-3 hover-underline"  href="{{url('/productions/views', $pro->title)}}" style="font-size: 19px;font-family: 'Cuprum-Regular';">{{$pro->name_products}}</a>
              @if($pro->remaining_products > 0)
              
              @if(Auth()->user()->saldo < $pro->price)
              <p class="flow-root">
                <a class="text-danger font-12" data-placement="bottom" title="Can't buy because your saldo is not enough" data-toggle="tooltip" style="text-decoration: line-through;">Rp. {{$pro->price}}</a></p>
              @endif
              @if(Auth()->user()->saldo > $pro->price)
              <p class="flow-root">
                <a class="text-danger font-medium-1 font-weight-bold link-small" data-toggle="modal" data-target="#BuyProducts{{$pro->id}}">Rp. <?php $count = ($pro->discount /100)* $pro->price; echo $pro->price - $count;?></a>
              @if($pro->discount == true)
              <span class="text-grey"style="text-decoration: line-through;">Rp. <?php echo $data = $pro->price?></span>
              @endif
            </p>
            @endif
            @endif
            @if($pro->remaining_products == 0)
            @if(Auth()->user()->saldo < 0)
            <p><a class="text-danger font-12" data-placement="bottom" title="Can't buy because your saldo is not enough and sold out" data-toggle="tooltip" style="text-decoration: line-through;">Rp. {{$pro->price}}</a></p>
            @endif
            @if(Auth()->user()->saldo > 0)
            <p><a class="text-danger font-medium-1 font-weight-bold" data-toggle="modal" data-target="#BuyProducts{{$pro->id}}">Rp. <?php $count = ($pro->discount /100)* $pro->price; echo $pro->price - $count;?></a>
            @if($pro->discount == true)
            <span class="text-grey"style="text-decoration: line-through;">Rp. <?php echo $data = $pro->price?></span>
            @endif
            @endif
            @endif
          </div>
        </div>
      </div><?php
      }//if
      }//foreach pro
      ?>
      </div><!-- card-block -->
      </div><!-- card-body -->
      </div><!-- card-shadow -->
      
      <?php
      }//foreach category
      ?>
    </div>
    @foreach($product as $content)
    <!-- Modal -->
    <div class="modal fade" id="BuyProducts{{$content->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable|modal-dialog-centered modal-sm|modal-lg|modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Buy {{base64_decode($content->name_products)}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{route('productions.buy', $content->id)}}" method="POST">@csrf
              <input type="hidden" name="buy_products" value="{{$content->id}}">
              <input type="hidden" name="price" value="{{$content->price}}">
              <input type="hidden" name="stock" value="{{$content->remaining_products}}">
              <input type="number" name="remaining" maxlength="1" class="form-control" data-toggle="tooltip" title="How many buy ?" data-placement="right">
              <button type="submit" class="btn btn-outline-primary" name="buy">Buy Now</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    @endif
    @endauth
    @guest
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php
  $cate = DB::table('categories')->where('display', 'show')->get();
  foreach($cate as $categor){?>
  <div class="card col-xl-6 p-0">
    <div class="card-header"><h5 class="card-title"><?php echo $categor->name; ?></h5>
      <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
      <div class="heading-elements">
        <ul class="list-inline mb-0">
          <form action="{{route('productions.category', $categor->name)}}" style="display: inline;">
            <li><button style="padding-right: 10px;background: none;border: none;" class="cursor-pointer"><i class="icon-fast-forward2" style="font-size: 17px;"></i></button></li>
            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
          </form>
        </ul>
      </div>
    </div>
    <div class="card-body custom-body-card p-0">
      <div class="card-block xs-p-0">
        <?php
        $prod = DB::table('productions')->where('status', 'public')->where('category_products', $categor->name)->orderBy('updated_at', 'DESC')->paginate(4);
        foreach($prod as $pro){
        if($pro->category_products == $categor->name){
        ?>
        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-6 float-left">
          <div class="wow fadeInDown float-left hover-style" data-wow-duration="1s" style="clear: both;overflow: hidden;">
            <?php
            if ($pro->remaining_products == '0') {
            echo "<div class='tag tag-pill tag-default' style='position: absolute;border-radius: 0;left: 14px;'>Sold Outs</div>";
            }
            elseif($pro->conditions == '1'){
            echo "<div class='tag tag-pill tag-info' style='position: absolute;border-radius: 0;left: 14px;'>New</div>";
            }
            elseif($pro->conditions == '1' && $pro->remaining_products == '0'){
            echo "<div class='tag tag-pill tag-info' style='position: absolute;border-radius: 0;left: 14px;'>New</div>";
            }
            elseif ($pro->conditions == '2') {
            echo "<div class='tag tag-pill tag-primary' style='position: absolute;border-radius: 0;left: 14px;'>Seconds</div>";
            }
            
            ?>
            <div class="tag tag-pill tag-danger" style="position: absolute;border-radius: 0;right: 14px;"><?php if($pro->discount == true){echo "-".$pro->discount."%";}?></div>
            <img src="{{asset($pro->main_pictures)}}" class="img-col-xl-3">
            <div class="card-footer custom-card-footer p-0">
              <a class="title-col-xl-3 hover-underline"  href="{{url('/productions/views', $pro->title)}}" style="font-size: 19px;font-family: 'Cuprum-Regular';">{{$pro->name_products}}</a>
              @if($pro->remaining_products > 0)
              <p class="flow-root">
                <a class="text-danger font-medium-1 font-weight-bold link-small" data-toggle="modal" data-target="#BuyProducts{{$pro->id}}">Rp. <?php $count = ($pro->discount /100)* $pro->price; echo $pro->price - $count;?></a>
              @if($pro->discount == true)
              <span class="text-grey"style="text-decoration: line-through;">Rp. <?php echo $data = $pro->price?></span>
              @endif
            </p>
            @endif
          </div>
        </div>
      </div><?php
      }//if
      }//foreach pro
      ?>
      </div><!-- card-block -->
      </div><!-- card-body -->
      </div><!-- card-shadow -->
      
      <?php
      }//foreach category
      ?>
              </div>
            </div>
          </div>
          @endguest
          @endsection
          @section('js')
          @endsection