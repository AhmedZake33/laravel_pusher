<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailSystem extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public $view;
    public $title;

    public function __construct($data,$view,$title)
    {
        //
        $this->data = $data;
        $this->view = $view;
        $this->title = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()

    {
        return $this->markdown($this->view)->with(['data'=>$this->data,'title'=>$this->title]);
    }
}
