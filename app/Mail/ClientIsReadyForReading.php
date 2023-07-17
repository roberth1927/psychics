<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClientIsReadyForReading extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown("emails.clientIsReadyForTheirReading")
        ->from('support@psychics1on1.com', 'Psychics1on1 Team')
        ->subject("{$this->appointment->psychic->userProfile->display_name} | Begin {$this->appointment->user->userProfile->display_name}'s Reading Now!")
        ->with(['appointment'=>$this->appointment, 'user'=>$this->appointment->user]);
    }
}
