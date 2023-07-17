<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WeeklyHoroscopeSignEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $subjectParam;
    private $signs;
    private $md5;
    private $info;
    private $psychics;
    private $reviews;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $subject, $signs, $info, $psychics, $reviews)
    {
        $this->user = $user;
        $this->subjectParam = $subject;
        $this->signs = $signs;
        $this->info = $info;
        $this->psychics = $psychics;
        $this->reviews = $reviews;
        $this->md5 = md5($this->user->email);      
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown("emails.weeklyHoroscopeSignEmail")
        ->from('support@psychics1on1.com', 'Psychics1on1 Team')
        ->subject( $this->user->name.' , '. $this->subjectParam)
        ->with(['user' => $this->user, 'signs' => $this->signs, 'psychics' => $this->psychics, 'reviewsUser' => $this->reviews, 'info' => $this->info, 'md5' => $this->md5 ]);
    }
}
