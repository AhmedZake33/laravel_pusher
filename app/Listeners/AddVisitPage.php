<?php

namespace App\Listeners;

use App\Events\userVisitPage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Storage;
use App\Models\Log;
class AddVisitPage
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
        $data = $event->data;
        // Storage::put('subscribed.txt',$data);
        Log::log('user Visit Page');
    }
}
