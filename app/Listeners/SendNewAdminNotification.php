<?php

namespace App\Listeners;

use App\Events\AdminCreated;
use App\Mail\AccountCreated;
use Illuminate\Support\Facades\Mail;

class SendNewAdminNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AdminCreated $event): void
    {
        // send email notification to admin
        Mail::to($event->user->email)
            ->send(new AccountCreated($event->user));
    }
}
