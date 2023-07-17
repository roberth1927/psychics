<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FlashSaleEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $promoCode)
    {
      
        $this->user = $user;
        $this->promoCode = $promoCode;
      
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown("emails.flashSaleEmail")
        ->from('support@psychics1on1.com', 'Psychics1on1 Team')
        ->subject($this->user->userProfile->name . ' | Psychics1on1 Team')
        ->with(['user'=>$this->user, 'promoCode' => $this->promoCode]);
    }
}
