<?php

namespace App\Http\Controllers;
//Schema
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//Helping
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use File;
use App;
//Models
use App\Models\Cart;
use App\Models\Category;
use App\Models\Chart;
use App\Models\Client;
use App\Models\Invitation;
use App\Models\Like;
use App\Models\LikeQuestion;
use App\Models\Messages;
use App\Models\Notification;
use App\Models\Page;
use App\Models\Production;
use App\Models\Profile;
use App\Models\Purchase;
use App\Models\Question;
use App\Models\Saldo;
use App\Models\SessionDisplay;
use App\Models\SessionLogin;
use App\Models\Setting;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }
    public function create()
    {
        App::setLocale(Auth()->user()->languange);
        $profile_user = Profile::where('user_id', Auth()->user()->id)->get();
        $profiles = Profile::latest()->get();
        $title = 'create';
        return view('home.profile.create', compact('title', 'profiles', 'profile_user'));
    }
    public function store(Request $request)
    {
        if ($request->has('profile_create')) {
            $this->validate($request, [
                'profile_create' => 'required',
                'name' => 'required',
                'email' => 'required',
                'status' => 'required',
                'last_study' => 'required',
                'identity_card' => 'string',
                'debit_card' => 'string',
                'number' => 'required',
                'hbd' => 'required',
                'description' => 'required',
                'locate' => 'required',
                'avatars' => 'required|file|image|mimes:jpg,png,jpeg|max:4000',
                'created_at' => Carbon::now(),
            ]);
            $file = $request->file('avatars');
            $namefile = "/db/img/".$file->getClientOriginalName();
            $toupload = 'db/img/';
            $file->move($toupload,$namefile);
            DB::table('profiles')->insert([
                'user_id' => $request->profile_create,
                'name' => $request->name,
                'email' => $request->email,
                'status' => $request->status,
                'last_study' => $request->last_study,
                'identity_card' => $request->identity_card,
                'debit_card' => $request->debit_card,
                'number' => $request->number,
                'hbd' => $request->hbd,
                'description' => $request->description,
                'locate' => $request->locate,
                'avatars' => $namefile,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('productions.index')->with('success', 'Successfully create your profiles');
        }
    }
    public function show(Profile $profile)
    {
        App::setLocale(Auth()->user()->languange);
        $title = 'show';
        $profile_user = Profile::where('user_id', Auth()->user()->id)->get();
        return view('home.profile.show', compact('profile', 'title', 'profile_user', 'likers'));
    }
    public function edit(Profile $profile)
    {
        App::setLocale(Auth()->user()->languange);
        $title = 'edit';
        $profile_user = Profile::where('user_id', Auth()->user()->id)->get();
        return view('home.profile.edit', compact('profile', 'title' ,'profile_user'));
    }
    public function update(Request $request, Profile $profile)
    {
        //
    }
    public function destroy(Profile $profile)
    {
        //
    }
    public function like(Request $request){
        if($request->has('profiles_like')){
        DB::table('likes')->insert([
            'user_id' => Auth()->user()->id,
            'profile_id' => $request->profiles_like,
            'like' => '1',
            'notification' => Auth()->user()->name.', has been likes you',
            'created_at' => Carbon::now(),
        ]);
        DB::table('notifications')->insert([
            'user_id' => Auth()->user()->id,
            'name' => Auth()->user()->name,
            'notification' => strtolower(Auth()->user()->name).', has been likes you',
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back();
        }
    }
    public function me(Profile $profile)
    {
        App::setLocale(Auth()->user()->languange);
        $title = 'show';
        $profile_user = Profile::where('user_id', Auth()->user()->id)->get();
        return view('home.profile.me', compact('profile', 'title', 'profile_user', 'likers'));
    }
    public function set_account(Profile $profile)
    {
        App::setLocale(Auth()->user()->languange);
        $title = 'edit';
        $profile_user = Profile::where('user_id', Auth()->user()->id)->get();
        $profile_user_data = User::where('id', Auth()->user()->id)->get();
        return view('home.settings.account', compact('title' ,'profile_user', 'profile_user_data'));
    }
    public function update_account(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'status' => 'required',
            'last_study' => 'required',
            'identity_card' => 'string',
            'debit_card' => 'string',
            'number' => 'required',
            'born' => 'required',
            'description' => 'required',
            'locate' => 'required',
            'avatars' => 'file|image|mimes:jpg,png,jpeg|max:4000',
        ]);
        if($request->file('avatars')){
        $file = $request->file('avatars');
        $namefile = "/db/img/for-profiles-avatars-".rand(1000, 1000000).$file->getClientOriginalExtension();
        $toupload = 'db/img/';
        $file->move($toupload,$namefile);
        File::delete(public_path(Auth()->user()->avatars));
        DB::table('users')->where('id', Auth()->user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'last_study' => $request->last_study,
            'identity_card' => $request->identity_card,
            'debit_card' => $request->debit_card,
            'number' => $request->number,
            'born' => $request->born,
            'description' => $request->description,
            'locate' => $request->locate,
            'avatars' => $namefile,
            'updated_at' => Carbon::now(),
        ]);
        }
        DB::table('users')->where('id', Auth()->user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'last_study' => $request->last_study,
            'identity_card' => $request->identity_card,
            'debit_card' => $request->debit_card,
            'number' => $request->number,
            'born' => $request->born,
            'description' => $request->description,
            'locate' => $request->locate,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('production.index')->with('success', 'Your has been update account');
    }
    public function display_set(){
        App::setLocale(Auth()->user()->languange);
        $title = 'display';
        return view('home.settings.display', compact('title'));
    }
    public function display_store(Request $request){
        $data = DB::table('session_displays')->get();
        foreach($data as $d){
            if($request->myID == $d->user_id){
                $me = DB::table('session_displays')->where('user_id', $request->myID)->get();
                foreach($me as $m){
                    if($request->body_walpaper == 'walpaper-1'){
                        DB::table('session_displays')->where('id', $m->id)->update([
                        'navbar' => $request->navbar,
                        'navbar_font_size' => $request->navbar_font_size,
                        'main_menu' => $request->main_menu,
                        'main_menu_status' => $request->main_menu_status,
                        'main_menu_font_size' => $request->main_menu_font_size,
                        'body_walpaper' => $request->body_walpaper,
                        'body_page' => $request->body_page,
                        'body_color' => '',
                        'animate_status' => $request->animate_status,
                        'animate_time' => $request->animate_time,
                    ]);
                    }//if
                    elseif($request->body_walpaper == 'walpaper-2'){
                        DB::table('session_displays')->where('id', $m->id)->update([
                        'navbar' => $request->navbar,
                        'navbar_font_size' => $request->navbar_font_size,
                        'main_menu' => $request->main_menu,
                        'main_menu_status' => $request->main_menu_status,
                        'main_menu_font_size' => $request->main_menu_font_size,
                        'body_walpaper' => $request->body_walpaper,
                        'body_page' => $request->body_page,
                        'body_color' => '',
                        'animate_status' => $request->animate_status,
                        'animate_time' => $request->animate_time,
                    ]);
                    }//if
                    elseif($request->body_walpaper == 'walpaper-3'){
                        DB::table('session_displays')->where('id', $m->id)->update([
                        'navbar' => $request->navbar,
                        'navbar_font_size' => $request->navbar_font_size,
                        'main_menu' => $request->main_menu,
                        'main_menu_status' => $request->main_menu_status,
                        'main_menu_font_size' => $request->main_menu_font_size,
                        'body_walpaper' => $request->body_walpaper,
                        'body_page' => $request->body_page,
                        'body_color' => '',
                        'animate_status' => $request->animate_status,
                        'animate_time' => $request->animate_time,
                    ]);
                    }//if
                    elseif($request->body_walpaper == 'walpaper-4'){
                        DB::table('session_displays')->where('id', $m->id)->update([
                        'navbar' => $request->navbar,
                        'navbar_font_size' => $request->navbar_font_size,
                        'main_menu' => $request->main_menu,
                        'main_menu_status' => $request->main_menu_status,
                        'main_menu_font_size' => $request->main_menu_font_size,
                        'body_walpaper' => $request->body_walpaper,
                        'body_page' => $request->body_page,
                        'body_color' => '',
                        'animate_status' => $request->animate_status,
                        'animate_time' => $request->animate_time,
                    ]);
                    }//if
                    elseif($request->body_walpaper == 'walpaper-5'){
                        DB::table('session_displays')->where('id', $m->id)->update([
                        'navbar' => $request->navbar,
                        'navbar_font_size' => $request->navbar_font_size,
                        'main_menu' => $request->main_menu,
                        'main_menu_status' => $request->main_menu_status,
                        'main_menu_font_size' => $request->main_menu_font_size,
                        'body_walpaper' => $request->body_walpaper,
                        'body_page' => $request->body_page,
                        'body_color' => '',
                        'animate_status' => $request->animate_status,
                        'animate_time' => $request->animate_time,
                    ]);
                    }//if
                    elseif($request->body_walpaper == 'walpaper-6'){
                        DB::table('session_displays')->where('id', $m->id)->update([
                        'navbar' => $request->navbar,
                        'navbar_font_size' => $request->navbar_font_size,
                        'main_menu' => $request->main_menu,
                        'main_menu_status' => $request->main_menu_status,
                        'main_menu_font_size' => $request->main_menu_font_size,
                        'body_walpaper' => $request->body_walpaper,
                        'body_page' => $request->body_page,
                        'body_color' => '',
                        'animate_status' => $request->animate_status,
                        'animate_time' => $request->animate_time,
                    ]);
                    }//if
                    elseif($request->body_walpaper == 'walpaper-7'){
                        DB::table('session_displays')->where('id', $m->id)->update([
                        'navbar' => $request->navbar,
                        'navbar_font_size' => $request->navbar_font_size,
                        'main_menu' => $request->main_menu,
                        'main_menu_status' => $request->main_menu_status,
                        'main_menu_font_size' => $request->main_menu_font_size,
                        'body_walpaper' => $request->body_walpaper,
                        'body_page' => $request->body_page,
                        'body_color' => '',
                        'animate_status' => $request->animate_status,
                        'animate_time' => $request->animate_time,
                    ]);
                    }//if
                    elseif($request->body_walpaper == 'walpaper-8'){
                        DB::table('session_displays')->where('id', $m->id)->update([
                        'navbar' => $request->navbar,
                        'navbar_font_size' => $request->navbar_font_size,
                        'main_menu' => $request->main_menu,
                        'main_menu_status' => $request->main_menu_status,
                        'main_menu_font_size' => $request->main_menu_font_size,
                        'body_walpaper' => $request->body_walpaper,
                        'body_page' => $request->body_page,
                        'body_color' => '',
                        'animate_status' => $request->animate_status,
                        'animate_time' => $request->animate_time,
                    ]);
                    }//if
                    elseif($request->body_walpaper == 'walpaper-9'){
                        DB::table('session_displays')->where('id', $m->id)->update([
                        'navbar' => $request->navbar,
                        'navbar_font_size' => $request->navbar_font_size,
                        'main_menu' => $request->main_menu,
                        'main_menu_status' => $request->main_menu_status,
                        'main_menu_font_size' => $request->main_menu_font_size,
                        'body_walpaper' => $request->body_walpaper,
                        'body_page' => $request->body_page,
                        'body_color' => '',
                        'animate_status' => $request->animate_status,
                        'animate_time' => $request->animate_time,
                    ]);
                    }//if
                    elseif($request->body_walpaper == 'walpaper-10'){
                        DB::table('session_displays')->where('id', $m->id)->update([
                        'navbar' => $request->navbar,
                        'navbar_font_size' => $request->navbar_font_size,
                        'main_menu' => $request->main_menu,
                        'main_menu_status' => $request->main_menu_status,
                        'main_menu_font_size' => $request->main_menu_font_size,
                        'body_walpaper' => $request->body_walpaper,
                        'body_page' => $request->body_page,
                        'body_color' => '',
                        'animate_status' => $request->animate_status,
                        'animate_time' => $request->animate_time,
                    ]);
                    }//if
                    else{
                        DB::table('session_displays')->where('id', $m->id)->update([
                        'navbar' => $request->navbar,
                        'navbar_font_size' => $request->navbar_font_size,
                        'main_menu' => $request->main_menu,
                        'main_menu_status' => $request->main_menu_status,
                        'main_menu_font_size' => $request->main_menu_font_size,
                        'body_page' => $request->body_page,
                        'body_color' => $request->body_color,
                        'body_walpaper' => '',
                        'animate_status' => $request->animate_status,
                        'animate_time' => $request->animate_time,
                    ]);
                    }
                }
                return redirect()->back();
            }
            else{
        $post = new SessionDisplay();
        $post->id = rand(1000,100000);
        $post->user_id = Auth()->user()->id;
        $post->navbar = $request->navbar;
        $post->navbar_font_size = $request->navbar_font_size;
        $post->main_menu = $request->main_menu;
        $post->main_menu_status = $request->main_menu_status;
        $post->main_menu_font_size = $request->main_menu_font_size;
        $post->body_walpaper = $request->body_walpaper;
        $post->body_page = $request->body_page;
        $post->body_color = $request->body_color;
        $post->animate_status = $request->animate_status;
        $post->animate_time = $request->animate_time;
        $post->save();
        return redirect()->back();
            }
        }//foreach
        
        
    }
    public function pending(){
        App::setLocale(Auth()->user()->languange);
        $title = 'pending';
        $data_pending = Purchase::where('user_id', Auth()->user()->id)->where('status', 'Pending')->orderBy('created_at', 'DESC')->paginate(25);
        return view('home.purchase.pending', compact('title'), ['data' => $data_pending]);
    }
    public function receive(){
        App::setLocale(Auth()->user()->languange);
        $title = 'Receive';
        $data_pending = Purchase::where('user_id', Auth()->user()->id)->where('status', 'Receive')->orderBy('created_at', 'DESC')->paginate(25);
        return view('home.purchase.receive', compact('title'), ['data' => $data_pending]);
    }
    public function latestPurchase(){
        App::setLocale(Auth()->user()->languange);
        $title = 'Receive';
        return view('home.purchase.latest',compact('title'));
    }
    public function latestPurchaseAPI(){
        return DataTables::of(Purchase::where('user_id',Auth()->user()->id))->make(true);
    }
    public function preview(){
        App::setLocale(Auth()->user()->languange);
        $title = 'preview';
        return view('home.settings.preview', compact('title'));
    }
    public function view_history(){
        App::setLocale(Auth()->user()->languange);
        $title = 'title';
        $data_history = DB::table('session_logins')->where('user_id', Auth()->user()->id)->paginate('15');
        return view('home.settings.history_login', ['data' => $data_history], compact('title'));
    }
    public function delete_history_login(Request $request){
        DB::table('session_logins')->where('id', $request->id)->delete();
        return redirect()->back()->with('success', 'Succesfully delete history login');
    }
    public function changeLang(Request $request){
        DB::table('users')->where('id', Auth()->user()->id)->update([
            'languange' => $request->langID,
        ]);
        return redirect()->back();
    }
    public function readallnotif(Request $request){
        Notification::where('email_to', Auth()->user()->email)->where('status', '0')->update([
            'status' => '1',
        ]);
        return response()->json('success', 'Success');
    }
    public function showProfile($slug){
        App::setLocale(Auth()->user()->languange);
        $title = 'show';
        $data = DB::table('users')->where('name_store', $slug)->get();
        return view('home.profile.show', compact('title', 'data'));
    }
    //database members
    public function createFolderMembers(Request $request){
        $this->validate($request,[
            'folders_1' => 'string|max:60',
        ]);
        //$type1 = $request->typeData1;$value1 = $request->typeValue1;
        //$type2 = $request->typeData2;$value2 = $request->typeValue2;
        //$type3 = $request->typeData2;$value3 = $request->typeValue3;
        //$type4 = $request->typeData2;$value4 = $request->typeValue4;
        //$type5 = $request->typeData2;$value5 = $request->typeValue5;
        if(Auth()->user()->role == '3'){
            if($request->folders_10 == true){
            DB::connection('product_members_1')->table('folders')->insert(['id' => rand(1000000000000,10000000000000),'user_id' => Auth()->user()->id,'folders_1' => $request->folders_1,'folders_2' => $request->folders_2,'folders_3' => $request->folders_3,'folders_4' => $request->folders_4,'folders_5' => $request->folders_5,'folders_6' => $request->folders_6,'folders_7' => $request->folders_7,'folders_8' => $request->folders_8,'folders_9' => $request->folders_9,'folders_10' => $request->folders_10,'created_at' => Carbon::now(),'updated_at' => Carbon::now(),]);return response()->json('success', 'success');
            }//end if
            elseif($request->folders_9 == true){
            DB::connection('product_members_1')->table('folders')->insert(['id' => rand(1000000000000,10000000000000),'user_id' => Auth()->user()->id,'folders_1' => $request->folders_1,'folders_2' => $request->folders_2,'folders_3' => $request->folders_3,'folders_4' => $request->folders_4,'folders_5' => $request->folders_5,'folders_6' => $request->folders_6,'folders_7' => $request->folders_7,'folders_8' => $request->folders_8,'folders_9' => $request->folders_9,'created_at' => Carbon::now(),'updated_at' => Carbon::now(),]);return response()->json('success', 'success');
            }//end if
            elseif($request->folders_8 == true){
            DB::connection('product_members_1')->table('folders')->insert(['id' => rand(1000000000000,10000000000000),'user_id' => Auth()->user()->id,'folders_1' => $request->folders_1,'folders_2' => $request->folders_2,'folders_3' => $request->folders_3,'folders_4' => $request->folders_4,'folders_5' => $request->folders_5,'folders_6' => $request->folders_6,'folders_7' => $request->folders_7,'folders_8' => $request->folders_8,'created_at' => Carbon::now(),'updated_at' => Carbon::now(),]);return response()->json('success', 'success');
            }//end if
            elseif($request->folders_7 == true){
            DB::connection('product_members_1')->table('folders')->insert(['id' => rand(1000000000000,10000000000000),'user_id' => Auth()->user()->id,'folders_1' => $request->folders_1,'folders_2' => $request->folders_2,'folders_3' => $request->folders_3,'folders_4' => $request->folders_4,'folders_5' => $request->folders_5,'folders_6' => $request->folders_6,'folders_7' => $request->folders_7,'created_at' => Carbon::now(),'updated_at' => Carbon::now(),]);return response()->json('success', 'success');
            }//end if
            elseif($request->folders_6 == true){
            DB::connection('product_members_1')->table('folders')->insert(['id' => rand(1000000000000,10000000000000),'user_id' => Auth()->user()->id,'folders_1' => $request->folders_1,'folders_2' => $request->folders_2,'folders_3' => $request->folders_3,'folders_4' => $request->folders_4,'folders_5' => $request->folders_5,'folders_6' => $request->folders_6,'created_at' => Carbon::now(),'updated_at' => Carbon::now(),]);return response()->json('success', 'success');
            }//end if
            elseif($request->folders_5 == true){
            DB::connection('product_members_1')->table('folders')->insert(['id' => rand(1000000000000,10000000000000),'user_id' => Auth()->user()->id,'folders_1' => $request->folders_1,'folders_2' => $request->folders_2,'folders_3' => $request->folders_3,'folders_4' => $request->folders_4,'folders_5' => $request->folders_5,'created_at' => Carbon::now(),'updated_at' => Carbon::now(),]);return response()->json('success', 'success');
            }//end if
            elseif($request->folders_4 == true){
            DB::connection('product_members_1')->table('folders')->insert(['id' => rand(1000000000000,10000000000000),'user_id' => Auth()->user()->id,'folders_1' => $request->folders_1,'folders_2' => $request->folders_2,'folders_3' => $request->folders_3,'folders_4' => $request->folders_4,'created_at' => Carbon::now(),'updated_at' => Carbon::now(),]);return response()->json('success', 'success');
            }//end if
            elseif($request->folders_3 == true){
            DB::connection('product_members_1')->table('folders')->insert(['id' => rand(1000000000000,10000000000000),'user_id' => Auth()->user()->id,'folders_1' => $request->folders_1,'folders_2' => $request->folders_2,'folders_3' => $request->folders_3,'created_at' => Carbon::now(),'updated_at' => Carbon::now(),]);return response()->json('success', 'success');
            }//end if
            elseif($request->folders_2 == true){
            DB::connection('product_members_1')->table('folders')->insert(['id' => rand(1000000000000,10000000000000),'user_id' => Auth()->user()->id,'folders_1' => $request->folders_1,'folders_2' => $request->folders_2,'created_at' => Carbon::now(),'updated_at' => Carbon::now(),]);return response()->json('success', 'success');
            }//end if
            elseif($request->folders_1 == true){
            DB::connection('product_members_1')->table('folders')->insert(['id' => rand(1000000000000,10000000000000),'user_id' => Auth()->user()->id,'folders_1' => $request->folders_1,'created_at' => Carbon::now(),'updated_at' => Carbon::now(),]);return response()->json('success', 'success');
            }//end if

        }//end if user
        /*if(Auth()->user()->role == '3'){
            if($request->folderOne == true){
                Schema::connection('product_members_1')->create($request->folderOne, function($table){
                    $table->increments('id');
                    $table->$type1($value1);
                    $table->bigInteger('max')->defaut('1000000000');
                    $table->timestamps();
                });
            }//end if
            elseif($request->folderTwo == true){
                Schema::connection('product_members_1')->create($request->folderTwo, function($table){
                    $table->increments('id');
                    $table->$type1($value1);
                    $table->$type2($value2);
                    $table->bigInteger('max')->defaut('1000000000');
                    $table->timestamps();
                });
            }//end else if
            elseif($request->folderThree == true){
                Schema::connection('product_members_1')->create($request->folderThree, function($table){
                    $table->increments('id');
                    $table->$type1($value1);
                    $table->$type2($value2);
                    $table->$type3($value3);
                    $table->bigInteger('max')->defaut('1000000000');
                    $table->timestamps();
                });
            }//end else if
            elseif($request->folderFourth == true){
                Schema::connection('product_members_1')->create($request->folderFourth, function($table){
                    $table->increments('id');
                    $table->$type1($value1);
                    $table->$type2($value2);
                    $table->$type3($value3);
                    $table->$type4($value4);
                    $table->bigInteger('max')->defaut('1000000000');
                    $table->timestamps();
                });
            }//end else if
            elseif($request->folderFive == true){
                Schema::connection('product_members_1')->create($request->folderFive, function($table){
                    $table->increments('id');
                    $table->$type1($value1);
                    $table->$type2($value2);
                    $table->$type3($value3);
                    $table->$type4($value4);
                    $table->$type5($value5);
                    $table->bigInteger('max')->defaut('1000000000');
                    $table->timestamps();
                });
            }//end else if
        }//end if user
        */
        
    }
}
