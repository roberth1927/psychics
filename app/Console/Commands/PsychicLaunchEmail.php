<?php
//01/08/2020 12:24
namespace App\Console\Commands;

use App\Models\User;
use App\Services\EmailUtils;
use App\Services\WhiteLabel;
use Carbon\Carbon;
use Illuminate\Console\Command;

class PsychicLaunchEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:psychic_launch_email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

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

            $users = User::where('user.role_id', '=', 1)->where('email_validated', 1)->where('test_user', 0)->where('fraud', 0)
            // ->where('user.email', 'jessica@collide.com')
            // ->where('user.email', 'km@collide.com')
            //->where('user.email', 'gino@collide.com')
            ->where('user.email', 'usmjesus@gmail.com')
            ->get();
        
        if(!empty($users)){
    
            foreach ($users as $user) {
                $this->line($user->email);
                EmailUtils::send_psychic_launch_email($user,$user->email);
            }

        }

    }
}
