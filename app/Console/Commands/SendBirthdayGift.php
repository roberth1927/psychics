<?php
//01/08/2020 12:24
namespace App\Console\Commands;

use App\Models\User;
use App\Services\EmailUtils;
use App\Services\WhiteLabel;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendBirthdayGift extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send_birthday_gift';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send gift on birthday user.';

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
		  //->where('user.email', 'dbbcastillo@gmail.com')
          ->where('user.role_id', '=', WhiteLabel::roleId('User'))
          ->whereMonth('birth_date', '=', Carbon::now()->format('m'))
          ->whereDay('birth_date', '=', Carbon::now()->format('d'))->get();

        //$this->line($date->format('Y-m-d'));

        foreach ($users as $user) {
			$this->line($user->email);
          EmailUtils::send_to_clients_birthday_gift($user);
        }

    }
}
