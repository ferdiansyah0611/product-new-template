@extends('templates')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/vendor/datatables/media/css/jquery.dataTables.css')}}">
@endsection
@section('content')
<div class="col-xl-12 card">
    <div class="card-header">
        <h5 class="card-title">Management Database</h5>
    </div>
    <div class="card-body">
        <div class="card-block">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Name Database</th>
                        <th>Connection</th>
                        <th>Host</th>
                        <th>Port</th>
                        <th>Username</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo ENV('DB_DATABASE');?></td>
                        <td><?php echo ENV('DB_CONNECTION');?></td>
                        <td><?php echo ENV('DB_HOST');?></td>
                        <td><?php echo ENV('DB_PORT');?></td>
                        <td><?php echo ENV('DB_USERNAME');?></td>
                        <td><?php echo ENV('DB_PASSWORD');?></td>
                    </tr>
                    <tr>
                        <td><?php echo ENV('DB_DATABASE_2');?></td>
                        <td><?php echo ENV('DB_CONNECTION_2');?></td>
                        <td><?php echo ENV('DB_HOST_2');?></td>
                        <td><?php echo ENV('DB_PORT_2');?></td>
                        <td><?php echo ENV('DB_USERNAME_2');?></td>
                        <td><?php echo ENV('DB_PASSWORD_2');?></td>
                    </tr>
                    <tr>
                        <td><?php echo ENV('DB_DATABASE_MEMBER_1');?></td>
                        <td><?php echo ENV('DB_CONNECTION_MEMBER_1');?></td>
                        <td><?php echo ENV('DB_HOST_MEMBER_1');?></td>
                        <td><?php echo ENV('DB_PORT_MEMBER_1');?></td>
                        <td><?php echo ENV('DB_USERNAME_MEMBER_1');?></td>
                        <td><?php echo ENV('DB_PASSWORD_MEMBER_1');?></td>
                    </tr>
                    <tr>
                        <td><?php echo ENV('DB_DATABASE_MEMBER_2');?></td>
                        <td><?php echo ENV('DB_CONNECTION_MEMBER_2');?></td>
                        <td><?php echo ENV('DB_HOST_MEMBER_2');?></td>
                        <td><?php echo ENV('DB_PORT_MEMBER_2');?></td>
                        <td><?php echo ENV('DB_USERNAME_MEMBER_2');?></td>
                        <td><?php echo ENV('DB_PASSWORD_MEMBER_2');?></td>
                    </tr>
                    <tr>
                        <td><?php echo ENV('DB_DATABASE_MEMBER_3');?></td>
                        <td><?php echo ENV('DB_CONNECTION_MEMBER_3');?></td>
                        <td><?php echo ENV('DB_HOST_MEMBER_3');?></td>
                        <td><?php echo ENV('DB_PORT_MEMBER_3');?></td>
                        <td><?php echo ENV('DB_USERNAME_MEMBER_3');?></td>
                        <td><?php echo ENV('DB_PASSWORD_MEMBER_3');?></td>
                    </tr>
                    <tr>
                        <td><?php echo ENV('DB_DATABASE_MEMBER_4');?></td>
                        <td><?php echo ENV('DB_CONNECTION_MEMBER_4');?></td>
                        <td><?php echo ENV('DB_HOST_MEMBER_4');?></td>
                        <td><?php echo ENV('DB_PORT_MEMBER_4');?></td>
                        <td><?php echo ENV('DB_USERNAME_MEMBER_4');?></td>
                        <td><?php echo ENV('DB_PASSWORD_MEMBER_4');?></td>
                    </tr>
                    <tr>
                        <td><?php echo ENV('DB_DATABASE_MEMBER_5');?></td>
                        <td><?php echo ENV('DB_CONNECTION_MEMBER_5');?></td>
                        <td><?php echo ENV('DB_HOST_MEMBER_5');?></td>
                        <td><?php echo ENV('DB_PORT_MEMBER_5');?></td>
                        <td><?php echo ENV('DB_USERNAME_MEMBER_5');?></td>
                        <td><?php echo ENV('DB_PASSWORD_MEMBER_5');?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    @endsection
    @section('js')
    <script src="{{asset('/vendor/datatables/media/js/jquery.dataTables.js')}}" defer></script>
    @endsection