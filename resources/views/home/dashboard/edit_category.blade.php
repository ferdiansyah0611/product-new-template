@extends('layouts.template')
@section('content')
<div class="col-md-4 card mx-auto">
    <div class="card-body">
    <form action="{{route('dashboard.updatecategory', $category->id)}}" method="post">@csrf
    <input type="text" name="update_category" value="{{$category->name}}">
        <button type="submit">Save change</button>
    </form>
    </div>
</div>
@endsection