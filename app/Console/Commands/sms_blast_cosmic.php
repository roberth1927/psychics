<?php
//01/08/2020 12:24
namespace App\Console\Commands;

use App\Models\User;
use App\Services\TwilioUtils;
use Illuminate\Console\Command;

class sms_blast_cosmic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms_blast_cosmic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'sms_blast_cosmic';

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

        $users = User::where('user.role_id', '=', 1)->where('email_validated', 1)->where('test_user', 0)->where('fraud', 0)->where('id','>', 3182)->get();
        // $users = User::where('email', 'usmjesus@gmail.com')->get();

        foreach ($users as $user) {
            $number = $user->user_mobile_nums()->first();
            if($number && $number->number != "" && !is_null($number->number) && !empty($number->number) && $number->validated){
                $code = rand(1000, 99999);
                $message = "Payday just got bigger! Refer clients to Psychics1on1, keep 100% of the $ they spend with you for a month https://www.psychics1on1.com/dashboard/cosmic-rewards?id=".$code;
                TwilioUtils::send_SMS($number, $message, 'sms_blast_psychics');
                $this->line($number->number);
            }

        }

    }
}
