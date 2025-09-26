<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\UserRegistered;
use App\Mail\NewUserRegisteredMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\SendAdminNotification;
use Illuminate\Contracts\Queue\ShouldQueue; 
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewUserRegisteredNotification;

class SendAdminNewUserEmail
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
    public function handle(UserRegistered $event): void
    {
        // $admins = User::where('role', 'admin')->get();
        // foreach ($admins as $a) {
        //     Mail::to($a->email)->send(new NewUserRegisteredMail($event->user));

        // using notification class
        $admins = User::where('role', 'admin')->get();
        Notification::send($admins, new SendAdminNotification($event->user));
    } 
}
