<?php
//01/08/2020 12:24
namespace App\Console\Commands;

use App\Models\User;
use App\Services\EmailUtils;
use App\Services\WhiteLabel;
use Illuminate\Console\Command;

class FirstPurchaseOff extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:first_purchase_off';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '10% Off for first purchase.';

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
        $users = User::where('user.email_validated', 1)
          ->where('user.test_user', 0)
          ->where('user.role_id', '=', WhiteLabel::roleId('User'))
          ->where('user.credits', 0)
          ->whereDoesntHave('user_credit_logs', function ($query) {
            return $query->where('user_credit_log.action', '=', 'BUY_CREDIT');
          })->get();

        //$this->line($date->format('Y-m-d'));

        foreach ($users as $user) {
          EmailUtils::send_to_clients_purchase_credits_offer($user);
        }

    }
}
