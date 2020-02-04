@extends('templates')
@section('content')
<div class="col-xl-8 mx-auto card">
<div class="card-header">{{$profile->name}}</div>
	<div class="card-body">
	<div class="col-xl-12" style="text-align: center;">
		<img src="{{asset($profile->avatars)}}" class="img-fluid" style="border-radius: 50%;height: 230px;">
	</div>
	<div class="col-xl-6 float-left">
		<p style="font-weight: bolder;padding-top: 15px;">ID User</p>
		<div class="dropdown-divider"></div>
		<p style="font-weight: bolder;">Long Name</p>
		<div class="dropdown-divider"></div>
		<p style="font-weight: bolder;">Email</p>
		<div class="dropdown-divider"></div>
		<p style="font-weight: bolder;">Born</p>
		<div class="dropdown-divider"></div>
		<p style="font-weight: bolder;">Number Phone</p>
		<div class="dropdown-divider"></div>
		<p style="font-weight: bolder;">Last Study</p>
		<div class="dropdown-divider"></div>
		<p style="font-weight: bolder;">Status</p>
		<div class="dropdown-divider"></div>
		<p style="font-weight: bolder;">Locations</p>
		<div class="dropdown-divider"></div>
	</div>
	<div class="col-xl-6 float-right">
		<p style="padding-top: 15px;">: {{$profile->id}}</p>
		<div class="dropdown-divider"></div>
		<p>: {{$profile->name}}</p>
		<div class="dropdown-divider"></div>
		<p>: {{$profile->email}}</p>
		<div class="dropdown-divider"></div>
		<p>: {{$profile->hbd}}</p>
		<div class="dropdown-divider"></div>
		<p>: {{$profile->number}}</p>
		<div class="dropdown-divider"></div>
		<p>: {{$profile->last_study}}</p>
		<div class="dropdown-divider"></div>
		<p>: {{$profile->status}}</p>
		<div class="dropdown-divider"></div>
		<p>: {{$profile->locate}} <span class="badge badge-primary">Search for google maps</span></p>
		<div class="dropdown-divider"></div>
	</div>
	<div class="col-xl-12" style="text-align:center;">
		<button class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="My likers" type="submit">{{$likers}} Likes</button>
		<button class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Totals favorite products">0 Favorite Products</button>
	<button class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Click to reports">Reports</button>

	</div>
</div>
</div>
@endsection