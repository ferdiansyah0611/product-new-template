@extends('layouts.template')
@section('header')
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">My Draft Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item"><a href="">Products</a></li>
              <li class="breadcrumb-item active">Draft</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
@endsection
@section('content')
<div class="col-md-12 card">
  <div class="card-header">Draft</div>
  <div class="card-body">
    <table class="table table-bordered data-table">
    <form>
    <input class="form-group form-control" type="text" name="search" placeholder="Search data articles...">
    <button class="btn btn-secondary button-search" type="submit"><i class="fas fa-search"></i></button>
    </form>
    <thead>
    <tr>
    <th>Name</th>
    <th>Price</th>
    <th>Stock</th>
    <th>Category</th>
    <th>Status</th>
    <th>Action</th>
    </tr>
    </thead>
    @foreach($mydraft as $p)
    <tbody>
    <td>
<?php echo $name = base64_decode($p->name_products); ?>
      </td>
    <td>Rp. <?php echo $price = base64_decode($p->price); ?></td>
    <td>{{$p->remaining_products}}</td>
    <td>{{$p->category_products}}</td>
    <td>{{$p->status}}</td>
    <td style="text-align: center;"><form action="{{route('productions.destroy', $p->id)}}" method="post">@csrf @method('DELETE')
    <a href="
    <?php
    $productions = base64_encode($p->name_products);
    echo "/productions/manage/".$p->id."/edit/".$productions;
    ?>
    " class="btn btn-primary">Edit</a>
    <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
    </tbody>
    @endforeach
    </table>
  </div>
</div>
@endsection