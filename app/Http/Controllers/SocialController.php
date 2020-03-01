<?php

namespace App\Http\Controllers;
Use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Db;
use App\Models\Friendly;

class SocialController extends Controller
{
    public function addFriends(Request $request){
    	if($request->has('addFriends')){
    		
    	DB::table('friendlies')->insert([
    		'user_id' => Auth()->user()->id,
    		'friends_id' => $request->friendsID,
    		'status' => '0',
    		'added_at' => Carbon::now(),
    		'created_at' => Carbon::now(),
    		'updated_at' => Carbon::now(),
    	]);
    	return redirect()->back()->with('success', 'Your has been invite freinds');
    	}
    	if($request->has('unFriends')){
    		DB::table('friendlies')->where('user_id', Auth()->user()->id)->where('friends_id', $request->friendsID)->update([
    			'status' => '-1',
    		]);
    		return redirect()->back()->with('success', 'Your has been unfriends');
    	}
    }
}
