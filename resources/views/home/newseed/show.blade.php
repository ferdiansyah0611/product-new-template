@extends('templates')
@foreach($data as $d)
@section('content')
<div class="col-xl-12 p-0">
	<div class="card">
		<div class="card-header">
			<h5 class="card-title">{{$d->title}}</h5>
		</div>
		<div class="card-body">
			<div class="card-block">
				{!!$d->content!!}
			</div>
		</div>
	</div>
</div>
@endsection
@endforeach