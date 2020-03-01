<?php

namespace App\Http\Controllers;
//Helping
use App;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
//Models
use App\Models\AdminChat;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Chart;
use App\Models\Client;
use App\Models\EmailChat;
use App\Models\Files;
use App\Models\Friendly;
use App\Models\Invitation;
use App\Models\Like;
use App\Models\LikeQuestion;
use App\Models\MessageChat;
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

class DashboardController extends Controller
{
    public $random;
    public $directory_image;
    public function __construct()
    {
        $this->middleware('Pemilik');
        $this->directory_image = storage_path('app/public/image');
        $this->random = rand(1000000,10000000);
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
    public function index(User $user)
    {
        App::setLocale(Auth()->user()->languange);
        $title = 'Dashboard';
        $notification_products = Notification::where('user_id', $this->auth_id)->orderBy('id', 'DESC')->paginate(10);
        $likers = Like::where('user_id', $this->auth_id)->pluck('like')->count();
        $count_users = User::all()->pluck('count')->count();
        $latest_product = Production::where('user_id', $this->auth_id)->latest()->paginate(5);
        $purchase = Purchase::where('user_id', $this->auth_id)->paginate(10);
        $usersdata = DB::table('users')->orderBy('created_at', 'DESC')->paginate('9');
        return view('home.dashboard.index', compact('title', 'notification_products', 'user', 'likers', 'count_users'), ['latest' => $latest_product, 'pu' => $purchase, 'users' => $usersdata]);
    }
    public function categoryAPI(){
        return Datatables::of(Category::query())->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" data-toggle="modal"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editUser" data-target="#editCategoryModal"><i class="fas fa-edit"></i></a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteCategory"><i class="fas fa-trash-alt"></i></a>';
                        return $btn;
                    })->rawColumns(['action'])->make(true);
    }
    public function notifAll(){
        App::setLocale(Auth()->user()->languange);
        return view('layouts.component.notifAll');
    }
    public function notifMessages(){
        App::setLocale(Auth()->user()->languange);
        return view('layouts.component.notifMessages');
    }
    public function new_category(Request $request){
        DB::table('categories')->insert([
            'name' => $request->name,
            'display' => $request->display,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return response()->json(['success', 'Add category successfully']);
    }
    public function update_category(Request $request, Category $category){
            Category::where('id', $category->id)->update([
                'name' => $request->update_category,
                'display' => $request->display,
                'updated_at' => Carbon::now(),
            ]);
            Production::where('category_products', $category->name)->update([
                'category_products' => $request->update_category,
            ]);
            return redirect()->route('dashboard.index')->with('success', 'Update category successfully');
            
    }
    static function delete_category($id){
        Category::where('id', $id)->delete();
        return response()->json(['success' => 'Delete category successfully']);
    }
    public function manage_users(){
        App::setLocale(Auth()->user()->languange);
        $title = 'Manage';
        $get_users = User::latest()->paginate(25);
        return view('home.dashboard.manage_users', compact('title'),['for' => $get_users]);
    }
    public function update_users(Request $request, User $user){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'status' => 'required',
            'role' => 'required',
            'last_study' => 'required',
            'identity_card' => 'string',
            'debit_card' => 'string',
            'number' => 'required',
            'born' => 'required',
            'description' => 'required',
            'locate' => 'required',
        ]);
        DB::table('users')->where('id', $user->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'last_study' => $request->last_study,
            'role' => $request->role,
            'identity_card' => $request->identity_card,
            'debit_card' => $request->debit_card,
            'number' => $request->number,
            'born' => $request->born,
            'description' => $request->description,
            'locate' => $request->locate,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('production.index')->with('success', 'Your has been update users');
    }
    public function addUser(Request $request){
        DB::table('users')->insert([
            'id' => rand(1000000000000,10000000000000),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make(),
            'role' => $request->role,
            'saldo' => $request->saldo,
            'locate' => $request->locate,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return response()->json(['success' => 'successfully']);
    }
    public function search_user(Request $request){
        App::setLocale(Auth()->user()->languange);
        $search = $request->search;
        $data_user = User::where('name','like',"%".$search."%")->paginate(25);
        $title = 'Search for '.$request->search;
        return view('home.dashboard.search_users', compact('title', 'search'), ['for' => $data_user]);
    }
    public function manage_database(){
        App::setLocale(Auth()->user()->languange);
        $user_usage = Production::latest()->paginate(25);
        $title = 'manage';
        return view('home.dashboard.manage_database', compact('title'), ['qwerty' => $user_usage]);
    }
    public function delete_all_notification(){
        Notification::where('user_id', Auth()->user()->id)->delete();
        return redirect()->back();
    }
    public function save_size(Production $production, Request $request){
        DB::table('productions')->where('id', $production->id)->update([
            'size' => $request->size,
        ]);
        return redirect()->back();
    }
    public function privacy(){App::setLocale(Auth()->user()->languange);$title = 'Privacy & Policy Of My Production';return view('about.privacy_policy', compact('title'));}
    public function community(){App::setLocale(Auth()->user()->languange);$title = 'Community Of My Production';return view('about.community', compact('title'));}
    public function disclaimer(){App::setLocale(Auth()->user()->languange);$title = 'Disclaimer Of My Production';return view('about.disclaimer', compact('title'));}
    public function programming(){App::setLocale(Auth()->user()->languange);$title = 'Programming Of My Production';return view('about.programming', compact('title'));}
    public function random_saldo(Request $request){
        DB::table('saldos')->insert([
            'saldo' => $request->saldo,
            'random' => Str::random(),
            'status' => 'true',
            'expired_at' => $request->expired,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }
    public function newseed(){
        $title = 'Newseed';
        return view('home.newseed.index', compact('title'));
    }
    public function newseedShow($slug){
        $title = 'ititle';
        $data = DB::connection('mysql2')->table('newseed')->where('title',$slug)->get();
        return view('home.newseed.show', compact('title','data'));
    }
    public function newseedCreate(){
        $title = 'Newseed';
        $getData = DB::connection('mysql2')->table('newseed')->paginate(50);
        return view('home.newseed.create', compact('title', 'getData'));
    }
    public function newseedUpload(Request $request){
            //$input['file'] = time().'.'.$request->file->extension();
            //$request->file->move(public_path('db/image'), $input['file']);
        DB::connection('mysql2')->table('newseed')->insert([
            'id' => rand(1000000, 10000000),
            'user_id' => base64_encode(Auth()->user()->id),
            'title' => Str::slug($request->title),
            'content' => base64_encode($request->content),
            'created_at' => Carbon::now(),
            'file' => base64_encode($request->directory),
            'status' => base64_encode($request->status),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }
    public function newseedDelete(Request $request){
        DB::connection('mysql2')->table('newseed')->where('title', $request->titleNewseed)->delete();
        return redirect()->back();
    }
    public function newseedcreateCOMP(){
        return view('home.newseed.component.create');
    }

/*------------------------------------------------------------*/
/*------------------------------------------------------------*/
/*----------------------FOR SINGLE PAGES----------------------*/
/*------------------------------------------------------------*/ 
/*------------------------------------------------------------*/

    public function dashboardSPA(User $user)
    {
        App::setLocale(Auth()->user()->languange);
        $title = 'Dashboard';
        $category = Category::latest()->get();
        $notification_products = Notification::where('user_id', Auth()->user()->id)->orderBy('id', 'DESC')->paginate(10);
        $likers = Like::where('user_id', Auth()->user()->id)->pluck('like')->count();
        $count_users = User::all()->pluck('count')->count();
        $latest_product = Production::where('user_id', Auth()->user()->id)->latest()->paginate(5);
        $purchase = Purchase::where('user_id', Auth()->user()->id)->paginate(10);
        $usersdata = DB::table('users')->orderBy('created_at', 'DESC')->paginate('9');
        return view('home.dashboard.spa.dashboard', compact('title', 'category', 'notification_products', 'user', 'likers', 'count_users'), ['latest' => $latest_product, 'pu' => $purchase, 'users' => $usersdata]);
    }
    public function manageUsersSPA(){
        App::setLocale(Auth()->user()->languange);
        $title = 'Manage';
        $get_users = User::latest()->paginate(25);
        return view('home.dashboard.spa.manage_users', compact('title'),['for' => $get_users]);
    }
    //API PAGE
    public function userManageAPI(){
        return Datatables::of(User::query())->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" data-toggle="modal"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editUser" data-target="#editUserModal"><i class="fas fa-user-edit"></i></a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser"><i class="fas fa-trash-alt"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }
    public function editUserAPI($id){
        $user = User::find($id);
        return response()->json($user);
    }
    public function deleteUserAPI($id){
        User::find($id)->delete();
        return response()->json(['success' => 'Successfuly delete data']);
    }
    public function updateUserAPI(Request $request){
        User::where('id', $request->DATA)->update(
                    ['name' => $request->nameDATA,'email' => $request->emailDATA,
                    'role' => $request->roleDATA,
                    'status' => $request->statusDATA,
                    'last_study' => $request->studyDATA,
                    'identity_card' => $request->identityDATA,
                    'debit_card' => $request->debitDATA,
                    'number' => $request->numberDATA,
                    'born' => $request->bornDATA,
                    'locate' => $request->locateDATA,
                    'saldo' => $request->saldoDATA,
                    'description' => $request->descriptionDATA,
                    'updated_at' => Carbon::now(),
                ]);        
   
        return response()->json(['success'=>'User saved successfully.']);
    }
    public function topDashboardAPI(){
        return array(
            'data' => array(
                'my_products' => Production::where('user_id', Auth()->user()->id)->count('count'),
                'all_users' => DB::table('users')->count('count'),
                'my_orders' => DB::table('purchases')->where('user_id', Auth()->user()->id)->count(),
                'my_purchases' => DB::table('purchases')->where('user_id', Auth()->user()->id)->sum('totals'),
            )
        );
    }

}
