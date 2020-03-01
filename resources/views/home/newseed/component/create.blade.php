<?php
$getData = DB::connection('mysql2')->table('newseed')->paginate(50);
foreach($getData as $d){

?>
<div class="col-xl-3 pt-1 datahover">
	<p id="icon"><i class="fas fa-file" style="font-size: 5em;"></i></p>
	<p id="title"><?php echo $d->title;?></p>
	<p id="update"><?php echo $d->created_at;?></p>
	<div class="col-xl-12 filehover">
	<form id="formDelete">
	<input type="hidden" name="titleNewseed" value="<?php echo $d->title;?>">
	<button id="deleteNewseed" class="btn btn-danger">Delete</button>
	<button id="updateNewseed" type="button" class="btn btn-info">Updating</button>
	</form>
</div>
</div>
<?php
}
?>
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
		success: function(data){
			$('#getDATA').load("{{route('newseeds.compCreate')}}");
			console.log("tr");
		},
		error: function(e){
			console.log(e);
		},
	});
});
})
</script>