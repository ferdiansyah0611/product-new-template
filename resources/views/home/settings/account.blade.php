@extends('templates')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/vendor/datatables/media/css/jquery.dataTables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/dist/css/select2.min.css')}}">
<style type="text/css">
@media screen and (max-width: 420px){
  .form-control{
    width: 100%;
  }
}
.form-control,select{
  font-family: 'Solway-Bold';
}
.form-control:focus,select:focus{
  box-shadow: -3px 2px 7px 1px #404250;
  font-family: 'Kalam-Bold';
}
</style>
@endsection
@section('content')
<div class="card col-md-12">
  <div class="card-header"><h5 class="card-title">Setting Accounts</h5></div>
  @foreach($profile_user_data as $profile)
  @if($profile->avatars == true)
  <img class="card-img-top" src="{{asset($profile->avatars)}}" alt="" style="border-radius: 50%;height: 230px;width:60%;">
  @endif
  <div class="card-body">
    <div class="card-block p-0">
    <form method="post" action="{{route('setting.update', $profile->id)}}" enctype="multipart/form-data">@csrf
      <input type="hidden" name="profile_create" value="{{auth()->user()->id}}">
        <input class="form-control" placeholder="Name" type="text" name="name" value="{{$profile->name}}" style="width: 50%;float: left;">
        <input class="form-control" placeholder="Email" type="text" name="email" value="{{$profile->email}}" style="width: 50%;float: left;">
        <select name="status" class="custom-select col-xl-6 mb-xs-1 mb-sm-1 mb-lg-1 mb-xl-1 mt-xs-1 mt-md-1 mt-md-1 mt-lg-1 mt-xl-1">
          <option value="{{$profile->status}}" selected>None</option>
          <option value="Single" required>Single</option>
          <option value="Have girlfriends" required>Have girlfriends</option>
          <option value="Have boyfriends" required>Have boyfriends</option>
        </select>
        <select name="last_study" class="custom-select col-xl-6 mb-xs-1 mb-sm-1 mb-lg-1 mb-xl-1 mt-xs-1 mt-md-1 mt-md-1 mt-lg-1 mt-xl-1">
          <option value="{{$profile->last_study}}" selected>{{$profile->last_study}}</option>
          <option value="College" selected>College</option>
          <option value="Vocation School" required>Vocation School</option>
          <option value="High School" required>High School</option>
          <option value="Middle School" required>Middle School</option>
          <option value="Elementary School" required>Elementary School</option>
        </select>
        <input value="{{$profile->identity_card}}" class="form-control" placeholder="Identity Card" type="number" name="identity_card" style="width: 50%;float: left;">
        <input value="{{$profile->debit_card}}" class="form-control" placeholder="Debit Card" type="number" name="debit_card" style="width: 50%;float: left;">
        <input value="{{$profile->number}}" class="form-control mt-xs-1 mt-md-1 mt-md-1 mt-lg-1 mt-xl-1" placeholder="Number Phone" type="number" name="number" style="width: 100%;float: left;">
        <input value="{{$profile->description}}" class="form-control mt-xs-1 mt-md-1 mt-md-1 mt-lg-1 mt-xl-1" placeholder="Description" type="text" name="description" maxlength="255" style="width: 50%;float: left;">
        <select id="city" class="custom-select mt-xs-1 mt-md-1 mt-md-1 mt-lg-1 mt-xl-1" name="locate" style="width: 20%;float: left;"></select>
        <input type="text" name="province" placeholder="Province" class="form-control mt-xs-1 mt-md-1 mt-md-1 mt-lg-1 mt-xl-1" style="width: 15%;float: left;">
        <input type="number" name="post" placeholder="Post Code" class="form-control mt-xs-1 mt-md-1 mt-md-1 mt-lg-1 mt-xl-1" style="width: 15%;float: left;">
        <input value="{{$profile->born}}" class="form-control mt-xs-1 mt-md-1 mt-md-1 mt-lg-1 mt-xl-1 mb-xs-1 mb-sm-1 mb-lg-1 mb-xl-1" type="date" name="born" style="width: 50%;float: left;">
        <input type="file" name="avatars" class="form-control mt-xs-1 mt-md-1 mt-md-1 mt-lg-1 mt-xl-1" style="width: 50%;float: left;">
      <button class="btn btn-primary mb-2 mt-1" type="submit">Edit Now</button>
      <button class="btn btn-danger mb-2 mt-1" type="submit">Delete Permanent Account</button>
    </form>
    </div>
  </div>
  @endforeach
</div>
@endsection
@section('js')
<script src="{{asset('/vendor/datatables/media/js/jquery.dataTables.js')}}" defer></script>
<script src="{{asset('vendor/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$.get("{{asset('json/country.json')}}", function(data) {
    $.each(data, function(index, val) {
      $('#city').append('<option value="'+val.country+'">'+val.country+'</option>');
    });
  });
  $('#select2').select2({
    placeholder:'Select one',
    ajax:{
      url: "{{route('admin.api_topdashboards')}}",
      dataType: 'json',
      processResults: function (data) {
            return {
              results: data
            };
          },
    }
  });
});
</script>
@endsection