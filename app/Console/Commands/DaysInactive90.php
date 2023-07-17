<?php
//01/08/2020 12:24
namespace App\Console\Commands;

use App\Models\User;
use App\Services\EmailUtils;
use App\Services\WhiteLabel;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DaysInactive90 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:days_inactive_90';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send this to customers that have been inactive for 90 days.';

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
        ->where('last_log_in', '<=', Carbon::now()->subDays(90))->get();
      foreach ($users as $user) {
        $this->line($user->email);
        EmailUtils::days_inactive_90($user);
      }
    }
}
