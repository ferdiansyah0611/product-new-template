<?php

namespace App\Http\Controllers;
//Helping
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
//Models
use App\Models\Category;
use App\Models\Production;
use App\Models\Messages;
use App\Models\Profile;
use App\Models\Notification;
use App\Models\Like;
use App\Models\Saldo;
use App\Models\Purchase;
use App\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(User $user)
    {
        $profile_user = Profile::where('user_id', Auth()->user()->id)->get();
        $title = 'Dashboard';
        $category = Category::latest()->get();
        $notification_products = Notification::where('user_id', Auth()->user()->id)->orderBy('id', 'DESC')->paginate(10);
        $likers = Like::where('user_id', Auth()->user()->id)->pluck('like')->count();
        $count_users = User::all()->pluck('count')->count();
        $latest_product = Production::where('user_id', Auth()->user()->id)->latest()->paginate(5);
        $purchase = Purchase::where('user_id', Auth()->user()->id)->paginate(15);
        $usersdata = DB::table('users')->orderBy('created_at', 'ASC')->paginate('8');
        return view('home.dashboard.index', compact('title', 'category', 'notification_products', 'user', 'profile_user', 'likers', 'count_users'), ['latest' => $latest_product, 'pu' => $purchase, 'users' => $usersdata]);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show()
    {
        //
    }
    public function edit()
    {
        //
    }
    public function update(Request $request)
    {
        //
    }
    public function destroy()
    {
        //
    }
    public function new_category(Request $request){
        if($request->has('create_category')){
        DB::table('categories')->insert([
            'name' => $request->create_category,
            'display' => $request->display,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('dashboard.index')->with('success', 'Add category successfully');
        }
    }
    public function update_category(Request $request, Category $category){
            Category::where('id', $category->id)->update([
                'name' => $request->update_category,
                'updated_at' => Carbon::now(),
            ]);
            Production::where('category_products', $category->name)->update([
                'category_products' => $request->update_category,
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->route('dashboard.index')->with('success', 'Update category successfully');
            
    }
    static function delete_category(Category $category){
        $category->delete();
        return redirect()->back()->with('success', 'Delete category successfully');
    }
    static function edit_category(Category $category){
        $title = 'Category';
        $profile_user = Profile::where('user_id', Auth()->user()->id)->get();
        return view('home.dashboard.edit_category', compact('category', 'title', 'profile_user'));
    }
    public function manage_users(){
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
    public function search_user(Request $request){
        $search = $request->search;
        $data_user = User::where('name','like',"%".$search."%")->paginate(25);
        $title = 'Search for '.$request->search;
        return view('home.dashboard.search_users', compact('title', 'search'), ['for' => $data_user]);
    }
    public function manage_database(){
        $user_usage = Production::latest()->get();
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
    public function privacy(){
        $title = 'Privacy & Policy Of My Production';
        return view('about.privacy_policy', compact('title'));
    }
    public function community(){
        $title = 'Community Of My Production';
        return view('about.community', compact('title'));
    }
    public function disclaimer(){
        $title = 'Disclaimer Of My Production';
        return view('about.disclaimer', compact('title'));
    }
    public function programming(){
        $title = 'Programming Of My Production';
        return view('about.programming', compact('title'));
    }
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
}
