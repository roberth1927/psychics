<?php
//01/08/2020 12:24
namespace App\Console\Commands;

use App\Models\User;
use App\Services\EmailUtils;
use App\Services\WhiteLabel;
use Carbon\Carbon;
use Illuminate\Console\Command;

class cosmicRewardsPsychic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:cosmic_rewards_psychic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cosmic Rewards- Psychic to Client Announcement email.';

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
        ->where('user.role_id', '=', WhiteLabel::roleId('Psychic'))->get();
      foreach ($users as $user) {
        $this->line($user->email);
        EmailUtils::cosmic_rewards_psychic($user);
      }
    }
}
