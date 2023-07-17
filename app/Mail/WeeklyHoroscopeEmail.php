<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WeeklyHoroscopeEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $subjectParam;
    private $signs;
    private $psychics; 
    private $reviews;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $subject, $signs, $psychics, $reviews)
    {
        $this->user = $user;
        $this->subjectParam = $subject;
        $this->signs = $signs;
        $this->psychics = $psychics;
        $this->reviews = $reviews;
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $dates = ['March 21 - April 19', 'April 20 - May 20', 'May 21 - June 20', 'June 21 - July 22', 'July 23 - August 22', 'August 23 - September 22',
     'September 23 - October 22', 'October 23 - November 21','November 22 - December 21', 'December 22 - January 19', 'January 20 - February 18', 'February 19 - Mar 20'];
    $images = [2,4,5,6,7,8,9,10,11,12,13,14];
    $backgrounds = [
        '',
        'transparent linear-gradient(48deg, #91EAE4 0%, #86A8E7 100%) 0% 0% no-repeat padding-box;',
        'transparent linear-gradient(231deg, #C0D162B3 0%, #F2FDFF 100%) 0% 0% no-repeat padding-box;',
        'transparent linear-gradient(50deg, #FBFFE3 0%, #FFAF91 100%) 0% 0% no-repeat padding-box;',
        'transparent linear-gradient(230deg, #FFCABE 0%, #BFFFEB 100%) 0% 0% no-repeat padding-box;',
        'transparent linear-gradient(228deg, #FFA0CC 0%, #BBD9FD 100%) 0% 0% no-repeat padding-box;',
        'transparent linear-gradient(50deg, #36D1DC4D 0%, #5B86E580 100%) 0% 0% no-repeat padding-box;',
        'transparent linear-gradient(50deg, #BDA8614D 0%, #FF000073 100%) 0% 0% no-repeat padding-box;',
        'transparent linear-gradient(50deg, #DAF4EE 0%, #DEE2FC 100%) 0% 0% no-repeat padding-box;',
        'transparent linear-gradient(49deg, #FF58584D 0%, #00FFF580 100%) 0% 0% no-repeat padding-box;',
        'transparent linear-gradient(231deg, #F2C2E5 100%, #F88ED7 0%) 0% 0% no-repeat padding-box;',
        'transparent linear-gradient(50deg, #F0E5CF 100%, #CEFF00 0%) 0% 0% no-repeat padding-box;'
    ];    
    
        return $this->markdown("emails.weeklyHoroscopeEmail")
        ->from('support@psychics1on1.com', 'Psychics1on1 Team')
        ->subject( $this->user->userProfile->name.' | '. $this->subjectParam)
        ->with(['user' => $this->user, 'signs' => $this->signs, 'dates' => $dates, 'images' => $images, 'backgrounds' => $backgrounds, 'psychics' => $this->psychics, 'reviewsUser' => $this->reviews]);
    }
}
