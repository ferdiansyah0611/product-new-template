<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Db;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Files;
use App;
use Illuminate\Support\Facades\File;

class FileController extends Controller{
public $dirDOC;
public $directory_image;
public $directory_document;
public $directory_video;
public $directory_audio;
public function __construct(){
	//directory
        $this->directory_image = storage_path('app/public/image');
        $this->directory_document = storage_path('app/public/document');
        $this->directory_video = storage_path('app/public/video');
        $this->directory_audio = storage_path('app/public/audio');
	$this->dirDOC = storage_path('app/public/document');
	$this->middleware('auth');
}
public function viewWord(){
	App::setLocale(Auth()->user()->languange);
	$title = 'My word';
	$word = Files::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate('25');
	return view('home.file.word', compact('title','word'));
}	public function file_managerWord(){
	App::setLocale(Auth()->user()->languange);
	$title = 'My word';
	$word = Files::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate('25');
	return view('home.file.component.file_managerWord', compact('title','word'));
	}
public function viewexcel(){
	App::setLocale(Auth()->user()->languange);
	$title = 'My excel';
	$word = Files::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate('25');
	return view('home.file.excel', compact('title','word'));
}	public function file_managerExcel(){
	App::setLocale(Auth()->user()->languange);
	$title = 'My excel';
	$word = Files::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate('25');
	return view('home.file.component.file_managerExcel', compact('title','word'));
	}
public function viewPowerpoint(){
	App::setLocale(Auth()->user()->languange);
	$title = 'My powerpoint';
	$word = Files::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate('25');
	return view('home.file.powerpoint', compact('title','word'));
}	public function file_managerPowerpoint(){
	App::setLocale(Auth()->user()->languange);
	$title = 'My powerpoint';
	$word = Files::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate('25');
	return view('home.file.component.file_managerPowerpoint', compact('title','word'));
	}
public function viewImage(){
	App::setLocale(Auth()->user()->languange);
	$title = 'My image';
	$word = Files::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate('25');
	return view('home.file.image', compact('title','word'));
}	public function file_managerImage(){
	App::setLocale(Auth()->user()->languange);
	$title = 'My image';
	$word = Files::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate('25');
	return view('home.file.component.file_managerImage', compact('title','word'));
	}
public function viewVideo(){
	App::setLocale(Auth()->user()->languange);
	$title = 'My video';
	$word = Files::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate('25');
	return view('home.file.video', compact('title','word'));
}	public function file_managerVideo(){
	App::setLocale(Auth()->user()->languange);
	$title = 'My video';
	$word = Files::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate('25');
	return view('home.file.component.file_managerVideo', compact('title','word'));
	}
public function uploadFile(Request $request){
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
        	'id' => rand(1000000000, 10000000000),
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
        	'id' => rand(1000000000, 10000000000),
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
        	'id' => rand(1000000000, 10000000000),
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
        $namefile = "/db/img/".$file->getClientOriginalName();
        $toupload = 'db/img/';
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
        	'id' => rand(1000000000, 10000000000),
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
        $namefile = "/db/video/".$file->getClientOriginalName();
        $toupload = 'db/video/';
        $file->move($this->dirDOC,$namefile);
        
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
        	'id' => rand(1000000000, 10000000000),
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
public function updateFiles(Request $request){
	DB::table('files')->where('id', $request->updateID)->update([
		'name_file' => $request->nameFile,
		'privacy' => $request->privacy,
	]);
	return redirect()->back()->with('success', 'Success update files');
}
public function deleteFiles(Request $request){
	$dataDelete = Files::where('id', $request->fileID)->get();
	foreach ($dataDelete as $data => $delete) {
		File::delete(storage_path('/app/public/document/').$delete->word);
		File::delete(storage_path('/app/public/document/').$delete->excel);
		File::delete(storage_path('/app/public/document/').$delete->powerpoint);
		File::delete(storage_path('/app/public/document/').$delete->image);
		File::delete(storage_path('/app/public/document/').$delete->video);
		Files::where('id', $request->fileID)->delete();
		return redirect()->back()->with('success', 'Successfuly delete file');
	}
}
}