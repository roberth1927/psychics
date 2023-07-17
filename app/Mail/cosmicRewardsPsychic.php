<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class cosmicRewardsPsychic extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
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
        return $this->markdown("emails.cosmicRewardsPsychic")
        ->from('support@psychics1on1.com', 'Psychics1on1 Team')
        ->subject($this->user->userProfile->name . ", get rewarded for sharing. Receive $10 for each referral.")
        ->with(['user' => $this->user]);
    }
}
