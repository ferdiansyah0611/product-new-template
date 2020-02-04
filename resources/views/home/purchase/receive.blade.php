@extends('templates')
@section('content')
<div class="col-md-12 card mx-auto table-responsive">
    <div class="card-header"></div>
        <div class="card-body">
        <table class="table table-bordered table-striped table-hover" style="width:100%;">
        <thead class="table-primary">
            <tr>
            <th>ID Product</th>
            <th>ID Purchase</th>
            <th>Price</th>
            <th>Totals</th>
            <th>Status</th>
            </tr>
        </thead>
        @foreach($data as $d)
        <tbody>
            <td>{{$d->production_id}}</td>
            <td>{{$d->purchase_id}}</td>
            <td>Rp. {{base64_decode($d->price)}}</td>
            <td>Rp. {{$d->totals}}</td>
            <td><span class="badge badge-primary">{{$d->status}}</span></td>
         </tbody>
        @endforeach
        </table>
        </div>
        <div class="card-footer"></div>
</div>
@endsection