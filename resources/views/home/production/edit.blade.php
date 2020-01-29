@extends('layouts.template')
@section('content')
<div class="col-md-8 card mx-auto" style="font-family: 'times new roman";>
	<div class="card-header">Edit</div>
	<div class="card-body">
		<form method="post" action="{{route('productions.update', $production->id)}}"> @csrf
			<div class="form-group col-md-6 float-left">
			<label class="col-form-label">Name Products</label>
			<input type="text" name="update_name" value="{{base64_decode($production->name_products)}}" class="form-control">
			<label class="col-form-label">Price</label>
			<input type="text" name="update_price" value="{{base64_decode($production->price)}}" class="form-control">
			</div>
			<div class="form-group col-md-6 float-right">
			<label class="col-form-label">Remaining</label>
			<input type="number" name="update_remaining" value="{{$production->remaining_products}}" class="form-control">
			<label class="col-form-label">Category</label>
			<input type="number" name="update_category" value="{{$production->category_products}}" class="form-control">
			</div>
			<label class="col-form-label">Description</label>
			<textarea type="text" name="update_description" class="form-control">{{Crypt::decrypt($production->description_products)}}</textarea>
			<button class="btn btn-primary" type="submit">Update</button>
		</form>
	</div>
</div>
@endsection