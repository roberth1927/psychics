<?php

namespace App\Console\Commands;

use App\Models\OfferEmailNew;
use App\Services\EmailUtils;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class NewOfferEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:new_offer_emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
      //$users = OfferEmailNew::all();
      $users = OfferEmailNew::where('email', 'p.luna95@gmail.com')->get();

      foreach ($users as $user) {
        EmailUtils::rbl_marked($user);
      }
    }
}
