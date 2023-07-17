<?php
//01/08/2020 12:24
namespace App\Console\Commands;

use App\Models\EmailLove;
use App\Models\User;
use App\Services\EmailUtils;
use App\Services\WhiteLabel;
use Carbon\Carbon;
use Illuminate\Console\Command;

class clientsMediumNew extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:clients_medium_new';

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
          'name' => 'Psychic Solutions',
          'image' => 'psychic_medium_1.jpg',
          'reviews' => '57',
          'description' => '"I have been talking to her for a while. she has been a guide and very patient. She tells you what the energy is and what to expect." -Abigail',
          'link' => 'https://www.psychics1on1.com/psychic-solutions',
        ],
        [
          'name' => 'Psychic Pauly',
          'image' => 'psychic_medium_2.jpg',
          'reviews' => '27',
          'description' => '"Psychic Pauly is very detailed and specific, he is kind and chatty, willing to help and has such a humble aura." -Natasha',
          'link' => 'https://www.psychics1on1.com/psychic-pauly',
        ],
        [
          'name' => 'Psychic Aania',
          'image' => 'psychic_medium_3.jpg',
          'reviews' => '15',
          'description' => '"Aania is one of the best readers I’ve talked to. She gave me way more information than I expected. Highly recommend!" -Sunny',
          'link' => 'https://www.psychics1on1.com/psychic-aania',
        ]
      ];
      $users = EmailLove::all();

      foreach ($users as $user) {
        $this->line($user->email);
        EmailUtils::clients_medium_new($user, $users2);
      }
    }
}
