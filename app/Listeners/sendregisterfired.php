<?php

namespace App\Listeners;

use App\Events\sendregistermail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendmail;

class sendregisterfired
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
     * @param  \App\Events\sendregistermail  $event
     * @return void
     */
    public function handle(sendregistermail $event)
    {
        $userdata = $event->user;
        // dd($userdata);
        $email = new sendmail($userdata);
        Mail::to($userdata['email'])->send($email);
    }
}
