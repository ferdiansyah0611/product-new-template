@extends('templates')
@section('css')
<link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">
<style type="text/css">
.message{display: -webkit-inline-block;font-size: 15px;cursor: pointer;width: 100%;padding: 10px;}
.message:hover{box-shadow: 3px 3px 7px 1px #b9b5b5;transition: 0.3s all;background: darkturquoise !important;}
.icon-style{display: none;}
.content-span{max-width: 100px;margin-left: 10px;}
.stars{margin-left: 20px;}
.message:hover .icon-style{display: inline;float: right;margin-left: 15px;color: crimson;font-size: 20px;}
.message:hover .icon-style:hover{color: black;}
.message:hover .date{display: none;}
@media screen and (max-width: 600px){
.left-col{width: 50%;float: right !important;}
.right-col{width: 50%;float: left !important;}
.message{font-size: 12px;}
.content-span{display: none;}
.stars{margin-left: 0;}
}
</style>
@endsection
@section('header')
<div class="row mb-2"><!-- /.col -->
<div class="col-sm-6 left-col">
  <h1 class="m-0 text-dark" style="font-size:25px;text-decoration:underline;font-family:PermanentMarker-Regular;">Messages</h1>
  </div><!-- /.col -->
  <div class="col-sm-6 right-col">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item" style="font-family:Kalam-Light;"><a style="cursor:pointer" onclick="window.history.back()"><i class="fas fa-chevron-circle-left"></i> Back Pages</a></li>
    </ol>
    </div><!-- /.col -->
    </div><!-- /.row -->
    @endsection
    @section('content')
    <div class="mx-auto col-md-12">
      <div class="card">
        <div class="card-body">
          @foreach($data_user as $d)
          <div class="message wow slideInLeft" data-wow-duration="1s" style="font-family: 'FrancoisOne-Regular';background: #e0e0e0;">
            <input type="checkbox" id="gridCheck">
            <i class="far fa-star stars"></i>
            <a href="{{route('messages.show', $d->id)}}">{{$d->from}}</a>
            <span class="content-span">{{base64_decode($d->subjects)}}</span>
            <i class="fas fa-archive icon-style" data-toggle="tooltip" data-placement="bottom" title="Archive Messages"></i>
            <i class="far fa-envelope icon-style" data-toggle="modal" data-target="#unread{{$d->id}}" title="Mark As Before Read"></i>
            <i class="fas fa-trash icon-style" data-toggle="modal" data-target="#delete{{$d->id}}"></i>
            <span class="float-right date">{{Carbon\Carbon::parse($d->created_at)}}</span>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    @endsection