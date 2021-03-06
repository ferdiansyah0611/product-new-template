<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use Socialite;
Use App\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Db;
use Carbon\Carbon;
use Session;
 
class AuthController extends Controller
{
 
    public function index()
    {
        return view('login');
    }  
 
    public function registration()
    {
        return view('registration');
    }
     
    public function postLogin(Request $request)
    {
        request()->validate([
        'email' => 'required',
        'password' => 'required',
        ]);
 
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $idRandom = rand(1000000,10000000);
            DB::table('session_logins')->insert([
                'id' => $idRandom,
                'user_id' => Auth()->user()->id,
                'device' => $request->header('User-Agent'),
                'on' => Carbon::now(),
            ]);
            $request->session()->put('id', $idRandom);
            if(Auth()->user()->role == '2'){
                return redirect()->route('admin.dashboardindex')->with('success', 'Your has success login');
            }
            elseif(Auth()->user()->role == '0'){
                return redirect()->route('index')->with('success', 'Your has success login');
            }
            else{
                return redirect()->route('member.dashboardindex')->with('success', 'Your has success login');
            }
        }//if
        return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
 
    public function postRegistration(Request $request)
    {  
        DB::table('users')->insert([
            'id' => rand(1000000,10000000),
            'user_id' => rand(1000000,10000000),
            'name' => $request->name,
            'name_store' => Str::slug($request->name.'-store-').rand(1000000,10000000),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'born' => $request->born,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
       
        return Redirect::to("dashboards")->withSuccess('Great! You have Successfully loggedin');
    }
     
    public function dashboard()
    {
 
      if(Auth::check()){
        return view('dashboard');
      }
       return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }
 
    public function create(array $data)
    {
      return User::create([
        'id' => rand(1000000000,10000000000),
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
     
    public function logout(Request $request) {
        $getID = $request->session()->get('id');
            DB::table('session_logins')->where('id', $getID)->update([
                'logout' => Carbon::now(),
            ]);
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
    public function redirectToProvider($driver)
{
    return Socialite::driver($driver)->redirect();
}
public function handleProviderCallback($driver)
{
    try {
        $user = Socialite::driver($driver)->user();

        $create = User::firstOrCreate([
            'email' => $user->getEmail()
        ], [
            'socialite_name' => $driver,
            'socialite_id' => $user->getId(),
            'name' => $user->getName(),
            'avatars' => $user->getAvatar(),
            'email_verified_at' => now()
        ]);

        auth()->login($create, true);
        return redirect($this->redirectPath());
    } catch (\Exception $e) {
        return redirect()->route('login');
    }
}
}