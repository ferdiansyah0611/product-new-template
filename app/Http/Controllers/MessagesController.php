<?php

namespace App\Http\Controllers;
//Helping
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
//Models
use App\Models\Messages;
use App\Models\Profile;
use App\User;
use App;
class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        App::setLocale(Auth()->user()->languange);
        $title = 'All Messages';
        $profile_user = Profile::where('user_id', Auth()->user()->id)->get();
        $message = Messages::latest()->where('to', Auth()->user()->email)->orderBy('updated_at', 'ASC')->paginate(25);
        return view('home.messages.inbox', compact('message', 'title', 'profile_user'));
    }
    public function create()
    {
        App::setLocale(Auth()->user()->languange);
        $title = 'New Messages';
        $profile_user = Profile::where('user_id', Auth()->user()->id)->get();
        return view('home.messages.new', compact('title', 'profile_user'));
    }
    public function archive(){
        App::setLocale(Auth()->user()->languange);
        $data_user = DB::table('messages')->where('to', Auth()->user()->email)->where('status', '2')->get();
        $title = 'archive';
        return view('home.messages.archives', compact('data_user', 'title'));
    }
    public function store(Request $request)
    {
        if ($request->has('sendmessages')) {
            DB::table('messages')->insert([
                'id' => rand(1000000000, 1000000000000),
                'user_id' => $request->user_id,
                'from' => $request->from,
                'to' => $request->to,
                'subjects' => base64_encode($request->subjects),
                'messages' => base64_encode($request->sendmessages),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->route('messages.index')->with('success', 'Send messages successfuly');
        }
    }
    public function show(Messages $messages)
    {
        App::setLocale(Auth()->user()->languange);
        $title = 'Show';
        DB::table('messages')->where('id', $messages->id)->update([
            'status' => '1',
        ]);
        return view('home.messages.show', compact('messages', 'title'));
    }
    public function edit(Messages $messages)
    {
        //
    }
    public function update(Request $request, Messages $messages)
    {
        //
    }
    public function destroy(Messages $messages)
    {
        $messages->delete();
        return redirect()->back();
    }
    public function read_message(Messages $messages){
        DB::table('messages')->where('id', $messages->id)->update([
            'status' => '1'
        ]);
        return redirect()->back();
    }
    public function before_message(Messages $messages){
        DB::table('messages')->where('id', $messages->id)->update([
            'status' => '0'
        ]);
        return redirect()->back();
    }
    
}
