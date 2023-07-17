<?php
//01/08/2020 12:24
namespace App\Console\Commands;

use App\Models\User;
use App\Services\EmailUtils;
use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class sendFlashSale extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:flash_sale';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Flash Sale to Clients';

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

       $users = User::where('role_id', 2)
       ->where('user.email_validated', 1)
       ->where('user.test_user', 0)
       ->where('user.email', 'dbbcastillo@gmail.com')
       ->get();


        foreach ($users as $user){
            EmailUtils::flash_sale_email($user, 'FULLMOON20');
            $this->line($user->email);
        }

    }
}
