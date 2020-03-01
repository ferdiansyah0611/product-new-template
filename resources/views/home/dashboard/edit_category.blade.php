@extends('templates')
@section('content')
<div class="col-md-4 card">
    <div class="card-body">
    	<form action="{{route('dashboard.updatecategory', $category->id)}}" method="post">@csrf
    		<input type="text" name="update_category" class="form-control" value="{{$category->name}}">
    			<select name="display" class="form-control">
    				<option value="show" selected>Show</option>
    				<option value="hide">Hide</option>
    			</select>
        		<button type="submit">Save change</button>
    	</form>
    </div>
</div>
@endsection