<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BlogEmail extends Mailable
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
        
        return $this->markdown("emails.blogNewsletter")
        ->from('hello@psychics1on1.com', 'Psychics1on1 Team')
        ->subject( $this->user->userProfile->name." | Don’t Ignore That Inner Voice!")
        ->with(['user' => $this->user]);
    }
}
