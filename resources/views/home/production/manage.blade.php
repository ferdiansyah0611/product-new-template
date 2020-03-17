@extends('templates')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/vendor/datatables/media/css/jquery.dataTables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/vendor/datatables/media/css/dataTables.bootstrap4.css')}}">
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{url('/')}}"><?php echo $_SERVER['SERVER_NAME'];?></a> <i class="icon-ios-arrow-right"></i> <a href="">member</a><i class="icon-ios-arrow-right"></i> <a href="">productions</a> <i class="icon-ios-arrow-right"></i> manage
    </div>
</div>
<div class="card col-xl-12 expandID">
    <div class="card-header">
        <h5 class="card-title">Management Item Products <?php echo strtolower('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);?></h5>
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
                <table class="table table-bordered" id="production-table">
                    <thead style="background: cadetblue;">
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
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
<div class="modal fade" id="editProducts" tabindex="-1" role="dialog" aria-labelledby="editProductsTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable|modal-dialog-centered modal-sm|modal-lg|modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductsTitle">Edit Products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditProduct">
                <div class="modal-body">
                    <input type="hidden" name="DATA">
                    <input type="text" name="nameDATA" class="form-control">
                    <input type="text" name="priceDATA" class="form-control mt-1">
                    <input type="text" name="discountDATA" class="form-control mt-1">
                    <input type="text" name="descriptionDATA" class="form-control mt-1">
                    <input type="text" name="remainingDATA" class="form-control mt-1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info" id="submitEditProduct">Edit Now</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('/vendor/datatables/media/js/jquery.dataTables.js')}}" defer></script>
@if(Auth()->user()->role == '2')
<script type="text/javascript">
$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var tabel = $('#production-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{route('admin.api.productmanage')}}",
    columns: [
        { data: 'name_products', name: 'name_products' },
        { data: 'price', name: 'price' },
        { data: 'remaining_products', name: 'remaining_products' },
        { data: 'created_at', name: 'created_at' },
        { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });//datatables
    $('a[data-action=reload]').click(function(){
    tabel.draw();
    });
    $('body').on('click', '.editProduct', function(){
    var product_id = $(this).data('id');
    $.get("{{url('/admin/api-admin/get/product-data')}}"+'/'+product_id, function(data) {
        $('input[name=DATA]').val(data.id);
        $('input[name=nameDATA]').val(data.name_products);
        $('input[name=priceDATA]').val(data.price);
        $('input[name=discountDATA]').val(data.discount);
        $('input[name=descriptionDATA]').val(data.description_products);
        $('input[name=remainingDATA]').val(data.remaining_products);
    setTimeout(function(){
    $('#editProducts').modal("show");
    }, 2000);
    });
    });//edit modal
    $('#submitEditProduct').click(function(){
    $.ajax({
        url: "{{route('admin.api.updateproduct')}}",
        type:'post',
        data:$('#formEditProduct').serialize(),
        success:function(response)
        {
        tabel.draw();
        $('#editProducts').modal("hide");
        setTimeout(function(){
            $('#alert').html('<div class="alert alert-success alert-dismissible fade in mb-2" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Well done!</strong> '+response.success+'</div>');
        }, 1000);
    },
        error:function(e)
        {
        console.log(e);
        }
    });
    });
    $('body').on('click','.deleteProduct',function(){
        var product_id = $(this).data('id');
        $.ajax({
            url:"{{url('admin/api-admin/post/product-delete')}}"+'/'+product_id,
            type:'delete',
            success:function(response)
            {
                setTimeout(function(){
                    tabel.draw();
                    $('#alert').html('<div class="alert alert-success alert-dismissible fade in mb-2" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Well done!</strong> '+response.success+'</div>');
                }, 1000);
            },
            error:function(e)
            {
                console.log(e);
            }
        })
    });
});
</script>
@endif
@if(Auth()->user()->role == '3')
<script type="text/javascript">
$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var tabel = $('#production-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{route('member.api.productmanage')}}",
    columns: [
        { data: 'name_products', name: 'name_products' },
        { data: 'price', name: 'price' },
        { data: 'remaining_products', name: 'remaining_products' },
        { data: 'created_at', name: 'created_at' },
        { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });//datatables
    $('a[data-action=reload]').click(function(){
    tabel.draw();
    });
    $('body').on('click', '.editProduct', function(){
    var product_id = $(this).data('id');
    $.get("{{url('/productions')}}"+'/'+product_id+'/edit', function(data) {
        $('input[name=DATA]').val(data.id);
        $('input[name=nameDATA]').val(data.name_products);
        $('input[name=priceDATA]').val(data.price);
        $('input[name=discountDATA]').val(data.discount);
        $('input[name=descriptionDATA]').val(data.description_products);
        $('input[name=remainingDATA]').val(data.remaining_products);
    setTimeout(function(){
    $('#editProducts').modal("show");
    }, 2000);
    });
    });//edit modal
    $('#submitEditProduct').click(function(){
    $.ajax({
        url: "{{route('productions.product_update')}}",
        type:'post',
        data:$('#formEditProduct').serialize(),
        success:function(response)
        {
        tabel.draw();
        $('#editProducts').modal("hide");
    setTimeout(function(){
        $('#alert').html('<div class="alert alert-success alert-dismissible fade in mb-2" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Well done!</strong> '+response.success+'</div>');
    }, 1000);
    },
        error:function(e)
        {
        console.log(e);
        }
    });
    });
});
</script>
@endif
@endsection