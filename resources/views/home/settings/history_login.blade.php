@extends('templates')
@section('content')
<div class="col-xl-12">
    <div class="card col-12 col-xl-12 mx-auto elevation-2">
        <div class="card-header">
            <h5 class="card-title">History Login My Account</h5>
            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                    <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                </ul>
            </div>
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