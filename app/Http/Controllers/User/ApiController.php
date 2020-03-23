<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Production;
use App\User;
use App\Models\Task;
class ApiController extends Controller
{
    public function __construct()
    {
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
    public function DataTask($name)
    {
        $user = User::where('name_store',$name)->get();
        foreach($user as $u)
        {
           $data = Task::where('user_id', $u->id)->orderBy('updated_at','DESC')->paginate(25); 
        }
        return response()->json($data);
        
    }
    public function DataTaskTitle($id)
    {
        return response()->json(Task::where('id',$id)->first());
    }
}
