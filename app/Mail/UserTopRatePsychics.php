<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserTopRatePsychics extends Mailable
{
    use Queueable, SerializesModels;

    private $psychics;

    private $user;

    public $subject;

    public $reviews;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $subject, $psychics, $reviews)
    {
        $this->subject = $subject;
        $this->psychics = $psychics;
        $this->user = $user;
        $this->reviews = $reviews;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown("emails.userTopRatePsychics")
        ->from('hello@psychics1on1.com', 'Psychics1on1 Team')
        ->subject( $this->user->userProfile->name.' | ' . $this->subject ?? 'Top Rated & Reviewed Roundup')
        ->with(['user' => $this->user, 'users' => $this->psychics, 'reviewsUser' => $this->reviews]);
    }
}
