<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PsychicLaunchEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $email;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$email)
    {
        $this->user = $user;
        $this->email = $email;
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown("emails.psychicLaunchEmail")
        ->from('hello@psychics1on1.com', 'Psychics1on1 Team')
        ->subject( $this->user->userProfile->name.", Fee-Free Earning. Bigger Payday. Here's How...")
        ->with(['user' => $this->user,'email' => $this->email]);
    }
}
