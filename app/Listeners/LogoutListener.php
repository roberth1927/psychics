<?php

namespace App\Listeners;

use App\Events\PsychicOnlineStatus;
use Illuminate\Support\Facades\Auth;

class LogoutListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $user = Auth::user();
        $user->online = 0;
        broadcast(new PsychicOnlineStatus($user->id, $user->online))->toOthers();
        $user->save();
        
    }
}
