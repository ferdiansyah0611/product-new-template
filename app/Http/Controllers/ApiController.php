<?php

namespace App\Http\Controllers;
use App\User;
use App\Models\Production;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ApiController extends Controller
{
    public function test(){
        return [
            'members' => array(
                'one_month' => array(
                        'facilities' => array(
                            'one' => 'Dashboard pages comprehensive',
                            'two' => 'Get clients up to 50',
                            'three' => 'File storage up to 1GB',
                            'fourth' => 'Get Restful API tokens',
                            'five' => 'Custom design pages',
                            'six' => 'Saving quota usage by using a single page application',
                            'seven' => 'Get saldo total up to Rp. 40.000,00',
                        ),//facilities
                        'benefits' => array(
                            'one' => 'We guarantee your online business will be 100% successful',
                            'two' => 'We have very sophisticated security so your data will be safe from cybercrime',
                        ),//benefits
                        'price' => 'Rp. 60.000,00',
                    ),//onemonth
                'two_month' => array(
                        'facilities' => array(
                            'one' => 'Dashboard pages comprehensive',
                            'two' => 'Get clients up to 100',
                            'three' => 'File storage up to 2GB',
                            'fourth' => 'Get Restful API tokens',
                            'five' => 'Custom design pages',
                            'six' => 'Saving quota usage by using a single page application',
                            'seven' => 'Get saldo total up to Rp. 70.000,00',
                        ),//facilities
                        'benefits' => array(
                            'one' => 'We guarantee your online business will be 100% successful',
                            'two' => 'We have very sophisticated security so your data will be safe from cybercrime',
                        ),//benefits
                        'price' => 'Rp. 110.000,00',
                    ),//onemonth
                'six_month' => array(
                        'facilities' => array(
                            'one' => 'Dashboard pages comprehensive',
                            'two' => 'Get clients up to 10000',
                            'three' => 'File storage up to 10GB',
                            'fourth' => 'Get Restful API tokens',
                            'five' => 'Custom design pages',
                            'six' => 'Saving quota usage by using a single page application',
                            'seven' => 'Get saldo total up to Rp. 149.000,00',
                        ),//facilities
                        'benefits' => array(
                            'one' => 'We guarantee your online business will be 100% successful',
                            'two' => 'We have very sophisticated security so your data will be safe from cybercrime',
                        ),//benefits
                        'price' => 'Rp. 250.000,00',
                    ),//onemonth
                'twelve_month' => array(
                        'facilities' => array(
                            'one' => 'Dashboard pages comprehensive',
                            'two' => 'Get clients unlimited',
                            'three' => 'File storage up to 50GB',
                            'fourth' => 'Get Restful API tokens',
                            'five' => 'Custom design pages',
                            'six' => 'Saving quota usage by using a single page application',
                            'seven' => 'Get saldo total up to Rp. 220.000,00',
                        ),//facilities
                        'benefits' => array(
                            'one' => 'We guarantee your online business will be 100% successful',
                            'two' => 'We have very sophisticated security so your data will be safe from cybercrime',
                        ),//benefits
                        'price' => 'Rp. 449.000,00',
                    ),//onemonth
                ),
        ];
    }
    public function seednew(){
        //fist page "http://slogqueue.xyz/api/newseed?page=1"
        //last page "http://slogqueue.xyz/api/newseed?page=1"
        return DB::connection('mysql2')->table('newseed')->paginate(50);
        /*foreach($data as $d){
            return [
                'data' => array(
                    'id' => $d->id,
                    'title' => $d->title,
                    'content' => $d->content,
                    'created' => $d->created_at,
                    'updated' => $d->updated_at,
                )
            ];
        }*/
    }
    public function seednewid($id){
        $data = DB::connection('mysql2')->table('newseed')->where('id', $id)->get();
        foreach($data as $d){
            return [
                'data' => array(
                    'id' => $d->id,
                    'title' => $d->title,
                    'content' => $d->content,
                    'created' => $d->created_at,
                    'updated' => $d->updated_at,
                )
            ];
        }
    }
    public function seednewTitle($title){
        return DB::connection('mysql2')->table('newseed')->where('title', $title)->get();
    }
    public function seednewUpload(Request $request){
        DB::connection('mysql2')->table('newseed')->insert([
            'id' => rand(1000000000, 10000000000),
            'title' => $request->title,
            'content' => $request->content,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return response()->json('success', 'You success upload newseed');
    }
    public function index(){
    	$product = Production::latest()->where('status', 'public')->orderBy('updated_at', 'DESC')->paginate(2);
        $category = Category::latest()->orderBy('name', 'ASC')->paginate(2);
        return $category;
    }
    public function template(){
    	$title = 'gsvs';
    	return view('layouts.template', compact('title'));
    }
    public function production(){
        $chart = DB::table('productions')->paginate('20');
        return response()->json($chart);
    }
    public function categoryAPI(){
        return DB::table('categories')->get();
    }
    
}
