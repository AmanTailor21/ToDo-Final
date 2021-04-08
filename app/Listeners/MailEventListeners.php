<?php

namespace App\Listeners;

use App\Events\MailEvent;
use App\Mail\sendmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class MailEventListeners implements ShouldQueue
{
    use InteractsWithQueue;
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
     * @param $data
     */
    public function handle($data)
    {
        Mail::to('amantailor21@gmail.com')->send(new sendmail($data->data));
    }
}
