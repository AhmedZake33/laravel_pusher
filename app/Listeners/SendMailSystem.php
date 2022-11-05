<?php

namespace App\Listeners;

use App\Events\MailSystemEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\MailSystem;
use Mail;

class SendMailSystem implements ShouldQueue
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
     * @param  \App\Events\MailSystem  $event
     * @return void
     */
    public function handle(MailSystemEvent $event)
    {
        //
        $data = $event->data;
        $view = $event->view;
        $title = $event->title;
        Mail::to('ahmed.zake333@gmail.com')->send(new MailSystem($data,$view,$title));
    }
}
