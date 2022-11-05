<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\Mailable3;
use App\Events\MailSystemEvent;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        // $mail = new Mailable3('passed Data Here','mail4');
        // $result = $mail->submit();
        // if($result == true)
        // {
        //     return 'email sent';
        // }else {
        //     return 'email not sent';
        // }

        // event(new MailSystemEvent('this is data from event & listeners','mail2','this is title'));
        MailSystemEvent::dispatch('this is data from event & listeners','mail2','this is title');

    
    }
}
