<?php

namespace App\Http\Controllers\User;

//helping
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App;
//vendor
use Yajra\Datatables\Datatables;
//Models
use App\Models\AdminChat;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Chart;
use App\Models\Client;
use App\Models\EmailChat;
use App\Models\Files;
use App\Models\Friendly;
use App\Models\Invitation;
use App\Models\Like;
use App\Models\LikeQuestion;
use App\Models\MessageChat;
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
use App\Models\Task;
use App\User;

class ViewController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth','web']);
	}
    public function TaskIndex()
    {
    	$title = 'Task';
        return view('home.task.index',compact('title'));
    }
}
