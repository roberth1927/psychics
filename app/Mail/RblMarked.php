<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RblMarked extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $user;

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
        
        return $this->markdown("emails.rblMarked")
        ->from('hello@psychics1on1.com', 'Psychics1on1 Team')
        ->subject("Love & Relationship Advice at the Touch of a Button… Search our Network of Top-Rated Psychics!")
        ->with(['user' => $this->user]);
    }
}
