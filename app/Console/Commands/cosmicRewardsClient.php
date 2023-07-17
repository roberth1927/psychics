<?php
//01/08/2020 12:24
namespace App\Console\Commands;

use App\Models\User;
use App\Services\EmailUtils;
use App\Services\WhiteLabel;
use Carbon\Carbon;
use Illuminate\Console\Command;

class cosmicRewardsClient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:cosmic_rewards_client';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cosmic Rewards-Client to Client Announcement Email.';

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
        ->where('user.role_id', '=', WhiteLabel::roleId('User'))->get();
      foreach ($users as $user) {
        $this->line($user->email);
        EmailUtils::cosmic_rewards_client($user);
      }
    }
}
