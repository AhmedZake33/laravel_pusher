<?php

namespace App\Listeners;

use App\Events\LikeVideos;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreaseLikedVideos
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
     * @param  \App\Events\LikeVideos  $event
     * @return void
     */
    public function handle(LikeVideos $event)
    {
        //
    }
}
