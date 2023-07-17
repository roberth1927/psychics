<?php
//01/08/2020 12:24
namespace App\Console\Commands;

use App\Models\EmailLove;
use App\Models\User;
use App\Services\EmailUtils;
use App\Services\WhiteLabel;
use Carbon\Carbon;
use Illuminate\Console\Command;

class clientsLove extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:clients_love';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Re-engagement email- Love.';

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
      $users2 = [
        [
          'name' => 'Love Readings By Sabrina',
          'image' => 'psychic_love_1.png',
          'reviews' => '81',
          'description' => 'I promise insight and will give you a detailed reading and clarity in love & relationships.',
          'link' => 'https://www.psychics1on1.com/love-readings-by-sabrina',
        ],
        [
          'name' => 'Love Expert Angelina',
          'image' => 'psychic_love_2.png',
          'reviews' => '51',
          'description' => 'I will guide and give you the advice you need to better your life, specializing in love.',
          'link' => 'https://www.psychics1on1.com/love-expert-angelina',
        ],
        [
          'name' => 'Love Specialist Violet',
          'image' => 'psychic_love_3.png',
          'reviews' => '12',
          'description' => 'I specialize in love and relationships, helping people across the globe.',
          'link' => 'https://www.psychics1on1.com/love-specialist-violet',
        ]
      ];

      $emails = EmailLove::all();
      //$emails = EmailLove::where('email', 'p.luna95@gmail.com')->get();

      foreach ($emails as $emailLove) {
        $user = User::where('user.email', $emailLove->email)->first();
        if($user){
          $this->line($user->email);
          //EmailUtils::clients_love($user, $users2);
          EmailUtils::days_inactive_90($user);
        }
        
      }
    }
}
