<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserLoginNotification;

class SendLoginNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        // You can leave this empty if no setup is needed for the listener
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        // Send the login notification email to the user who logged in
        Mail::to($event->user->email)->send(new UserLoginNotification($event->user));
    }
}
