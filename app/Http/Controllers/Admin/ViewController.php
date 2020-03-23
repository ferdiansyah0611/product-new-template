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

class ViewController extends Controller
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
		$this->middleware(['Pemilik','auth']);
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
    //management
    public function UsersManagement()
    {App::setLocale(Auth()->user()->languange);
    	$title = 'Manage';$get_users = User::latest()->paginate(25);
        return view('home.dashboard.manage_users', compact('title'),['for' => $get_users]);
    }
    public function ProductManagement()
    {App::setLocale(Auth()->user()->languange);
        $title = 'Manage My Products';
        return view('home.production.manage', compact('title'));
    }
    public function DatabaseManagement()
    {App::setLocale(Auth()->user()->languange);
        $user_usage = Production::latest()->paginate(25);
        $title = 'manage';
        return view('home.dashboard.manage_database', compact('title'), ['qwerty' => $user_usage]);
    }
    //dashboard
    public function DashboardIndex(User $user)
    {
        App::setLocale(Auth()->user()->languange);
        $title = 'Dashboard';
        $notification_products = Notification::where('user_id', $this->auth_id)->orderBy('id', 'DESC')->paginate(10);
        $likers = Like::where('user_id', $this->auth_id)->pluck('like')->count();
        $purchase = Purchase::where('user_id', $this->auth_id)->paginate(10);
        $usersdata = DB::table('users')->orderBy('created_at', 'DESC')->paginate('9');
        return view('home.dashboard.index', compact('title', 'notification_products', 'user', 'likers'), ['pu' => $purchase, 'users' => $usersdata]);
    }
    //product
    public function createProduct()
    {
        App::setLocale(Auth()->user()->languange);
        $title = 'Create Products';
        $category = Category::latest()->orderBy('name', 'DESC')->get();
        return view('home.production.create', compact('title', 'category'));
    }
    public function RequestProducts()
    {
            App::setLocale(Auth()->user()->languange);
            $title = 'title';
            $production = Production::all();
            $data_product_user = Production::where('user_id', Auth()->user()->id)->get();
            return view('home.production.request', compact('title', 'production'), ['product_user' => $data_product_user]);
    }
    //cart
    public function CartIndex()
    {
        App::setLocale(Auth()->user()->languange);
        $title = 'Cart';
        $cart = Cart::where('user_id', Auth()->user()->id)->get();
        return view('home.production.cart', compact('title'), ['data' => $cart]);
    }
    //newseed
    public function CreateNewseed()
    {
        $title = 'Create newseed';
        $getData = DB::connection('mysql2')->table('newseed')->paginate(50);
        return view('home.newseed.create', compact('title', 'getData'));
    }
    //object
    public function CreateObject()
    {
        $title = 'Objects';
        return view('home.objects.create', compact('title'));
    }
}
