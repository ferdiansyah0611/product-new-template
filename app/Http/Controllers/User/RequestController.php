<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;

class RequestController extends Controller
{
    public function CreateDataTask(Request $request)
    {
    	$taskArray 	= array(
    		'title'		=> $request->title,
    		'content'	=> $request->task,
    		'file'		=> array(
    			'file_1'	=> $request->file_1,
    			'file_2'	=> $request->file_2,
    			'file_3'	=> $request->file_3,
    			'file_4'	=> $request->file_4,
    			'file_5'	=> $request->file_5,
    			'file_6'	=> $request->file_6,
    			'file_7'	=> $request->file_7,
    			'file_8'	=> $request->file_8,
    			'file_9'	=> $request->file_9,
    			'file_10'	=> $request->file_10,
    		),
    	);
    	$task = json_encode($taskArray);
    	$id = rand(1000000,10000000);
    	Task::create([
    		'id' 			=> $id,
    		'user_id'		=>	Auth()->user()->id,
    		'task'			=>	$task,
    		'expired'		=>	$request->expired,
    		'created_at'	=>	Carbon::now(),
            'updated_at'	=>	Carbon::now(),
    	]);
    	return response()->json(['success'=>'Success Add Data Task With ID '.$id]);
    }
    public function DeleteDataTask($id)
    {
    		Task::where('id',$id)->delete();
    		return response()->json(['success'=>'Data Task '.$id.' Delete Successfuly']);
    }
}
