<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Video;
use App\Models\User;
use App\Events\VideoViewers;
use App\Events\SubscribeUsers;
use App\Models\Comment;
use App\Events\NewNotification;
use App\Events\userVisitPage;
use Auth;
use DB;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $posts = Post::with(['comments' => function($query){
        //     $query->select('id','comment','post_id');
        // }])->get();
        event(new userVisitPage(" subsrcibed Now"));
        return view('home');
    }

    public function comment(Request $request)
    {
        // return $request->all();
        $comment = Comment::create([
            'post_id' => $request->post_id,
            'comment' => $request->comment,
            'user_id' => Auth::id(),
        ]);
        $data = ['user_id' => Auth::id(),'comment_id'=>$comment->comment,'post_id' => $request->post_id];
        event(new NewNotification($data));
        return redirect()->back()->with(['success' => 'تم اضافه التعليق بنجاح']);
    }
    public function youtube()
    {
        $user = Auth::user();
        $video = Video::first();        
        $ifWatched = DB::table('user_video')->whereUserIdAndVideoId($user->id,$video->id)->get();
        if(count($ifWatched) == 0)
        {
            event(new VideoViewers($video));
            $user->videos()->attach([$video->id]);
        }
        return view('youtube')->with('video',$video);
    }

    public function subscribe(User $user , Request $request)
    {
        
        return view('subscribe')->with(['data'=>$user,'usersSubscribed'=>$user->usersSubscribed]);
    }

    public function increaseSubscribe(Request $request)
    {
        // we have two way to increase subscribe 

        //first  easy way 
        /*
        $auth = Auth::user();
        $user = User::find($request->user);       
        $subscribed = $auth->subscribedUsers;
        $ifSubscribed = DB::table('subscribe_user')->where('user_id',$auth->id)->where('subscribe_id',$user->id)->first();
        if(!$ifSubscribed){
            $auth->subscribedUsers()->attach([$user->id]);
            Session::flash('success','Success Subscribe');
        }else{
            Session::flash('error','you Already Subscribe This User Before');
        }
        return redirect()->back();
        */
       

        //second complex way /* event using */
        $user = User::find($request->user);       
        event(new SubscribeUsers($user));
        event(new userVisitPage("$user->name subsrcibed Now"));
        return redirect()->back();
        
    }
}
