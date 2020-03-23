<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Db;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Files;
use App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public $directory_image;
    public $directory_document;
    public $directory_video;
    public $directory_audio;
    public $random;
    public $auth_id;
    public $auth_name;
    public $auth_email;
    public $auth_languange;
    public $auth_name_store;
    public $auth_saldo;
    public $auth_status;
    public $auth_last_study;
    public $auth_identity_card;
    public $auth_debit_card;
    public $auth_number;
    public $auth_born;
    public $auth_description;
    public $auth_locate;
    public $auth_gender;
    public $auth_avatars;

    public function __construct()
    {
        //middleware
        $this->middleware('auth');
        //helping
        $this->random = rand(1000000,10000000);
        //directory
        $this->directory_image = storage_path('app/public/image');
        $this->directory_document = storage_path('app/public/document');
        $this->directory_video = storage_path('app/public/video');
        $this->directory_audio = storage_path('app/public/audio');
        //authenticate
        $this->auth_id = Auth::user()?Auth::user()->id:null;
        $this->auth_name = Auth::user()?Auth::user()->name:null;
        $this->auth_email = Auth::user()?Auth::user()->email:null;
        $this->auth_languange = Auth::user()?Auth::user()->languange:null;
        $this->auth_name_store = Auth::user()?Auth::user()->name_store:null;
        $this->auth_saldo = Auth::user()?Auth::user()->saldo:null;
        $this->auth_status = Auth::user()?Auth::user()->status:null;
        $this->auth_last_study = Auth::user()?Auth::user()->last_study:null;
        $this->auth_identity_card = Auth::user()?Auth::user()->identity_card:null;
        $this->auth_debit_card = Auth::user()?Auth::user()->debit_card:null;
        $this->auth_number = Auth::user()?Auth::user()->number:null;
        $this->auth_born = Auth::user()?Auth::user()->born:null;
        $this->auth_description = Auth::user()?Auth::user()->description:null;
        $this->auth_locate = Auth::user()?Auth::user()->locate:null;
        $this->auth_gender = Auth::user()?Auth::user()->gender:null;
        $this->auth_avatars = Auth::user()?Auth::user()->avatars:null;
    }
    public function viewWord()
    {
	App::setLocale(Auth()->user()->languange);
	$title = 'My word';
	$word = Files::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate('25');
	return view('home.file.word', compact('title','word'));
    }
    public function file_managerWord()
    {
	App::setLocale(Auth()->user()->languange);
	$title = 'My word';
	$word = Files::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate('25');
	return view('home.file.component.file_managerWord', compact('title','word'));
	}
    public function viewexcel()
    {
	App::setLocale(Auth()->user()->languange);
	$title = 'My excel';
	$word = Files::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate('25');
	return view('home.file.excel', compact('title','word'));
    }
    public function file_managerExcel()
    {
	App::setLocale(Auth()->user()->languange);
	$title = 'My excel';
	$word = Files::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate('25');
	return view('home.file.component.file_managerExcel', compact('title','word'));
	}
    public function viewPowerpoint()
    {
	App::setLocale(Auth()->user()->languange);
	$title = 'My powerpoint';
	$word = Files::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate('25');
	return view('home.file.powerpoint', compact('title','word'));
    }
    public function file_managerPowerpoint()
    {
	App::setLocale(Auth()->user()->languange);
	$title = 'My powerpoint';
	$word = Files::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate('25');
	return view('home.file.component.file_managerPowerpoint', compact('title','word'));
	}
    public function viewImage()
    {
	App::setLocale(Auth()->user()->languange);
	$title = 'My image';
	$word = Files::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate('25');
	return view('home.file.image', compact('title','word'));
    }
    public function file_managerImage()
    {
	App::setLocale(Auth()->user()->languange);
	$title = 'My image';
	$word = Files::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate('25');
	return view('home.file.component.file_managerImage', compact('title','word'));
	}
    public function viewVideo()
    {
	App::setLocale(Auth()->user()->languange);
	$title = 'My video';
	$word = Files::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate('25');
	return view('home.file.video', compact('title','word'));
    }
    public function file_managerVideo(){
	App::setLocale(Auth()->user()->languange);
	$title = 'My video';
	$word = Files::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate('25');
	return view('home.file.component.file_managerVideo', compact('title','word'));
	}
    public function uploadFile(Request $request)
    {
	if($request->file('word')){
            $this->validate($request, [
            'fileName' => 'required|string',
            'privacy' => 'required',
            'word' => 'required|max:10000|file|mimes:doc,docx'
        ]);
        $file = $request->file('word');
        $namefile = $file->getClientOriginalName();
        $file->move($this->directory_document,$namefile);
        
        $dataFile = Files::all();
        foreach($dataFile as $fileData){
        	if($namefile == $fileData->word){
        		$id = Files::where('word', $namefile)->get();
        		foreach($id as $dataID){
        		DB::table('files')->where('id', $dataID->id)->update([
        		'name_file' => $request->fileName,
        		'word' => $namefile,
        		'updated_at' => Carbon::now(),
        		]);
        		return redirect()->back()->with('success', 'Your file update');
        		}
        	}
        	else{
        	DB::table('files')->insert([
        	'id' => $this->random,
        	'user_id' => Auth()->user()->id,
        	'name_file' => $request->fileName,
        	'privacy' => $request->privacy,
        	'word' => $namefile,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        	]);
        	return redirect()->back()->with('success', 'Upload successfuly');
        	}
        }//foreach
        
    }//if
    if($request->file('excel')){
            $this->validate($request, [
            'fileName' => 'required|string',
            'privacy' => 'required',
            'excel' => 'required|max:10000|file|mimes:xls,xlsx'
        ]);
        $file = $request->file('excel');
        $namefile = $file->getClientOriginalName();
        $file->move($this->directory_document,$namefile);
        
        $dataFile = Files::all();
        foreach($dataFile as $fileData){
        	if($namefile == $fileData->excel){
        		$id = Files::where('excel', $namefile)->get();
        		foreach($id as $dataID){
        		DB::table('files')->where('id', $dataID->id)->update([
        		'name_file' => $request->fileName,
        		'excel' => $namefile,
        		'updated_at' => Carbon::now(),
        		]);
        		return redirect()->back()->with('success', 'Your file update');
        		}
        	}
        	else{
        	DB::table('files')->insert([
        	'id' => $this->random,
        	'user_id' => Auth()->user()->id,
        	'name_file' => $request->fileName,
        	'privacy' => $request->privacy,
        	'excel' => $namefile,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        	]);
        	return redirect()->back()->with('success', 'Upload successfuly');
        	}
        }//foreach
    }
    if($request->file('powerpoint')){
            $this->validate($request, [
            'fileName' => 'required|string',
            'privacy' => 'required',
            'powerpoint' => 'required|max:10000|file|mimes:ppt,pptx'
        ]);
        $file = $request->file('powerpoint');
        $namefile = $file->getClientOriginalName();
        $file->move($this->directory_document,$namefile);
        
        $dataFile = Files::all();
        foreach($dataFile as $fileData){
        	if($namefile == $fileData->powerpoint){
        		$id = Files::where('powerpoint', $namefile)->get();
        		foreach($id as $dataID){
        		DB::table('files')->where('id', $dataID->id)->update([
        		'name_file' => $request->fileName,
        		'powerpoint' => $namefile,
        		'updated_at' => Carbon::now(),
        		]);
        		return redirect()->back()->with('success', 'Your file update');
        		}
        	}
        	else{
        	DB::table('files')->insert([
        	'id' => $this->random,
        	'user_id' => Auth()->user()->id,
        	'name_file' => $request->fileName,
        	'privacy' => $request->privacy,
        	'powerpoint' => $namefile,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        	]);
        	return redirect()->back()->with('success', 'Upload successfuly');
        	}
        }//foreach
    }
    if($request->file('image')){
            $this->validate($request, [
            'fileName' => 'required|string',
            'privacy' => 'required',
            'image' => 'required|max:10000|file|mimes:jpeg,jpg,png,bmp'
        ]);
        $file = $request->file('image');
        $namefile = $file->getClientOriginalName();
        $file->move($this->directory_image,$namefile);
        
        $dataFile = Files::all();
        foreach($dataFile as $fileData){
        	if($namefile == $fileData->image){
        		$id = Files::where('image', $namefile)->get();
        		foreach($id as $dataID){
        		DB::table('files')->where('id', $dataID->id)->update([
        		'name_file' => $request->fileName,
        		'image' => $namefile,
        		'updated_at' => Carbon::now(),
        		]);
        		return redirect()->back()->with('success', 'Your file update');
        		}
        	}
        	else{
        	DB::table('files')->insert([
        	'id' => $this->random,
        	'user_id' => Auth()->user()->id,
        	'name_file' => $request->fileName,
        	'privacy' => $request->privacy,
        	'image' => $namefile,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        	]);
        	return redirect()->back()->with('success', 'Upload successfuly');
        	}
        }//foreach
    }
    if($request->file('video')){
            $this->validate($request, [
            'fileName' => 'required|string',
            'privacy' => 'required',
            'video' => 'required|max:100000|file|mimes:3gp,mp4'
        ]);
        $file = $request->file('video');
        $namefile = .$file->getClientOriginalName();
        $file->move($this->directory_video,$namefile);
        
        $dataFile = Files::all();
        foreach($dataFile as $fileData){
        	if($namefile == $fileData->video){
        		$id = Files::where('video', $namefile)->get();
        		foreach($id as $dataID){
        		DB::table('files')->where('id', $dataID->id)->update([
        		'name_file' => $request->fileName,
        		'video' => $namefile,
        		'updated_at' => Carbon::now(),
        		]);
        		return redirect()->back()->with('success', 'Your file update');
        		}
        	}
        	else{
        	DB::table('files')->insert([
        	'id' => $this->random,
        	'user_id' => Auth()->user()->id,
        	'name_file' => $request->fileName,
        	'privacy' => $request->privacy,
        	'video' => $namefile,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        	]);
        	return redirect()->back()->with('success', 'Upload successfuly');
        	}
        }//foreach
    }
    }
    public function updateFiles(Request $request)
    {
	DB::table('files')->where('id', $request->updateID)->update([
		'name_file' => $request->nameFile,
		'privacy' => $request->privacy,
	]);
	return redirect()->back()->with('success', 'Success update files');
    }
    public function deleteFiles(Request $request)
    {
	$dataDelete = Files::where('id', $request->fileID)->get();
	foreach ($dataDelete as $data => $delete) {
		File::delete(storage_path('/app/public/document/').$delete->word);
		File::delete(storage_path('/app/public/document/').$delete->excel);
		File::delete(storage_path('/app/public/document/').$delete->powerpoint);
		File::delete(storage_path('/app/public/image/').$delete->image);
		File::delete(storage_path('/app/public/video/').$delete->video);
		Files::where('id', $request->fileID)->delete();
		return redirect()->back()->with('success', 'Successfuly delete file');
	}
    }
}