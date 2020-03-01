<?php

namespace App\Http\Controllers\Admin;

//helping
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App;
//vendor
use Yajra\Datatables\Datatables;
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

class ApiController extends Controller
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
        $this->middleware('Pemilik');
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
    //search
    public function SearchData(Request $request)
    {
        App::setLocale(Auth()->user()->languange);
        $search = $request->search;
        $products = DB::table('productions')->where('name_products','like',"%".$search."%")->paginate();
        $title = 'Search for'.$request->search;
        return respone()->json($products);
    }
    //dashboard
    public function TopDashboard()
    {
        return array(
            'data' => array(
                'my_products' => Production::where('user_id', Auth()->user()->id)->count('count'),
                'all_users' => DB::table('users')->count('count'),
                'my_orders' => DB::table('purchases')->where('user_id', Auth()->user()->id)->count(),
                'my_purchases' => DB::table('purchases')->where('user_id', Auth()->user()->id)->sum('totals'),
            )
        );
    }
    //product
    public function productManage()
    {
        return Datatables::of(Production::query())
        ->addIndexColumn()->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="modal"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"><i class="fas fa-user-edit"></i></a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="fas fa-trash-alt"></i></a>';
                        return $btn;})->rawColumns(['action'])->make(true);
    }
    public function GetProduct($id)
    {
        $production = Production::find($id);
        return response()->json($production);
    }
    public function UpdateProduction(Request $request)
    {
        Production::where('id', $request->DATA)->update([
            'name_products' => $request->nameDATA,
            'price' => $request->priceDATA,
            'discount' => $request->discountDATA,
            'description_products' => $request->descriptionDATA,
            'remaining_products' => $request->remainingDATA,
            'updated_at' => Carbon::now(),
        ]);
        return response()->json(['success' => 'Edit product successfuly']);
    }
    public function DeleteProduct($id)
    {
        Production::where('id',$id)->delete();
        return response()->json(['success'=>'Delete product successfully']);
    }
    //users
    public function usersManage()
    {
        return Datatables::of(User::query())->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" data-toggle="modal"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editUser" data-target="#editUserModal"><i class="fas fa-user-edit"></i></a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser"><i class="fas fa-trash-alt"></i></a>';
                        return $btn;
                    })->rawColumns(['action'])->make(true);
    }
    public function GetUser($id){
        $user = User::find($id);
        return response()->json($user);
    }
    public function UpdateUser(Request $request)
    {
        User::where('id', $request->DATA)->update([
            'name' => $request->nameDATA,
            'email' => $request->emailDATA,
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
    public function DeleteUser($id)
    {
        User::find($id)->delete();
        return response()->json(['success' => 'Successfuly delete data']);
    }
    //category
    public function DataCategory()
    {
        return Datatables::of(Category::query())->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" data-toggle="modal"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editUser" data-target="#editCategoryModal"><i class="fas fa-edit"></i></a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteCategory"><i class="fas fa-trash-alt"></i></a>';
                        return $btn;
                    })->rawColumns(['action'])->make(true);
    }
    public function CreateDataCategory(Request $request)
    {
        DB::table('categories')->insert([
            'id' => $this->random,
            'name' => $request->name,
            'display' => $request->display,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return response()->json(['success', 'Add category successfully']);
    }
    public function UpdateCategory(Request $request, Category $category)
    {
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
    public function DeleteCategory($id)
    {
        Category::where('id', $id)->delete();
        return response()->json(['success' => 'Delete category successfully']);
    }
    //saldo
    public function CreateDataSaldo(Request $request)
    {
        DB::table('saldos')->insert([
            'saldo' => $request->saldo,
            'random' => Str::random(),
            'status' => 'true',
            'expired_at' => $request->expired,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return response()->json(['success'=>'Create number saldo successfully']);
    }
}
