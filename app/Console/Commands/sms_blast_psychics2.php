<?php
//01/08/2020 12:24
namespace App\Console\Commands;

use App\Models\User;
use App\Services\TwilioUtils;
use Illuminate\Console\Command;

class sms_blast_psychics2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms_blast_psychics_cosmic1';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'sms_blast_psychics_cosmic1';

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

        $users = User::where('user.role_id', '=', 1)->where('email_validated', 1)->where('test_user', 0)->where('fraud', 0)->where('id','>', 4847)->get();
        
        foreach ($users as $user) {
            $number = $user->user_mobile_nums()->first();
            if($number && $number->number != "" && !is_null($number->number) && !empty($number->number) && $number->validated){
                $code = rand(1000, 99999);
                $message = "Psychics1on1 Announcement: new Client Response Time Rules. Your review is required: https://bit.ly/2WHJCIx?unk=".$code;
                TwilioUtils::send_SMS($number, $message, 'sms_blast_psychics');
                $this->line($number->number);
            }

        }

    }
}
