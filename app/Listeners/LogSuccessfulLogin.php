<?php

namespace App\Listeners;

use App\Models\LoginLog;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogSuccessfulLogin
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
    public function handle(Login $event): void
    {
       
        $user = $event->user;

         LoginLog::create([
            'user_id' => $user->id,
            'fullname' =>$user->lastname.' '.$user->firstname,
            'email' => $user->email,
            'ip_address' => request()->ip(),
            'logged_in_at' => now(),
        ]);
    }
}
