@extends('templates')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/vendor/datatables/media/css/jquery.dataTables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/vendor/datatables/media/css/dataTables.bootstrap.css')}}">
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{url('/')}}"><?php echo $_SERVER['SERVER_NAME'];?></a> <i class="icon-ios-arrow-right"></i> <a href="{{route('productions.index')}}">pay</a> <i class="icon-ios-arrow-right"></i> management
    </div>
</div>
<div class="card col-xl-12">
	<div class="card-header">
		<h5 class="card-title">Management Payment</h5>
	</div>
	<div class="card-body">
		<div class="card-block">
			<div class="table-responsive">
                <table class="table table-bordered" id="latest-tabel">
                    <thead style="background: cadetblue;">
                        <tr>
                            <th>Product ID</th>
                            <th>Purchase ID</th>
                            <th>Price</th>
                            <th>Sum</th>
                            <th>Totals</th>
                            <th>Status</th>
                            <th>Locate</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                </table>
            </div>
		</div>
	</div>
</div>
@endsection
@section('ajax')
<script src="{{asset('/vendor/datatables/media/js/jquery.dataTables.js')}}" defer></script>
<script type="text/javascript">
$(function(){
	$.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
	var tabel = $('#latest-tabel').DataTable({
		serverSide:true,
		processing:true,
		ajax:"{{route('purchase.api_purchaselatest')}}",
		columns:[
			{data:'production_id',name:'production_id'},
			{data:'purchase_id',name:'purchase_id'},
			{data:'price',name:'price'},
			{data:'sum_purchase',name:'sum_purchase'},
			{data:'totals',name:'totals'},
			{data:'status',name:'status'},
			{data:'locate',name:'locate'},
			{data:'created_at',name:'created_at'},
		]
	});
});
</script>
@endsection