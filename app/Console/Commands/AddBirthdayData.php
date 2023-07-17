<?php
//01/08/2020 12:24
namespace App\Console\Commands;

use App\Models\User;
use App\Services\EmailUtils;
use App\Services\WhiteLabel;
use Illuminate\Console\Command;

class AddBirthdayData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:add_birthday_data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add birthday to user data.';

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
          ->where('user.test_user', 0)
          ->where('user.role_id', '=', WhiteLabel::roleId('User'))
          ->whereNull('user_profile.birth_date')->get();

        //$this->line($date->format('Y-m-d'));

        foreach ($users as $user) {
          EmailUtils::send_to_clients_with_no_birthday($user);
        }

    }
}
