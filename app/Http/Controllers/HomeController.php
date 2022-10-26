<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Events\NewNotification;
use Auth;


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
        $posts = Post::with(['comments' => function($query){
            $query->select('id','comment','post_id');
        }])->get();
        return view('home',compact('posts'));
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
}
