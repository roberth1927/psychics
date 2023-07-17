<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class clientsFinancialNew extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $users)
    {
        $this->user = $user;
        $this->users = $users;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown("emails.clientsFinancialn")
        ->from('support@psychics1on1.com', 'Psychics1on1 Team')
        ->subject("Happy New Year! Here’s $10 OFF to get the year started.")
        ->with(['user' => $this->user, 'users' => $this->users]);
    }
}
