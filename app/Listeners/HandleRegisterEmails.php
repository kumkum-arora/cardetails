<?php

namespace App\Listeners;

use App\Events\SendRegisterMail;
use App\Mail\RegistrationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;


class HandleRegisterEmails
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
     * @param  \App\Events\SendRegisterMail  $event
     * @return void
     */
    public function handle(SendRegisterMail $event)
    {
        $userdata = $event->user;
        dd($userdata);
        $email = new RegistrationMail($userdata);
        Mail::to($userdata['email'])->send($email);
    }
}
