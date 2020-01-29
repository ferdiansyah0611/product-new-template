@extends('templates')
@section('content')
<div class="col-xl-12">
    <div class="card col-12 col-xl-12 mx-auto elevation-2">
        <div class="card-header">
            <h5 class="card-title">History Login My Account</h5>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>{{-- card-tools --}}
        </div>{{-- card-header --}}
        <div class="card-body font-12">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                    <tr>
                        <th>History ID</th>
                        <th>Login</th>
                        <th>Device</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    @foreach($data as $get)
                    <tbody>
                        <tr>
                        <td>{{$get->id}}</td>
                        <td>{{$get->on}}</td>
                        <td>{{$get->device}}</td>
                        <td>
                        <form method="POST" action="{{route('setting.deleteHistory', $get->id)}}">@csrf @method('delete')
                        <input type="number" value="{{$get->id}}" name="id" hidden>
                            <button type="submit" class="btn btn-danger"><i class="fas fa-window-close"></i></button>
                            </form>
                        </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>{{-- table-rerponsive --}}
            
        </div>{{-- card-body --}}
    </div>{{-- card --}}
</div>{{--mx-auto--}}
@endsection