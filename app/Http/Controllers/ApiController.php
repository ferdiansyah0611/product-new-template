<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
class ApiController extends Controller
{
    public function test(){
        $user = User::latest()->get();
        return response()->json($user);
    }
    public function index(){
    	$product = Production::latest()->where('status', 'public')->orderBy('updated_at', 'DESC')->paginate(16);
        $category = Category::latest()->orderBy('name', 'ASC')->get();
    }
    public function template(){
    	$title = 'gsvs';
    	return view('layouts.template', compact('title'));
    }
    public function production(){
        $chart = DB::table('productions')->paginate('20');
        return response()->json($chart);
    }
    public function categoryAPI(){
        return DB::table('categories')->get();
    }
    
}
