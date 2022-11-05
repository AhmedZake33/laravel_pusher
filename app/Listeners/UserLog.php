<?php

namespace App\Listeners;

use App\Events\userVisitPage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Log;

class UserLog
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\userVisitPage  $event
     * @return void
     */
    public function handle(userVisitPage $event)
    {
        Log::log('user login');   
    }
}
