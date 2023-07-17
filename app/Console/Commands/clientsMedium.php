<?php
//01/08/2020 12:24
namespace App\Console\Commands;

use App\Models\User;
use App\Services\EmailUtils;
use App\Services\WhiteLabel;
use Carbon\Carbon;
use Illuminate\Console\Command;

class clientsMedium extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:clients_medium';

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
          'description' => 'Readings are a personal connection between this world and the spiritual world, my goal is a true positive connection for visions.',
          'link' => 'https://www.psychics1on1.com/psychic-solutions',
        ],
        [
          'name' => 'Psychic Pauly',
          'image' => 'psychic_medium_2.jpg',
          'reviews' => '27',
          'description' => 'Psychic energy reader and adviser in dreams, past lives, and spirituality.',
          'link' => 'https://www.psychics1on1.com/psychic-pauly',
        ],
        [
          'name' => 'Psychic Aania',
          'image' => 'psychic_medium_3.jpg',
          'reviews' => '15',
          'description' => 'A Medium with 20 years of experience. I can help you navigate through any issues that you are facing.',
          'link' => 'https://www.psychics1on1.com/psychic-aania',
        ]
      ];
      $users = User::where('user.email_validated', 1)
        ->where('user.test_user', 0)
        ->where('user.role_id', '=', WhiteLabel::roleId('User'))->get();
      foreach ($users as $user) {
        $this->line($user->email);
        EmailUtils::clients_medium($user, $users2);
      }
    }
}
