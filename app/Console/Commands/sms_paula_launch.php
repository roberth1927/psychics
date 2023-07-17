<?php
//01/08/2020 12:24
namespace App\Console\Commands;

use App\Models\User;
use App\Services\TwilioUtils;
use Illuminate\Console\Command;

class sms_paula_launch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms_paula';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'sms_paula';

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

        //$users = User::where('user.account_status', 'ACTIVE')->where('email_validated', 1)->where('test_user', 0)->get();
        $users = User::where('email', 'jl@justindlevine.com')->get();
        $this->line(count($users));
        foreach ($users as $user) {
            $number = $user->user_mobile_nums()->first();
            if($number && $number->number != "" && !is_null($number->number) && !empty($number->number) && $number->validated){
                $code = substr(md5(rand(1000, 99999)), 0, 5) ;
                $message = "We’re thrilled to announce Paula Abdul has joined forces with Psychics1on1 ✨ Learn more about our iconic new partner at https://psychics1on1.com/pa/".$code;
                TwilioUtils::send_SMS($number, $message, 'SmsMarketing');
                $this->line($user->email);
                $this->line($number->number);
            }

        }

    }
}
