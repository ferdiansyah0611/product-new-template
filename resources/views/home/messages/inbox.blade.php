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
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 card" style="border: 15px ridge aqua;">
          <div class="card-body" style="max-height: 290px;overflow: auto;">
            @foreach($message as $messages)
            @if($messages->status == '1')
            <div class="message" style="font-family: 'FrancoisOne-Regular';background: #e0e0e0;">
              <input type="checkbox" id="gridCheck">
              <i class="far fa-star stars"></i>
              <a href="{{route('messages.show', $messages->id)}}">{{$messages->from}}</a>
              <span class="content-span">{{base64_decode($messages->subjects)}}</span>
              <i class="fas fa-archive icon-style" data-toggle="tooltip" data-placement="bottom" title="Archive Messages"></i>
              <i class="far fa-envelope icon-style" data-toggle="modal" data-target="#unread{{$messages->id}}" title="Mark As Before Read"></i>
              <i class="fas fa-trash icon-style" data-toggle="modal" data-target="#delete{{$messages->id}}"></i>
              <span class="float-right date">{{$messages->created_at->diffForHumans()}}</span>
            </div>
            @endif
            @if($messages->status == '0')
            <div class="message" style="font-family: 'FrancoisOne-Regular';">
              <input type="checkbox" id="gridCheck">
              <i class="far fa-star stars"></i>
              <a href="{{route('messages.show', $messages->id)}}">{{$messages->from}}</a>
              <span class="content-span">{{base64_decode($messages->subjects)}}</span>
              <i class="fas fa-archive icon-style" data-toggle="tooltip" data-placement="bottom" title="Archive Messages"></i>
              <i class="fas fa-envelope-open icon-style" data-toggle="modal" data-target="#read{{$messages->id}}" title="Mark As Read"></i>
              <i class="fas fa-trash icon-style" data-toggle="modal" data-target="#delete{{$messages->id}}"></i>
              <span class="float-right date">{{$messages->created_at->diffForHumans()}}</span>
            </div>
            @endif
            @endforeach
          </div>
          <div class="card-footer">
            <div style="text-align: center;">
              <span>{{$message->count()}} of {{$message->total()}}</span>
              <a href="{{$message->previousPageUrl()}}" class="float-left"><i class="fas fa-arrow-circle-left" style="font-size: 25px;"></i></a>
              <a href="{{$message->nextPageUrl()}}" class="float-right"><i class="fas fa-arrow-circle-right" style="font-size: 25px;"></i></a></div>
            </div>
            </div><!--./col-md-12 card-->
          </div>
        </div>
        @foreach($message as $messages)
        @if($messages == true)
        <!-- Modal -->
        <div class="modal fade" id="delete{{$messages->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-body" style="text-align: center;">
                Do you want delete data ?
                <form action="{{route('messages.deletemessages', $messages->id)}}" method="post">@csrf @method('DELETE')
                  <p><button type="submit" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">No
                  </button></p>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="read{{$messages->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-body" style="text-align: center;">
                Do you want read messages ?
                <form action="{{route('messages.read', $messages->id)}}" method="post">@csrf
                  <p><button type="submit" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">No
                  </button></p>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="unread{{$messages->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-body" style="text-align: center;">
                Do you want unread messages ?
                <form action="{{route('messages.before', $messages->id)}}" method="post">@csrf
                  <p><button type="submit" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">No
                  </button></p>
                </form>
              </div>
            </div>
          </div>
        </div>
        @endif
        @endforeach
        @endsection