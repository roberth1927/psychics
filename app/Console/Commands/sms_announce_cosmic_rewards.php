<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Services\TwilioUtils;
use Illuminate\Console\Command;

class sms_announce_cosmic_rewards extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send_sms_announce_cosmic_rewards';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Goes to all active clients 5 days after the psychic profile page updates go live';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $users = User::join('user_profile', 'user_profile.user_id', '=', 'user.id')
        ->where('user.email_validated', 1)
        ->where('user.test_user', 0)->get();      

        foreach ($users as $user) {

            $number = $user->user_mobile_nums()->first();
            if($number && $number->number != "" && !is_null($number->number) && !empty($number->number) && $number->validated){
                $message = "Payday just got bigger! Refer clients to Psychics1on1, get $10 FREE https://www.psychics1on1.com/dashboard/cosmic-rewards";
                $this->line('Client ID: '.$user->id.' -- Client number: '.$number->number);
                TwilioUtils::send_SMS($number, $message, 'sms_announce_cosmic_rewards');
                
            }

        }
    }
}
