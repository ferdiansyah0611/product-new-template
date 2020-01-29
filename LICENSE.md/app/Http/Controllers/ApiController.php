<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
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
    
}
