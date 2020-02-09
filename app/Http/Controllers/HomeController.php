<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $product = Production::latest()->where('status', 'public')->orderBy('updated_at', 'DESC')->paginate(16);
        $category = Category::where('display', 'show')->orderBy('name', 'ASC')->get();
        return view('home.production.index', compact('product', 'title', 'category'));
    }
    public function spa(){
        return view('layouts.spa');
    }
    public function templates(){
        return view('content');
    }


    public function searching(Request $request){
        App::setLocale(Auth()->user()->languange);
        $search = $request->search;
        $title = 'Searching';
        $userData = User::where('name','like',"%".$search."%")->paginate(20);
        $productData = Production::where('title','like',"%".$search."%")->paginate(20);
        return view('layouts.component.searchData', compact('title', 'userData', 'productData'));
    }
}
