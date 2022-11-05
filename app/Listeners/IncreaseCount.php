<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\VideoViewers;

class IncreaseCount
{
   
    public $event;
    public function __construct(VideoViewers $event)
    {
        $this->event = $event;
    }

   
    public function handle(VideoViewers $event)
    {
        $this->increaseViewers($event->video);
    }

    public function increaseViewers($model)
    {
        $model->viewers = $model->viewers + 1;
        $model->save();
    }
}
