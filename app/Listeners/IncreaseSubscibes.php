<?php

namespace App\Listeners;

use App\Events\SubscribeUsers;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Auth;
use Session;
use DB;
class IncreaseSubscibes
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public function __construct()
    {
    }

    public function handle(SubscribeUsers $event)
    {
        $this->increaseSubscribe($event->user);
    }

    public function increaseSubscribe($user)
    {
        $auth = Auth::user();
        $subscribed = $auth->subscribedUsers;
        $ifSubscribed = DB::table('subscribe_user')->whereUserIdAndSubscribeId($auth->id,$user->id)->first();
        if(!$ifSubscribed){
            $auth->subscribedUsers()->attach([$user->id]);
            Session::flash('success','Success Subscribe');
        }else{
            Session::flash('error','You Already Subscribe This User Before');
        }

        
    }
}
