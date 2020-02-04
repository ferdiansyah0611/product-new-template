@extends('templates')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/vendor/datatables/media/css/jquery.dataTables.css')}}">
@endsection
@section('content')
<div class="col-md-12 card table-responsive" style="font-family: 'Times New Roman;">
	<div class="card-header">My Products</div>
	<div class="card-body">
<table class="table table-bordered table-hover table-striped">
<form method="get" action="{{route('productions.searchmanage')}}">@csrf
    <input class="form-group form-control" type="text" name="search" placeholder="Search data articles...">
    <button class="btn btn-secondary button-search" type="submit"><i class="fas fa-search"></i></button>
    </form>
    <thead class="table-primary">
    <tr>
    <th>Name</th>
    <th>Price</th>
    <th>Stock</th>
    <th>Category</th>
    <th>Status</th>
    <th>Action</th>
    </tr>
    </thead>
    @foreach($product as $p)
    <tbody>
    <td>{{base64_decode($p->name_products)}}</td>
    <td>Rp. {{$p->price}}</td>
    <td>{{$p->remaining_products}}</td>
    <td>{{$p->category_products}}</td>
    <td>{{$p->status}}</td>
    <td class="cente">
    <form action="{{route('productions.destroy', $p->id)}}" method="post">@csrf @method('DELETE')
    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#update{{$p->id}}"><i class="fas fa-edit left-5"></i></a>
    <a class="btn btn-danger crash-hover" data-toggle="modal" data-target="#deleteData{{$p->id}}"><i class="fas fa-trash-alt"></i></a>
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
                        <h5 class="modal-title">Edit Products</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="post" action="{{route('productions.update', $p->id)}}"> @csrf
                        <div class="form-group col-md-6 float-left">
                        <label class="col-form-label">Name Products</label>
                        <input type="text" name="update_name" value="{{base64_decode($p->name_products)}}" class="form-control">
                        <label class="col-form-label">Price</label>
                        <input type="text" name="update_price" value="{{$p->price}}" class="form-control">
                        </div>
                        <div class="form-group col-md-6 float-right">
                        <label class="col-form-label">Remaining</label>
                        <input type="number" name="update_remaining" value="{{$p->remaining_products}}" class="form-control">
                        <label class="col-form-label">Category</label>
                        <select name="update_category" class="form-control">
                                <option value="{{$p->category_products}}" selected>{{$p->category_products}}</option>
                                @foreach($category as $c)
                                <option value="{{$c->name}}">{{$c->name}}</option>@endforeach
                        </select>
                        </div>
                        <label class="col-form-label">Description</label>
                        <textarea type="text" name="update_description" class="form-control">{{Crypt::decrypt($p->description_products)}}</textarea>
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
</div>
</div>
@endsection