@extends('templates')
@section('content')
<div class="mx-auto">
	<div class="card col-md-12">
		<div class="card-header">Recharge Balance</div>
		<div class="card-body">
			<form action="{{route('productions.isisaldo')}}" method="POST">@csrf
				<input type="text" name="number" class="form-control" placeholder="Keywords your code">
				<button class="btn btn-primary w-100" style="margin-top: 10px;" type="submit">Check</button>
			</form>
		</div>
	</div>
</div>
@endsection