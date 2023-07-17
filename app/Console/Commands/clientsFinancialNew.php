<?php
//01/08/2020 12:24
namespace App\Console\Commands;

use App\Models\EmailLove;
use App\Models\User;
use App\Services\EmailUtils;
use App\Services\WhiteLabel;
use Carbon\Carbon;
use Illuminate\Console\Command;

class clientsFinancialNew extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:clients_financial_new';

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
          'description' => '"Maeva helped me see what was preventing me from advancing in my career. She guided me toward a successful transition." -Sara',
          'link' => 'https://www.psychics1on1.com/maeva-sun',
        ],
        [
          'name' => 'Maya',
          'image' => 'DONNA LOVE.png',
          'reviews' => '179',
          'description' => '"Maya is always my go-to whenever I have career questions. I always see the things she tells me, unfold in life to be true." -Johnathan',
          'link' => 'https://www.psychics1on1.com/maya',
        ],
        [
          'name' => 'Psychic Alisha',
          'image' => 'LOVE ADVISOR ANGEL.png',
          'reviews' => '78',
          'description' => '"Alisha predicted I would get a job in mid-Dec and I got the offer last week. She delivers a detailed reading." -Amiel',
          'link' => 'https://www.psychics1on1.com/psychic-alisha',
        ]
      ];

      $emails = EmailLove::all(); // using this table (email_love) as a generic email list

      foreach ($emails as $emailLove) {
        $user = User::where('user.email', $emailLove->email)->first();
        if($user){
          $this->line($emailLove->email);
          EmailUtils::clients_financial_new($emailLove, $users2);
        }
        
      }

    }
}
