<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Production;
use App\Models\Category;
use App;
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
}
