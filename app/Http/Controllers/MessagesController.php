<?php

namespace App\Http\Controllers;
//Helping
use App;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

use App\Models\AdminChat;
use App\Models\EmailChat;
use App\Models\MessageChat;

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


    public function chattingIndex(){
        $title = 'My chatting';
        $chatList = DB::table('message_chats')->where('mail_from', Auth()->user()->email)->paginate('50');
        return view('home.chat.chatting', compact('title'), ['data' => $chatList]);
    }

    public function requestMessage(Request $request){
        if($request->has('adminChatting')){
            if($request->file('file2')){
                $this->validate($request,[
                    'adminChatting' => 'required|longText',
                    'file1' => 'max:10000|mimes:jpg,png,jpeg,jfif',
                    'subjects' => 'string|required',
                ]);
                $file = $request->file('file1');
                $filename = '/db/img/'.$file->getClientOriginalName();
                $dir = 'db/img';
                $file->move($dir,$filename);
                DB::table('admin_chats')->insert([
                    'user_id' => Auth()->user()->id,
                    'from' => Auth()->user()->email,
                    'subjects' => $request->subjects,
                    'messages' => $request->adminChatting,
                    'file_1' => $filename,
                ]);
                return redirect()->back();
            }//if file
            if($request->file('file2')){
                $this->validate($request,[
                    'adminChatting' => 'required|longText',
                    'file1' => 'max:10000|mimes:jpg,png,jpeg,jfif',
                    'file2' => 'max:10000|mimes:jpg,png,jpeg,jfif',
                    'subjects' => 'string|required',
                ]);
                $file = $request->file('file1');
                $filename = '/db/img/'.$file->getClientOriginalName();
                $dir = 'db/img';
                $file->move($dir,$filename);
                //file2
                $file2 = $request->file('file2');
                $filename2 = '/db/img/'.$file2->getClientOriginalName();
                $file2->move($dir,$filename2);
                DB::table('admin_chats')->insert([
                    'user_id' => Auth()->user()->id,
                    'from' => Auth()->user()->email,
                    'subjects' => $request->subjects,
                    'messages' => $request->adminChatting,
                    'file_1' => $filename,
                    'file_2' => $filename2,
                ]);
                return redirect()->back();
            }//if file
        }//if chat
        if($request->has('mailChatting')){
            DB::table('email_chats')->insert([
                'user_id' => Auth()->user()->id,
                'from' => Auth()->user()->email,
                'to' => $request->to,
                'subjects' => $request->subjects,
                'messages' => $request->mailChatting,
            ]);
            return redirect()->back();
        }//if Mail
        if($request->has('chatting')){
            $idRandom = rand(1000000000,10000000000);
            $to = $request->mail_to;
            $from = Auth()->user()->email;
            $messages = $request->chatting;
            DB::table('message_chats')->insert([
                'id' => $idRandom,
                'messages_id' => $idRandom,
                'mail_to' => $to,
                'mail_from' => $from,
                'messages' => $messages,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->back()->with('success', 'Send success');
        }//if chatting
    }//function
    
}
