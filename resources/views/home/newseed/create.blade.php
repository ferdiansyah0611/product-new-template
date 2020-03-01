@extends('templates')
@section('css')
<script src="{{asset('vendor/tinymce/js/tinymce/tinymce.min.js')}}"></script>
<style type="text/css">
.filehover{display: none;}
.datahover{text-align: center;font-family: 'Solway-Bold';}
.datahover:hover .filehover{display: block;transition: 2s all ease;padding-top: 10px;position: absolute;}
.datahover:hover #title{transform: translate(-2000px, 100px);transition: 10s ease-in-out;}
.datahover:hover #update{transform: translate(-2000px, 100px);transition: 10s ease-in-out;}
#deleteNewseed{position: relative;margin-top: -130px;}
#updateNewseed{position: relative;margin-top: -130px;}
#deleteNewseed:hover{box-shadow: 50px -40px 200px 40px #f00;transition: 2s ease-in-out;}
#updateNewseed:hover{box-shadow: 50px -40px 200px 40px cyan;transition: 2s ease-in-out;}
</style>
@endsection
@section('content')
<div class="col-xl-12 card">
	<div class="card-header">
		<h5 class="card-title">Create neewseed
		<?php
		$file_size = 0;
		foreach(File::allFiles(public_path('image')) as $file){
			$file_size += $file->getSize();
		}
		$file_size = number_format($file_size / 1048576,2);
		print_r($file_size.'MB');
		?>
		</h5>
	</div>
	<div class="card-body">
		<div class="card-block">
			<form id="formContent" enctype="multipart/form-data">@csrf
				<div class="col-xl-6 p-0">
					<input type="text" name="title" class="form-control" placeholder="Title newseed" required>
				</div>
				<div class="col-xl-4 p-0">
					<input type="text" name="directory" class="form-control"  placeholder="Directory image" required>
				</div>
				<div class="col-xl-2 p-0">
					<select name="status" class="custom-select col-xl-12" required>
						<option value="1" selected>Publish</option>
						<option value="0">Projects</option>
					</select>
				</div>
				<div class="col-xl-12 p-0 mt-1 mb-1">
					<textarea name="content" class="form-control my-editor" style="min-height: 400px;" required></textarea>
				</div>
				<div class="card-footer p-0">
					<button id="SubmitForm" class="btn btn-info">Send</button>
					<button type="reset" class="btn btn-danger">Discard</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-xl-12 p-0 card">
	<div class="card-header">
		<h5 class="card-title">Neewseed files</h5>
	</div>
	<div class="card-body">
		<div class="card-block p-0" id="getDATA">
			@foreach($getData as $d)
			<div class="col-xl-3 pt-1 datahover wow fadeInDown" data-wow-duration="1s">
				<p id="icon"><i class="fas fa-file" style="font-size: 5em;"></i></p>
				<p id="title">{{$d->title}}</p>
				<p id="update">{{$d->created_at}}</p>
				<div class="col-xl-12 filehover">
					<form id="formDelete">
						<input type="hidden" name="titleNewseed" value="{{$d->title}}">
						<input type="hidden" name="idNewseed" value="{{$d->id}}">
						<button id="deleteNewseed" class="btn btn-danger">Delete</button>
						<button id="updateNewseed{{$d->id}}" style="position: relative;margin-top: -130px;" type="button" class="btn btn-info">Updating</button>
					</form>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection
@section('ajax')
<script type="text/javascript">
$(document).ready(function(){
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$('#deleteNewseed').click(function(e){
	e.preventDefault();
	$.ajax({
		url: "{{route('newseeds.delete')}}",
		method: 'post',
		data: $('#formDelete').serialize(),
		success: function(){
			$('#getDATA').load("{{route('newseeds.compCreate')}}");
			console.log("tr");
		},
		error: function(e){
			console.log(e);
		},
	});
});
$('#SubmitForm').click(function(e){
	e.preventDefault();
	$.ajax({
		url: "{{route('newseeds.store')}}",
		method: 'post',
		data: $('#formContent').serialize(),
		success:function(){
			$('#alertSuccess').css({"display":"block"});
	$('#alertSuccessContent').html('Create newseeds successfuly');
	$('#getDATA').load("{{route('newseeds.compCreate')}}");
		},
		error: function(e){
			console.log(e);
		},
	});
});
$("#updateNewseed"+$('input[name=idNewseed]').val()).click(function(e){
	e.preventDefault();
	$('#updatedata').modal("show");
	$.get("{{url('api/newseed/')}}"+"/"+$('input[name=idNewseed]').val(), function(data) {
		$('input[name=titleEdit]').val(data.data.title);
	});
});
});
</script>
<script>
var editor_config = {
path_absolute : "/",
selector: "textarea.my-editor",
plugins: [
"advlist autolink lists link image charmap print preview hr anchor pagebreak",
"searchreplace wordcount visualblocks visualchars code fullscreen",
"insertdatetime media nonbreaking save table directionality",
"emoticons template paste textpattern"
],
toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
relative_urls: false,
file_browser_callback : function(field_name, url, type, win) {
var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
if (type == 'image') {
cmsURL = cmsURL + "&type=Images";
} else {
cmsURL = cmsURL + "&type=Files";
}

tinyMCE.activeEditor.windowManager.open({
file : cmsURL,
title : 'Filemanager',
width : x * 0.8,
height : y * 0.8,
resizable : "yes",
close_previous : "no"
});
}
};

tinymce.init(editor_config);
</script>
@endsection
@section('modal')
<!-- Modal -->
<div class="modal fade" id="updatedata" tabindex="-1" role="dialog" aria-labelledby="updatedataTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable|modal-dialog-centered modal-sm|modal-lg|modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="updatedataTitle">Update</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" method="post">
					<input type="text" name="titleEdit">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary|secondary|success|danger|warning|info|light|dark" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary|secondary|success|danger|warning|info|light|dark">Save changes</button>
			</div>
		</div>
	</div>
</div>
@endsection