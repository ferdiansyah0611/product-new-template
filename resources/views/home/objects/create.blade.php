@extends('templates')
@section('css')
@endsection
@section('content')
<div class="col-xl-12">
	<div class="card col-md-6">
		<div class="card-header"><h4 class="card-title">Create New Object</h4></div>
		<div class="card-body">
			<form id="createObject" style="display: grid;">@csrf
				<select name="category" class="custom-select custom-select-category mt-1"></select>
				<input type="text" placeholder="merk" name="merk" class="form-control mt-1">
				<input type="text" placeholder="series" name="series" class="form-control mt-1">
				<input type="text" placeholder="version" name="version" class="form-control mt-1">
				<div class="form-group mt-1">
					<input type="text" placeholder="width" name="width" class="form-control" style="float: left;width: 83.3%;">
					<select name="type_width" class="custom-select col-md-2">
						<option value="px">px</option>
						<option value="em">em</option>
						<option value="cm">cm</option>
					</select>
				</div>
				<div class="form-group">
					<input type="text" placeholder="height" name="height" class="form-control" style="float: left;width: 83.3%;">
					<select name="type_height" class="custom-select col-md-2">
						<option value="kg">kg</option>
						<option value="g">g</option>
					</select>
				</div>
				<input type="date" name="release" class="form-control">
				<input type="submit" value="Create Now" class="btn btn-info mt-2 mb-2">
			</form>
		</div>
	</div>
	<div class="card col-md-6">
		<div class="card-header">
			<h4 class="card-title">Create Merk</h4>
		</div>
		<div class="card-body">
			<form id="merk_form">@csrf
				<select name="category_id" class="custom-select-category custom-select mt-1"></select>
				<input type="text" name="merk" class="form-control mt-1">
				<input type="submit" value="Create Now" class="btn btn-info mt-2 mb-2">
			</form>
		</div>
	</div>
</div>
@endsection
@section('ajax')
<script type="text/javascript">
$(document).ready(function(){
	$.get("{{route('admin.api.getcategory')}}", function(data) {
		$.each(data, function(index, val) {
			 $('select.custom-select-category').append('<option value='+val.id+'>'+val.name+'</option>');
		});
	});
	$('#createObject').on('submit',function(e){
		e.preventDefault();
		$.ajax({
		url:"{{route('admin.createobject')}}",
		type:'post',
		data: $('#createObject').serialize(),
		success:function()
		{
			alert('oke');
		},
		error:function(e)
		{
			console.log(e);
		}
	});
	});
	$('#merk_form').on('submit',function(e){
		e.preventDefault();
		$.ajax({
			url:"{{route('admin.createmerk')}}",
			type:'post',
			data: $('#merk_form').serialize(),
			success:function()
			{
				console.log('success');
			},
			error:function(e)
			{
				console.log(e);
			}
		});
	});
});
</script>
@endsection