@extends('templates')
@section('content')
<form id="testing" enctype="multipart/form-data">
	<input type="file" name="test[]" multiple="">@csrf
	<input type="submit" id="submit">Sa
</form>
@endsection
@section('js')
<script src="{{asset('/vendor/datatables/media/js/jquery.dataTables.js')}}" defer></script>
<script>
$(document).ready(function(){
	$('#testing').on('submit',function(e){
		e.preventDefault();
		$.ajax({
		url: "{{url('/testupload')}}",
		method: 'post',
		processData:false,
		contentType:false,
		data: new FormData(this),
		success:function(data){
			alert(data.success);
			console.log(data.file);
			/*$.each(data.file, function(index, val) {
				console.log(index+val);
			});*/
		},
		error:function(e){
			console.log(e);
		}
		});
	});
	
});
</script>
@endsection