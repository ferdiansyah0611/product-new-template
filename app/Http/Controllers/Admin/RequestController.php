<?php

namespace App\Http\Controllers\Admin;

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
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
use App\Models\Merk;
use App\User;

class RequestController extends Controller
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
    //category request
    public function CreateRequestCategory(Request $request)
    {
        DB::table('categories')->insert([
            'name' => $request->name,
            'display' => $request->display,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return response()->json(['success', 'Add category successfully']);
    }
    public function CreateDataObject(Request $request)
    {
        $now = Carbon::now();
        $sizeArray   = array(
                    'height'    =>  $request->height. $request->type_height,
                    'width'     =>  $request->width. $request->type_width,
                    );
        $dateArray   = array(
                    'day'       =>  Carbon::parse($request->release)->get('day'),
                    'month'     =>  Carbon::parse($request->release)->get('month'),
                    'year'      =>  Carbon::parse($request->release)->get('year'),
                    );
        $size       =   json_encode($sizeArray);
        $date       =   json_encode($dateArray);
        DB::table('objects')->insert([
            'id'            =>  $this->random,
            'category_id'   =>  $request->category,
            'merk'          =>  $request->merk,
            'series'        =>  $request->series,
            'version'       =>  $request->version,
            'size'          =>  $size,
            'date'          =>  $date,
            'created_at'    =>  $now,
            'updated_at'    =>  $now,
        ]);
        return response()->json(['success'=>'successfully']);
    }
    public function CreateDataMerk(Request $request)
    {
        $data = Merk::all();
        foreach($data as $d)
        {
            if($request->merk !== $d->merk)
            {
                DB::table('merks')->insert([
                    'id'            =>  $this->random,
                    'category_id'   =>  $request->category_id,
                    'merk'          =>  $request->merk,
                    'created_at'    =>  Carbon::now(),
                    'updated_at'    =>  Carbon::now(),
                ]);
                return response()->json(['success'=>'successfully']);
                
            }
            else
            {
                return response()->json(['error'=>'have']);
            }
        }
    }
    public function UpdateCategory(Request $request, Category $category)
    {
    	Category::where('id', $category->id)->update([
                'name'          => $request->update_category,
                'display'       => $request->display,
                'updated_at'    => Carbon::now(),
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
    //users request
    public function CreateRequestUser(Request $request){
        DB::table('users')->insert([
            'id'            => rand(1000000000000,10000000000000),
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Hash::make(),
            'role'          => $request->role,
            'saldo'         => $request->saldo,
            'locate'        => $request->locate,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);
        return response()->json(['success' => 'successfully']);
    }
    public function UpdateUsers(Request $request, User $user)
    {
        $this->validate($request, [
            'name'          => 'required',
            'email'         => 'required',
            'status'        => 'required',
            'role'          => 'required',
            'last_study'    => 'required',
            'identity_card' => 'string',
            'debit_card'    => 'string',
            'number'        => 'required',
            'born'          => 'required',
            'description'   => 'required',
            'locate'        => 'required',
        ]);
        DB::table('users')->where('id', $user->id)->update([
            'name'          => $request->name,
            'email'         => $request->email,
            'status'        => $request->status,
            'last_study'    => $request->last_study,
            'role'          => $request->role,
            'identity_card' => $request->identity_card,
            'debit_card'    => $request->debit_card,
            'number'        => $request->number,
            'born'          => $request->born,
            'description'   => $request->description,
            'locate'        => $request->locate,
            'updated_at'    => Carbon::now(),
        ]);
        return redirect()->route('production.index')->with('success', 'Your has been update users');
    }
    //saldo request
    public function CreateRequestSaldo(Request $request)
    {
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
    //newseed request
    public function CreateRequestNewseed(Request $request)
    {
        DB::connection('mysql2')->table('newseed')->insert([
            'id' => rand(1000000000, 10000000000),
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
    public function NewseedDelete(Request $request)
    {
        DB::connection('mysql2')->table('newseed')->where('title', $request->titleNewseed)->delete();
        return redirect()->back();
    }
    //product request
    /*public function CreateDataProduct(Request $request, Production $production)
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
            return redirect()->route('index')->with('success', 'Added Products successfuly');
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
            return redirect()->route('index')->with('success', 'Added Products successfuly');
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
            return redirect()->route('index')->with('success', 'Added Products successfuly');
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
            return redirect()->route('index')->with('success', 'Added Products successfuly');
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
            return redirect()->route('index')->with('success', 'Added Products successfuly');
        }//end if
    }*/
    public function CreateDataProduct(Request $request)
    {
        $array_image = array(
            'image_1'=>$request->img1,
            'image_2'=>$request->img2,
            'image_3'=>$request->img3,
            'image_4'=>$request->img4,
            'image_5'=>$request->img5,
            'image_6'=>$request->img6,
            'image_7'=>$request->img7,
            'image_8'=>$request->img8,
            'image_9'=>$request->img9,
            'image_10'=>$request->img10,
        );
        $json_image = json_encode($array_image);
        DB::table('productions')->insert([
            'id'=>$this->random,
            'user_id'=>Auth()->user()->id,
            'title'=>Str::slug($request->product_name),
            'name_products'=>$request->product_name,
            'price'=>$request->price,
            'description_products'=>$request->description_products,
            'main_pictures'=>$json_image,
            'profits'=>$request->profits,
            'discount'=>$request->discount,
            'conditions'=>$request->conditions,
            'status'=>$request->status,
            'remaining_products'=>$request->remaining_products,
            'category_products'=>$request->category_products,
            'month' => Carbon::now()->get('month'),
            'year' => Carbon::now()->get('year'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        return response()->json(['success'=>'success']);
    }
}