@extends('templates')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/vendor/datatables/media/css/jquery.dataTables.css')}}">
<style type="text/css"></style>
@endsection
@section('content')
<div class="col-md-12 card table-responsive wow slideInRight" data-wow-duration="1s" style="font-family: 'Times New Roman;">
	<div class="card-header">My Products</div>
	<div class="card-body">
<table class="table table-bordered hover table-striped table-hover" style="width:100%;font-family: 'Solway-Medium';">
<form method="get" action="{{route('dashboard.searchmanageuser')}}">
    <input class="form-group form-control" type="text" name="search" placeholder="Search data users...">
    <button class="btn btn-secondary" type="submit" style="position: absolute;right: 25px;top: 69.5px;width:40px;height:36px;"><i class="fas fa-search"></i></button>
    </form>
    <thead class="table-primary">
    <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Saldo</th>
    <th>Updated</th>
    <th>Action</th>
    </tr>
    </thead>
    @foreach($for as $p)
    <tbody class="wow fadeInDown" data-wow-duration="1s">
    <td>{{$p->name}}</td>
    <td>{{$p->email}}</td>
    <td>Rp. {{$p->saldo}}</td>
    <td>{{\Carbon\Carbon::parse($p->updated_at)->diffForHumans()}}</td>
    <td style="text-align: center;">
    <form action="{{route('productions.destroy', $p->id)}}" method="post">@csrf @method('DELETE')
    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#update{{$p->id}}"><i class="fas fa-user-edit" style="margin-left:5px;"></i></a>
    <a style="color: white;cursor: pointer;" class="btn btn-danger" data-toggle="modal" data-target="#deleteData{{$p->id}}"><i class="fas fa-trash-alt"></i></a>
    <!-- Modal -->
<div class="modal fade" id="deleteData{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable|modal-dialog-centered modal-sm|modal-lg|modal-xl" role="document">
<div class="modal-content" style="margin-top:50%;">
<div class="modal-body">
        Do you want delete data ?
        <p><button type="submit" class="btn btn-primary">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">No
        </button></p>
</div>
</div>
</div>
</div>
        </form>
         <!-- Modal -->
  <div class="modal fade" id="update{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Edit Users</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="post" action="{{route('dashboard.updateusers', $p->id)}}"> @csrf
                        <div class="form-group col-md-12 float-left">
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="name" class="form-control" value="{{$p->name}}" data-toggle="tooltip" data-placement="right" title="Username">
                            </div><!--./input-group input-group-sm mb-3-->
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="text" name="email" class="form-control" value="{{$p->email}}" data-toggle="tooltip" data-placement="right" title="Emails">
                            </div><!--./input-group input-group-sm mb-3-->
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-user-tag"></i></span>
                            </div>
                            <input type="text" name="role" class="form-control" value="{{$p->role}}" data-toggle="tooltip" data-placement="right" title="Roles Account">
                            </div><!--./input-group input-group-sm mb-3-->
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-user-friends"></i></span>
                            </div>
                            <select name="status" class="custom-select" data-toggle="tooltip" data-placement="right" title="Status">
                                    <option value="{{$p->status}}" selected>{{$p->status}}</option>
                                    <option value="Single" required>Single</option>
                                    <option value="Have girlfriends" required>Have girlfriends</option>
                                    <option value="Have boyfriends" required>Have boyfriends</option>
                            </select>
                            </div><!--./input-group input-group-sm mb-3-->
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-user-graduate"></i></span>
                            </div>
                            <select name="last_study" class="custom-select" data-toggle="tooltip" data-placement="right" title="Last Study">
                                <option value="{{$p->last_study}}" selected>{{$p->last_study}}</option>
                                <option value="College">College</option>
                                <option value="Vocation School" required>Vocation School</option>
                                <option value="High School" required>High School</option>
                                <option value="Middle School" required>Middle School</option>
                                <option value="Elementary School" required>Elementary School</option>
                        </select>
                            </div><!--./input-group input-group-sm mb-3-->
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-address-card"></i></span>
                            </div>
                            <input value="{{$p->identity_card}}" class="form-control" type="number" name="identity_card" data-toggle="tooltip" data-placement="right" title="Identity Card">
                            </div><!--./input-group input-group-sm mb-3-->
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fab fa-cc-amazon-pay"></i></span>
                            </div>
                            <input value="{{$p->debit_card}}" class="form-control" placeholder="debit_card" type="number" name="debit_card" data-toggle="tooltip" data-placement="right" title="Debit Card">
                            </div><!--./input-group input-group-sm mb-3-->
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-phone-square"></i></span>
                            </div>
                            <input type="number" name="number" class="form-control" value="{{$p->number}}" data-toggle="tooltip" data-placement="right" title="Number Phone">
                            </div><!--./input-group input-group-sm mb-3-->
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" name="born" class="form-control" value="{{$p->born}}" data-toggle="tooltip" data-placement="right" title="Born Date">
                            </div><!--./input-group input-group-sm mb-3-->
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-map-marked-alt"></i></span>
                            </div>
                            <input type="text" name="locate" class="form-control" value="{{$p->locate}}" data-toggle="tooltip" data-placement="right" title="Locations">
                            </div><!--./input-group input-group-sm mb-3-->
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-info-circle"></i></span>
                            </div>
                            <textarea type="text" name="description" class="form-control" data-toggle="tooltip" data-placement="right" title="Description">{{$p->description}}</textarea>
                            </div><!--./input-group input-group-sm mb-3-->
                        </div>
                        <button class="btn btn-primary" type="submit" style="margin-top:15px;">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </td>
    </tbody>
    @endforeach
    </table>
    <div class="ajax"></div>
    <div style="display: flex;justify-content: center;">{{$for->links()}}</div>
</div>
</div>
@endsection
@section('js')
<script src="{{asset('/vendor/datatables/media/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript">
$.ajax({
    url: '/api/user',
    success: function(data){
        console.log(data);
        $('.ajax').html(data);
    },
    });
</script>
@endsection