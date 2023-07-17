<?php
//01/08/2020 12:24
namespace App\Console\Commands;

use App\Models\EmailLove;
use App\Models\User;
use App\Services\EmailUtils;
use App\Services\WhiteLabel;
use Carbon\Carbon;
use Illuminate\Console\Command;

class clientsFinancial extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:clients_financial';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Re-engagement email- Medium.';

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
          'name' => 'Maeva Sun',
          'image' => 'LOVE AND RELATIONSHIP MASTER.jpg',
          'reviews' => '200',
          'description' => 'I will connect you to your higher self to give you clarity to make the best financial decision.',
          'link' => 'https://www.psychics1on1.com/maeva-sun',
        ],
        [
          'name' => 'Maya',
          'image' => 'DONNA LOVE.png',
          'reviews' => '179',
          'description' => 'I will find the root to your problem and present you a suitable financial solution.',
          'link' => 'https://www.psychics1on1.com/maya',
        ],
        [
          'name' => 'Psychic Alisha',
          'image' => 'LOVE ADVISOR ANGEL.png',
          'reviews' => '78',
          'description' => 'I will help you reach a solution through any financial or career dilemmas.',
          'link' => 'https://www.psychics1on1.com/psychic-alisha',
        ]
      ];

      $emails = EmailLove::all(); // using this table (email_love) as a generic email list

      foreach ($emails as $emailLove) {
        $user = User::where('user.email', $emailLove->email)->first();
        if($user){
          $this->line($user->email);
          EmailUtils::clients_financial($user, $users2);
        }
        
      }

    }
}
