@extends('templates')
@section('css')
<style type="text/css">
.chattingSending{
	display: flow-root list-item;
	padding: 10px 10px 10px 10px;
	border: 1px solid gray;
	background: cornsilk;
	margin-top: 5px;
	box-shadow: 1px 1px 1px 1px gray;
}
.chattingSending p{
	font-size: 12px;
	font-weight: bolder;
	padding-top: 16px;
}
.chattingSending img{
	width: 50px;
	height: 50px;
	border-radius: 50%;
	float: left;
}
.chattingSending:hover{
	box-shadow: 1px 2px 4px 1px gray;
}
.previewChatting{
	border: 1px solid gray;
	background: cornsilk;
}
.messagesParagraph{
	font-size: 13px;
	font-family: 'Cinzel-Bold', serif;
	padding-top: 5px;
}
</style>
@endsection
@section('content')
<div class="row">
<div class="col-xl-12">
	<div class="card">
		<div class="card-header">
			<button class="btn btn-info" id="addChat"><i class="icon-android-add-circle"></i></button>
		</div>
		<div class="card-body">
		<div class="card-block" style="padding: 5px;">
		<div class="col-xl-5">
		<div class="card-header"><h5 class="card-title">Chatting Terkirim</h5></div>
		<?php 
		/*$gets = DB::table('message_chats')->where('mail_to',Auth()->user()->email)->select('messages_id')->groupBy('messages_id')->get();
		foreach($gets as $g){
			$user = DB::table('users')->where('email','mail_from')->get();
			foreach($user as $u){
				echo "<p>".$g->name."</p>";
			}
		}*/
		$getchat = DB::table('users')->where('id', Auth()->user()->id)->get();
		foreach($getchat as $get){
			$gets = DB::table('message_chats')->where('mail_from',Auth()->user()->email)->select('mail_to')->groupBy('mail_to')->get();
			foreach($gets as $g){
				echo "<div class='chattingSending toView' data-email='".$g->mail_to."'>";
				$getClient = DB::table('users')->where('email',$g->mail_to)->get();
				foreach($getClient as $client){
					if($client->avatars == true){
						echo "<img src='".$client->avatars."'>";
					}
					else{
						echo "<img src='".asset('user-default.png')."'>";
					}
				}
				echo "<p>".$g->mail_to."</p>";
				echo "</div>";
			}
		}
		?>
		 </div><!-- colx-l-5  -->
		 <div class="col-xl-7 previewChatting">
		 	<div id="messagesID">
		 		
		 	</div>
		 </div>
		</div>
		</div>
		<div class="card-footer">
			
		</div>
	</div>
</div>
</div>
@endsection
@section('modal')
<!-- Modal -->
<div class="modal fade" id="addChattingModal" tabindex="-1" role="dialog" aria-labelledby="addChattingModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable|modal-dialog-centered modal-sm|modal-lg|modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addChattingModalTitle">Modal title</h5>
      </div>
      <form id="formAddChatting">@csrf
      <div class="modal-body">
      <input type="text" name="mail_to">
      <input type="text" name="chatting">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Discards</button>
        <button id="sendChatting" type="submit" class="btn btn-primary">Send Now</button>
      </div>
  	  </form>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="viewMessagesModal" tabindex="-1" role="dialog" aria-labelledby="viewMessagesModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable|modal-dialog-centered modal-sm|modal-lg|modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewMessagesModalTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="ContentMessagesModal">
        	
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary|secondary|success|danger|warning|info|light|dark" data-dismiss="modal" id="closeModal">Close</button>
        <button type="button" class="btn btn-primary|secondary|success|danger|warning|info|light|dark">Save changes</button>
      </div>
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
$('#addChat').click(function(){
	$('#addChattingModal').modal("show");
});
$('#sendChatting').click(function(e){
	e.preventDefault();
	$.ajax({
		url: "{{url('/messages/sending')}}",
		method: 'post',
		data: $('#formAddChatting').serialize(),
		dataType: 'json',
		success: function(result){
			alert("success");
		},
		error: function(e){
			$('#alertSuccess').css({"display":"block"});
        	$('#alertSuccessContent').html('Sends messages successfuly');
		}
	});
});
$('body').on('click','.toView',function(){
	chat_email = $(this).data('email');
	$.get("{{url('/messages/chatting/view')}}"+'/'+chat_email, function(data) {
		$('#viewMessagesModal').modal("show");
		for(var gets in data.data){
      		$('#ContentMessagesModal').append(
      			'<div data-id='+data.data[gets].id+'>'+
      			'<p class='+"messagesParagraph"+'>'
      			+data.data[gets].messages+
      			'</p>'+
      			'</div>'
      			);
    	}
	});
	});
});
</script>
@endsection