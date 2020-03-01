@extends('templates')
@section('header')
<div class="row mb-2"><!-- /.col -->
<div class="col-sm-6">
  <h1 class="m-0 text-dark" style="font-size:25px;text-decoration:underline;font-family:PermanentMarker-Regular;">{{base64_decode($messages->subjects)}}</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item" style="font-family:Kalam-Light;"><a style="cursor:pointer" onclick="window.history.back()"><i class="fas fa-chevron-circle-left"></i> Back Pages</a></li>
    </ol>
    </div><!-- /.col -->
    </div><!-- /.row -->
    @endsection
    @section('content')
    <div class="mx-auto">
      <div class="card col-md-12">
        <div class="card-header">{{base64_decode($messages->subjects)}}</div>
        <div class="card-body">
          {{base64_decode($messages->messages)}}
        </div>
      </div>
    </div>
    @endsection