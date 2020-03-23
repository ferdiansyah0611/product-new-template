<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Production;
use App\User;
use App\Models\Files;
class ApiController extends Controller
{
    public function __construct()
    {
    	$this->middleware('Premium');
        $this->middleware('auth');
    }
    public function productManage()
    {
        return Datatables::of(Production::where('user_id',Auth()->user()->id))
        ->addIndexColumn()->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="modal"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"><i class="fas fa-user-edit"></i></a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="fas fa-trash-alt"></i></a>';
                        return $btn;})->rawColumns(['action'])->make(true);
    }
    public function payManage()
    {
        return Datatables::of(Purchase::where('user_id',Auth()->user()->id))
        ->addIndexColumn()->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="modal"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"><i class="fas fa-user-edit"></i></a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="fas fa-trash-alt"></i></a>';
                        return $btn;})->rawColumns(['action'])->make(true);
    }
    public function requestPayManage()
    {
        return Datatables::of(Purchase::where('production_user_id',Auth()->user()->id))
        ->addIndexColumn()->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="modal"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"><i class="fas fa-user-edit"></i></a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="fas fa-trash-alt"></i></a>';
                        return $btn;})->rawColumns(['action'])->make(true);
    }
    //GetFIle
    public function FileImageGet(Request $request)
    {
        if($request->has('term')){
            $data = Files::where('user_id',Auth()->user()->id)->where('image','LIKE','%'.$request->has('term').'%')->pluck('image');
        return response()->json($data);
        }
        
    }
}
