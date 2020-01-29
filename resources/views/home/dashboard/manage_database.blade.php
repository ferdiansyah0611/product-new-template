@extends('layouts.template')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/vendor/datatables/media/css/jquery.dataTables.css')}}">
@endsection
@section('content')
<div class="col-md-8 card mx-auto table-responsive">
    <div class="card-header"></div>
        <div class="card-body">
        <table class="table table-bordered table-striped table-hover" style="width:100%;">
        <thead class="table-primary">
            <tr>
            <th>ID</th>
            <th>Name Products</th>
            <th>Usage Storage</th>
            <th>Action</th>
            </tr>
        </thead>
        @foreach ($qwerty as $p)
        @if($p->size == Null)
        @php
        $data_user = DB::table('users')->get();
        $count = filesize(public_path($p->main_pictures)) + filesize(public_path($p->second_pictures)) + filesize(public_path($p->three_pictures)) + filesize(public_path($p->fourth_pictures)) + filesize(public_path($p->five_pictures));
        $kb = $count / 1000;
        $max = '10000.000';
        echo "<tbody>";
            echo "<td>".$p->id."</td>";
            echo "<td>".base64_decode($p->name_products)."</td>";
            echo "<td>".$kb."</td>";
            @endphp
            <form action='{{route('dashboard.dbsavesize', $p->id)}}' method='POST'>@csrf
            <input type='hidden' value='{{$kb}}' name="size">
            <td><button type='submit' class="btn btn-success">Save</button></td>
            </form>
         </tbody>
        @else
        @php
        $data_user = DB::table('users')->get();
        $count = filesize(public_path($p->main_pictures)) + filesize(public_path($p->second_pictures)) + filesize(public_path($p->three_pictures)) + filesize(public_path($p->fourth_pictures)) + filesize(public_path($p->five_pictures));
        $kb = $count / 1000;
        $max = '10000.000';
        echo "<tbody>";
            echo "<td>".$p->id."</td>";
            echo "<td>".base64_decode($p->name_products)."</td>";
            echo "<td>".$kb."</td>";
            @endphp
            <td>You has been save</td>
        @endif
        @endforeach
        </table>
        </div>
        <div class="card-footer"></div>
</div>
@endsection
@section('js')
<script src="{{asset('/vendor/datatables/media/js/jquery.dataTables.js')}}"></script>
@endsection