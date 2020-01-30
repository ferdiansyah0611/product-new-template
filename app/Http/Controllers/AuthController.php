<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use Socialite;
Use App\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
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
            DB::table('session_logins')->insert([
                'id' => rand(1000000000, 10000000000),
                'user_id' => Auth()->user()->id,
                'device' => $request->header('User-Agent'),
                'on' => Carbon::now(),
            ]);
            return redirect()->intended('dashboard');
        }
        return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
 
    public function postRegistration(Request $request)
    {  
        DB::table('users')->insert([
            'id' => rand(1000000000,10000000000),
            'user_id' => Crypt::encrypt(rand(1000000000,10000000000)),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
       
        return Redirect::to("dashboard")->withSuccess('Great! You have Successfully loggedin');
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
     
    public function logout() {
        $getUserlog = DB::table('session_logins')->where('user_id')->orderBy('created_at', 'DESC')->get();
        foreach($getUserlog as $get){
            DB::table('session_logins')->where('user_id', $get->user_id)->update([
                'logout' => Carbon::now(),
            ]);
        }
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