<?php

namespace App\Http\Controllers;
//Helping
use App;
use File;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Url;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
//vendor
use Yajra\Datatables\Datatables;
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

class ProductionController extends Controller
{
    public $random;
    public $directory_image;
    public function __construct()
    {
        $this->middleware('auth');
        $this->random = rand(1000000,10000000);
        $this->directory_image = storage_path('app/public/image');
    }
    public function index()
    {
        App::setLocale(Auth()->user()->languange);
        $title = 'All Products';
        $product = Production::latest()->where('status', 'public')->orderBy('updated_at', 'DESC')->paginate(48);
        $category = Category::where('display', 'show')->orderBy('name', 'ASC')->get();
        $newseed = DB::connection('mysql2')->table('newseed')->paginate(8);
        return view('home.production.index', compact('product', 'title', 'category'), ['datanewseed' => $newseed]);
    }
    public function create()
    {
        App::setLocale(Auth()->user()->languange);
        $title = 'Create Products';
        $category = Category::latest()->orderBy('name', 'DESC')->get();
        return view('home.production.create', compact('title', 'category'));
    }
    public function store(Request $request, Production $production)
    {
        $this->validate($request, [
                'user_id' => 'string',
                'price' => 'string',
                'description_products' => 'string',
                'remaining_products' => 'string',
                'mainimg' => 'file|mimes:jpg,png,jpeg|max:4000',
                'img2' => 'file|mimes:jpg,png,jpeg|max:4000',
                'img3' => 'file|mimes:jpg,png,jpeg|max:4000',
                'img4' => 'file|mimes:jpg,png,jpeg|max:4000',
                'img5' => 'file|mimes:jpg,png,jpeg|max:4000',
                'category_products' => 'string',
                'profits' => 'required',
                'status' => 'string',
            ]);
        if ($request->has('img_for_one')) {
            $file = $request->file('mainimg');
            $namefile = "/db/img/"."img1_".$file->getClientOriginalName();
            $toupload = 'db/img/';
            $file->move($toupload,$namefile);
            DB::table('productions')->insert([
                'id' => $this->random,
                'user_id' => $request->user_id,
                'title' => Str::slug($request->img_for_one),
                'name_products' => base64_encode($request->img_for_one),
                'price' => $request->price,
                'description_products' => Crypt::encrypt($request->description_products),
                'remaining_products' => $request->remaining_products,
                'main_pictures' => $namefile,
                'category_products' => $request->category_products,
                'status' => $request->status,
                'profits' => $request->profits,
                'discount' => $request->discount,
                'conditions' => $request->conditions,
                'month' => Carbon::now()->get('month'),
                'year' => Carbon::now()->get('year'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('notifications')->insert([
                'user_id' => Auth()->user()->id,
                'name' => Auth()->user()->name,
                'to' => 'production',
                'email_to' => Auth()->user()->email,
                'status' => '0',
                'notification' => 'Your has been create products',
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('productions.index')->with('success', 'Added Products successfuly');
        }//end if
        if ($request->has('img_for_two')) {
            $file = $request->file('mainimg');
            $namefile = "/db/img/".$file->getClientOriginalName();
            $toupload = 'db/img/';
            $file->move($toupload,$namefile);
            $file_2 = $request->file('img2');
            $namefile_2 = "/db/img/".$file_2->getClientOriginalName();
            $file_2->move($toupload,$namefile_2);
            DB::table('productions')->insert([
                'id' => $this->random,
                'user_id' => $request->user_id,
                'title' => Str::slug($request->img_for_two),
                'name_products' => base64_encode($request->img_for_two),
                'price' => $request->price,
                'description_products' => Crypt::encrypt($request->description_products),
                'remaining_products' => $request->remaining_products,
                'main_pictures' => $namefile,
                'second_pictures' => $namefile_2,
                'category_products' => $request->category_products,
                'status' => $request->status,
                'profits' => $request->profits,
                'discount' => $request->discount,
                'conditions' => $request->conditions,
                'month' => Carbon::now()->get('month'),
                'year' => Carbon::now()->get('year'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('notifications')->insert([
                'user_id' => Auth()->user()->id,
                'name' => Auth()->user()->name,
                'email_to' => Auth()->user()->email,
                'status' => '0',
                'to' => 'production',
                'notification' => 'Your has been create products',
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('productions.index')->with('success', 'Added Products successfuly');
        }//end if
        if($request->has('img_for_three')) {
            
            $file = $request->file('mainimg');
            $namefile = "/db/img/".$file->getClientOriginalName();
            $toupload = 'db/img/';
            $file->move($toupload,$namefile);
            $file_2 = $request->file('img2');
            $namefile_2 = "/db/img/".$file_2->getClientOriginalName();
            $file_2->move($toupload,$namefile_2);
            $file_3 = $request->file('img3');
            $namefile_3 = "/db/img/".$file_3->getClientOriginalName();
            $file_3->move($toupload,$namefile_3);

            DB::table('productions')->insert([
                'id' => $this->random,
                'user_id' => $request->user_id,
                'title' => Str::slug($request->img_for_three),
                'name_products' => base64_encode($request->img_for_three),
                'price' => $request->price,
                'description_products' => Crypt::encrypt($request->description_products),
                'remaining_products' => $request->remaining_products,
                'main_pictures' => $namefile,
                'second_pictures' => $namefile_2,
                'three_pictures' => $namefile_3,
                'category_products' => $request->category_products,
                'status' => $request->status,
                'profits' => $request->profits,
                'discount' => $request->discount,
                'conditions' => $request->conditions,
                'month' => Carbon::now()->get('month'),
                'year' => Carbon::now()->get('year'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('notifications')->insert([
                'user_id' => Auth()->user()->id,
                'name' => Auth()->user()->name,
                'email_to' => Auth()->user()->email,
                'status' => '0',
                'to' => 'production',
                'notification' => 'Your has been create products',
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('productions.index')->with('success', 'Added Products successfuly');
        }//end if
        if($request->has('img_for_fourth')) {
            
            $file = $request->file('mainimg');
            $namefile = "/db/img/".$file->getClientOriginalName();
            $toupload = 'db/img/';
            $file->move($toupload,$namefile);
            $file_2 = $request->file('img2');
            $namefile_2 = "/db/img/".$file_2->getClientOriginalName();
            $file_2->move($toupload,$namefile_2);
            $file_3 = $request->file('img3');
            $namefile_3 = "/db/img/".$file_3->getClientOriginalName();
            $file_3->move($toupload,$namefile_3);
            $file_4 = $request->file('img4');
            $namefile_4 = "/db/img/".$file_4->getClientOriginalName();
            $file_4->move($toupload,$namefile_4);

            DB::table('productions')->insert([
                'id' => $this->random,
                'user_id' => $request->user_id,
                'title' => Str::slug($request->img_for_fourth),
                'name_products' => base64_encode($request->img_for_fourth),
                'price' => $request->price,
                'description_products' => Crypt::encrypt($request->description_products),
                'remaining_products' => $request->remaining_products,
                'main_pictures' => $namefile,
                'second_pictures' => $namefile_2,
                'three_pictures' => $namefile_3,
                'fourth_pictures' => $namefile_4,
                'category_products' => $request->category_products,
                'status' => $request->status,
                'profits' => $request->profits,
                'discount' => $request->discount,
                'conditions' => $request->conditions,
                'month' => Carbon::now()->get('month'),
                'year' => Carbon::now()->get('year'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('notifications')->insert([
                'user_id' => Auth()->user()->id,
                'name' => Auth()->user()->name,
                'email_to' => Auth()->user()->email,
                'status' => '0',
                'to' => 'production',
                'notification' => 'Your has been create products',
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('productions.index')->with('success', 'Added Products successfuly');
        }//end if
        if($request->has('img_for_five')) {
            
            $file = $request->file('mainimg');
            $namefile = "/db/img/".$file->getClientOriginalName();
            $toupload = 'db/img/';
            $file->move($toupload,$namefile);
            $file_2 = $request->file('img2');
            $namefile_2 = "/db/img/".$file_2->getClientOriginalName();
            $file_2->move($toupload,$namefile_2);
            $file_3 = $request->file('img3');
            $namefile_3 = "/db/img/".$file_3->getClientOriginalName();
            $file_3->move($toupload,$namefile_3);
            $file_4 = $request->file('img4');
            $namefile_4 = "/db/img/".$file_4->getClientOriginalName();
            $file_4->move($toupload,$namefile_4);
            $file_5 = $request->file('img5');
            $namefile_5 = "/db/img/".$file_5->getClientOriginalName();
            $file_5->move($toupload,$namefile_5);

            DB::table('productions')->insert([
                'id' => $this->random,
                'user_id' => $request->user_id,
                'title' => Str::slug($request->img_for_five),
                'name_products' => base64_encode($request->img_for_five),
                'price' => $request->price,
                'description_products' => Crypt::encrypt($request->description_products),
                'remaining_products' => $request->remaining_products,
                'main_pictures' => $namefile,
                'second_pictures' => $namefile_2,
                'three_pictures' => $namefile_3,
                'fourth_pictures' => $namefile_4,
                'five_pictures' => $namefile_5,
                'category_products' => $request->category_products,
                'status' => $request->status,
                'profits' => $request->profits,
                'discount' => $request->discount,
                'conditions' => $request->conditions,
                'month' => Carbon::now()->get('month'),
                'year' => Carbon::now()->get('year'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('notifications')->insert([
                'user_id' => Auth()->user()->id,
                'name' => Auth()->user()->name,
                'email_to' => Auth()->user()->email,
                'status' => '0',
                'to' => 'production',
                'notification' => 'Your has been create products',
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('productions.index')->with('success', 'Added Products successfuly');
        }//end if
    }
    public function show(Production $production)
    {
        App::setLocale(Auth()->user()->languange);
        $title = base64_decode($production->name_products);
        return view('home.production.show', compact('title', 'production'));
    }
    public function show2($slug)
    {
        App::setLocale(Auth()->user()->languange);
        $title = 'helo';
        $show = Production::where('title', $slug)->first();
        return view('home.production.show', compact('title', 'show'));
    }
    public function showRef(Production $production)
    {
        App::setLocale(Auth()->user()->languange);
        $title = base64_decode($production->name_products);
        return view('home.production.component.showRef', compact('title', 'production'));
    }
    public function edit(Production $production)
    {
        App::setLocale(Auth()->user()->languange);
        $title = 'Edit production';
        return view('home.production.edit', compact('production', 'title'));
    }
    public function update(Request $request, Production $production)
    {
        DB::table('productions')->where('id', $production->id)->update([
            'name_products' => base64_encode($request->update_name),
            'price' => $request->update_price,
            'description_products' => Crypt::encrypt($request->update_description),
            'remaining_products' => $request->update_remaining,
            'category_products' => $request->update_category,
            'updated_at' => Carbon::now(),
        ]);
        DB::table('notifications')->insert([
            'user_id' => Auth()->user()->id,
            'name' => Auth()->user()->name,
            'notification' => strtolower(Auth()->user()->name).', has been update products',
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('productions.manage')->with('success', 'Update successfuly');
    }
    public function destroy(Production $production)
    {
        Purchase::where('production_id', $production->id)->delete();
        $image = Production::where('id',$production->id)->first();
        File::delete(public_path().$image->main_pictures);
        File::delete(public_path().$image->second_pictures);
        File::delete(public_path().$image->three_pictures);
        File::delete(public_path().$image->fourth_pictures);
        File::delete(public_path().$image->five_pictures);
        $production->delete();
        return redirect()->back()->with('success','Success delete products');
    }
    public function draft()
    {
        App::setLocale(Auth()->user()->languange);
        $title = 'Draft Products';
        $mydraft = Production::where('user_id', auth()->user()->id)->where('status', 'draft')->get();
        return view('/home/production/draft', compact('title', 'mydraft'));
    }
    public function manage(){
        App::setLocale(Auth()->user()->languange);
        $title = 'Manage My Products';
        $product = Production::latest()->where('user_id', auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate(25);
        $category = Category::latest()->orderBy('name', 'DESC')->get();
        return view('home.production.manage', compact('product', 'title', 'category'));
    }
    public function manageProductionAPI(){
        return Datatables::of(DB::table('productions')->where('user_id', Auth()->user()->id))->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="modal"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"><i class="fas fa-user-edit"></i></a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="fas fa-trash-alt"></i></a>';
                        return $btn;
                    })->rawColumns(['action'])->make(true);
    }
    public function dataProductionAPI($id){
        $production = Production::find($id);
        return response()->json($production);
    }
    public function updateProductionAPI(Request $request){
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
    public function deleteProductionAPI($id){
        Production::find($id)->delete();
        return response()->json(['success' => 'Delete product successfuly']);
    }


    public function search(Request $request){
        App::setLocale(Auth()->user()->languange);
        $search = base64_encode($request->search);
        $products = DB::table('productions')->where('name_products','like',"%".$search."%")->paginate();
        $title = 'Search for'.$request->search;
        return view('home.production.search', compact('products', 'title', 'search'));
    }
    public function search_manage(Request $request){
        App::setLocale(Auth()->user()->languange);
        $search = base64_encode($request->search);
        $products = DB::table('productions')->where('user_id', auth()->user()->id)->where('name_products','like',"%".$search."%")->paginate();
        $title = 'search';
        return view('home.production.search', compact('products', 'title', 'search'));
    }
    public function save_question(Request $request){
        $this->validate($request,[
            'img' => 'file|image|max:5000',
        ]);
        if($request->file('img')){
            $file = $request->file('img');
            $namefile = "/db/img/".$file->getClientOriginalName();
            $toupload = 'db/img/';
            $file->move($toupload,$namefile);
        DB::table('questions')->insert([
            'id' => $this->random,
            'user_id' => $request->user_id,
            'production_id' => $request->production_id,
            'name' => $request->name,
            'comment' => $request->comment,
            'star' => $request->star,
            'img' => $namefile,
            'count' => $request->count,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        }else{
        DB::table('questions')->insert([
            'id' => $this->random,
            'user_id' => $request->user_id,
            'production_id' => $request->production_id,
            'name' => $request->name,
            'comment' => $request->comment,
            'star' => $request->star,
            'count' => $request->count,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        }
        
        DB::table('notifications')->insert([
            'user_id' => Auth()->user()->id,
            'name' => Auth()->user()->name,
            'notification' => strtolower(Auth()->user()->name).', has been comment your products',
            'link' => $request->production_id,
            'to' => 'question',
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success', 'Create comment successfuly');
    }
    public function like_question(Request $request){
        $data = Question::where('id', $request->question)->get();
        $like = LikeQuestion::where('question_id', $request->question)->get();
        foreach($like as $comment){
            if($comment->user_id == Auth()->user()->id){
                DB::table('like_questions')->where('question_id', $request->question)->where('user_id', Auth()->user()->id)->delete();
                DB::table('questions')->where('id', $request->question)->update([
                    'likes' => $comment->likes - "1",
                ]);
                return redirect()->back()->with('success', 'Sorry you previously liked the comment');
            }
            else{DB::table('questions')->where('id',$request->question)->update([
                'likes' => $comment->likes + "1",
                'updated_at' => Carbon::now(),
            ]);}
        }
        DB::table('like_questions')->insert([
            'id' => rand(1000000000, 10000000000),
            'question_id' => $request->question,
            'user_id' => Auth()->user()->id,
            'like' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        return redirect()->back();
    }
    public function filtering_question(Request $request, Production $production){
        App::setLocale(Auth()->user()->languange);
        $title = 'data';
        $filter = $request->productsid;
        $db = DB::table('questions')->where('production_id', $request->productsid)->where('star', $request->star)->get();
        return view('home.production.show', compact('production', 'title'), ['data' => $db]);
    }
    public function delete_question(Production $production, Question $question){
        App::setLocale(Auth()->user()->languange);
        $image = Question::where('id',$question->id)->first();
        File::delete(public_path().$image->img);
        $question->delete();
        DB::table('notifications')->insert([
            'user_id' => Auth()->user()->id,
            'name' => Auth()->user()->name,
            'notification' => 'Your has been delete comments for id '.$question->id,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success', 'Delete comment successfuly');
    }
    public function category(Request $request){
        App::setLocale(Auth()->user()->languange);
       
        $search = $request->category;
        $title = 'Category '.$search;
        $products_category = DB::table('productions')->where('category_products','like',"%".$search."%")->paginate(12);
        return view('home.production.category', compact('title', 'search'), ['category' => $products_category]);
    }
    public function buy(Request $request, Production $production){
        if($request->has('buy')){
            $purchases = $this->random;
            $total = $request->price * $request->remaining;
            $stock = $request->stock;
            $remain = $request->stock - $request->remaining;
            $count =  Auth()->user()->saldo - $total;
            $me = (2/100)*$total;
            $product = DB::table('productions')->where('id', $production->id)->get();
            if(Auth()->user()->saldo < $count){
                return back();
            }
            if(Auth()->user()->saldo > $count){
                foreach($product as $prod){
                $id_purchases = $this->random;
                DB::table('purchases')->insert([
                'id' => $id_purchases,
                'production_id' => $request->buy_products,
                'purchase_id' => $purchases,
                'user_id' => Auth()->user()->id,
                'price' => $request->price,
                'sum_purchase' => $request->remaining,
                'totals' => $total,
                'profits' => $prod->profits * $request->remaining,
                'me' => $me,
                'status' => 'Pending',
                'locate' => Auth()->user()->locate,
                'month' => Carbon::now()->get('month'),
                'year' => Carbon::now()->get('year'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]);
                }
                DB::table('notifications')->insert([
                'user_id' => Auth()->user()->id,
                'name' => Auth()->user()->name,
                'email_to' => Auth()->user()->email,
                'status' => '0',
                'to' => 'purchases',
                'notification' => 'Your has been buy products with id purchases '.$id_purchases,
                'created_at' => Carbon::now(),
            ]);
                
            
            foreach($product as $pro){
                DB::table('productions')->where('id', $production->id)->update([
                    'remaining_products' => $remain,
                    'sold_out' => $pro->sold_out + $request->remaining,
                ]);
                
            }
            User::where('id', Auth()->user()->id)->update([
                'saldo' => $count,
            ]);
               return redirect()->back()->with('success', 'Your has been buy products with ID Purchase '.$purchases);
            }
        }
            if($request->has('added')){
                DB::table('carts')->insert([
                    'id' => $this->random,
                    'user_id' => Auth()->user()->id,
                    'production_id' => base64_encode($request->add),
                    'amount' => $request->remaining,
                    'totals' => $request->remaining * $request->prices,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                return redirect()->back()->with('success', 'Your has been add cart');
            }
            if($request->has('delete_cart')){
                Cart::where('id', $request->delete_cart)->delete();
                return redirect()->back()->with('success', 'Your has been delete cart');
            }
            
        }
        public function isi_saldo(Request $request){
        $random = DB::table('saldos')->where('random', $request->number)->get();
        foreach($random as $rand){
            if($rand->status == 'true'){
                $message = 'Thanks you want top up balance in my production. Totals your top up is Rp. ';
                $amount = base64_encode($rand->saldo);
                $subjects = 'Top up balance';
                DB::table('users')->where('id', Auth()->user()->id)->update([
                'saldo' => Auth()->user()->saldo + $rand->saldo,
                ]);
                DB::table('saldos')->where('id', $rand->id)->update([
                'status' => 'false',
                ]);
                DB::table('messages')->insert([
                    'id' => $this->random,
                    'user_id' => Auth()->user()->id,
                    'from' => 'Customer Services',
                    'to' => Auth()->user()->email,
                    'subjects' => base64_encode($subjects),
                    'messages' => base64_encode($message). $amount,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                    return redirect()->back()->with('success', 'Thanks for your top up');
                }
            if($rand->status == 'false'){
                    return back()->with('success', 'Sorry your code has been used');
                }
            }
            
        }
        public function topup(){
            App::setLocale(Auth()->user()->languange);
            $title = 'topp';
            return view('home.purchase.topup', compact('title'));
        }
        public function view_cart(){
            App::setLocale(Auth()->user()->languange);
            $title = 'Cart';
            $cart = Cart::where('user_id', Auth()->user()->id)->get();
            return view('home.production.cart', compact('title'), ['data' => $cart]);
        }
        public function view_request_products(){
            App::setLocale(Auth()->user()->languange);
            $title = 'title';
            $production = Production::all();
            $data_product_user = Production::where('user_id', Auth()->user()->id)->get();
            return view('home.production.request', compact('title', 'production'), ['product_user' => $data_product_user]);
        }
        public function cardPay(Request $request){
            $title = 'title';
            $showPay = DB::table('productions')->where('id', $request->buy_products)->get();
            return view('home.production.cartPayment', compact('title', 'showPay'));
        }

/*------------------------------------------------------------*/
/*------------------------------------------------------------*/
/*----------------------FOR SINGLE PAGES----------------------*/
/*------------------------------------------------------------*/ 
/*------------------------------------------------------------*/

    public function allPagesSPA(){
        App::setLocale(Auth()->user()->languange);
        $title = 'All Products';
        $product = Production::latest()->where('status', 'public')->orderBy('updated_at', 'DESC')->paginate(16);
        $category = Category::where('display', 'show')->orderBy('name', 'ASC')->get();
        return view('home.production.spa.allPages', compact('product', 'title', 'category'));
    }
}
/*List Function
index
create
store
show
edit
update
destroy
draft
manage
search
search_manage
save_question
delete_question
category
buy
isi_saldo
topup
*/