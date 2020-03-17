$(document).ready(function(){
$.ajaxSetup({
	headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});//setup
/*function menu*/
//navbar autorefresh
    setInterval(function() {
      $('#notifMessages').load("<?php  url('/templates/notifMessages')?>");
      $('#notifAll').load("<?php  url('/templates/notifAll')?>");
    }, 120000);
//navbar backend
	$('#deleteNotification').click(function(e){
    e.preventDefault();
    $.ajax({
      url: "<?php route('dashboard.deleteallnotification')?>",
      method: 'delete',
      data: $('#formNotifDelete').serialize(),
      success: function(result){
        console.log(result.success);
      },
      error: function(e){
        $('#alertSuccess').css({"display":"block"});
        $('#alertSuccessContent').html('Your has delete all notification');
        $('#notifAll').load("<?php  url('/templates/notifAll')?>");
      },
    });
  	});//#deleteNotification
});