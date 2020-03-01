@extends('templates')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/vendor/datatables/media/css/jquery.dataTables.css')}}">
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{url('/')}}"><?php echo $_SERVER['SERVER_NAME'];?></a> <i class="icon-ios-arrow-right"></i> <a href="{{url('dashboards')}}">dashboard</a> <i class="icon-ios-arrow-right"></i> manage <i class="icon-ios-arrow-right"></i> users
    </div>
</div>
<div class="card col-xl-12">
    <div class="card-header">
        <h5 class="card-title">Management Users</h5>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-body">
        <div class="card-block">
            <div class="table-responsive">
                <table class="table table-bordered" id="users-table">
                    <thead style="background: cadetblue;">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Saldo</th>
                            <th>Create</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalTitle">Edit Users</h5>
            </div>
            <form id="formEditUser">
                <div class="modal-body">
                    <div class="col-xl-6">
                        <input type="hidden" name="DATA">
                        <input type="text" name="nameDATA" class="form-control">
                        <input type="email" name="emailDATA" class="form-control mt-1">
                        <input type="number" name="roleDATA" maxlength="7" class="form-control mt-1">
                        <input type="text" name="statusDATA" class="form-control mt-1">
                        <input type="text" name="studyDATA" class="form-control mt-1">
                        <input type="number" name="identityDATA" class="form-control mt-1">
                    </div>
                    <div class="col-xl-6">
                        <input type="number" name="debitDATA" class="form-control">
                        <input type="number" name="numberDATA" class="form-control mt-1">
                        <input type="date" name="bornDATA" class="form-control mt-1">
                        <input type="text" name="locateDATA" class="form-control mt-1">
                        <input type="number" name="saldoDATA" class="form-control mt-1">
                        <input name="descriptionDATA" class="form-control mt-1">
                    </div>
                </div>
                <div class="modal-footer" style="padding-top: 270px !important;">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info" id="updateUser">Edit now</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('/vendor/datatables/media/js/jquery.dataTables.js')}}" defer></script>
<script type="text/javascript">
$(function(){
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
var tabel = $('#users-table').DataTable({
processing: true,
serverSide: true,
ajax: "{{route('admin.api_usersmanage')}}",
columns: [
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'email', name: 'email' },
{ data: 'saldo', name: 'saldo',searchable: false },
{ data: 'created_at', name: 'created_at' },
{ data: 'action', name: 'action', orderable: false, searchable: false },
]
});//datatables
$('a[data-action=reload]').click(function(){
tabel.draw();
});
$('body').on('click', '.editUser', function(){
var user_id = $(this).data('id');
$.get("{{url('/admin/api-admin/get/user-data')}}"+'/'+user_id, function(data){
$('input[name=DATA]').val(data.id);
$('input[name=nameDATA]').val(data.name);
$('input[name=emailDATA]').val(data.email);
$('input[name=roleDATA]').val(data.role);
$('input[name=statusDATA]').val(data.status);
$('input[name=studyDATA]').val(data.last_study);
$('input[name=identityDATA]').val(data.identity_card);
$('input[name=debitDATA]').val(data.debit_card);
$('input[name=numberDATA]').val(data.number);
$('input[name=bornDATA]').val(data.born);
$('input[name=locateDATA]').val(data.locate);
$('input[name=saldoDATA]').val(data.saldo);
$('input[name=descriptionDATA]').val(data.description);
});
});
$('#updateUser').click(function(e){
e.preventDefault();
$.ajax({
url:"{{route('admin.api_userupdate')}}",
type: 'post',
data: $('#formEditUser').serialize(),
success: function(response)
{
$('#editUserModal').modal("hide");
setTimeout(function(){
$('#alert').html('<div class="alert alert-success alert-dismissible fade in mb-2" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Well done!</strong> '+response.success+'</div>');
}, 1000);

tabel.draw();
},
error: function(e)
{
console.log(e);
}
});
});//edit post user
$('body').on('click', '.deleteUser', function(e){
e.preventDefault();
var user_id = $(this).data('id');
$.ajax({
url:"{{url('/admin/api-admin/post/users-delete')}}"+'/'+user_id,
type: 'delete',
success:function()
{
tabel.draw();
},
error:function(e)
{
console.log(e);
}
});
});
});
</script>
@endsection