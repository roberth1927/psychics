<?php
//01/08/2020 12:24
namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Services\EmailUtils;
use App\Services\TwilioUtils;
use App\Services\WhiteLabel;
use Illuminate\Console\Command;

class PsychicPaypal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:psychic_paypal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'No logged in 30 day.';

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
        $ids = User::select('user.id')
        ->join('user_biller_edata', 'user_biller_edata.user_id', '=', 'user.id')
        ->where('user_biller_edata.type', 'DEPOSIT')->groupBy('user.id')
        ->get()->map(function($item){return $item->id;})->toArray();
        

        $users = User::where('email_validated', 1)
            ->where('test_user', 0)
            ->where('role_id', '=', WhiteLabel::roleId('Psychic'))
            ->whereNotIn('id', $ids)
            ->get();


        foreach ($users as $user) {
            $this->line($user->email);
            EmailUtils::send_paypal_psychic($user);
            TwilioUtils::send_sms_paypal_psychic($user);
        }

    }
}
