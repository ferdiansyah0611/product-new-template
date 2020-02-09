<?php

namespace App\Http\Controllers;
//Helping
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
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
        DB::table('settings')->insert([
            'show_products' => 'true',
            'body_color' => $request->body,
            'header_color' => $request->header,
            'footer_color' => $request->footer,
        ]);
        return redirect()->back();
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
}
