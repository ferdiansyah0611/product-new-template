<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Db;
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

class HomeController extends Controller
{
    public function index()
    {
        //App::setLocale(Auth()->user()->languange);
        $title = 'All Products';
        $product = Production::latest()->where('status', 'public')->orderBy('updated_at', 'DESC')->paginate(48);
        $category = Category::where('display', 'show')->orderBy('name', 'ASC')->get();
        $newseed = DB::connection('mysql2')->table('newseed')->paginate(8);
        return view('home.production.index', compact('product', 'title', 'category'), ['datanewseed' => $newseed]);
    }
    public function spa(){
        return view('layouts.spa');
    }
    public function templates(){
        return view('content');
    }


    public function searching(Request $request){
        App::setLocale('en');
        $search = $request->search;
        $title = 'Searching';
        $userData = User::where('name','like',"%".$search."%")->get();
        $productData = Production::where('title','like',"%".$search."%")->paginate(20);
        return response()->json($productData);
    }
    public function searchuser(Request $request){
        App::setLocale('en');
        $search = $request->search;
        $userData = User::where('name','like',"%".$search."%")->paginate(20);
        return response()->json($userData);
    }
    public function searchproduct(Request $request){
        App::setLocale('en');
        $search = $request->search;
        $productData = Production::where('title','like',"%".$search."%")->orWhere('category_products','like',"%".$search."%")->orWhere('price','like',"%".$search."%")->paginate(20);
        return response()->json($productData);
    }
}
