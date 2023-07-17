<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Specialties30Days extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown("emails.specialties30Days")
        ->from('hello@psychics1on1.com', 'Psychics1on1 Team')
        ->subject($this->user->userProfile->name. ' | Get a Guru, Cheat the System')
        ->with(['user' => $this->user]);
    }
}
