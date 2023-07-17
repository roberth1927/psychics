<?php

namespace App\Console\Commands;

use App\Models\OfferEmailNew;
use App\Services\EmailUtils;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class AddOfferEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:add_offer_emails';

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
      // $csv = Storage::get('Yogi_Email_Subs.csv');
      // $rows = explode("\r\n", $csv);
      // foreach ($rows as $key => $row) {
      //   if ($row == '') {
      //     continue;
      //   }
      //   $check = OfferEmailNew::where('email', $row)->first();
      //   if (!$check) {
      //     OfferEmailNew::create([
      //       'email' => $row,
      //       'confirmed' => 0,
      //     ]);
      //   }
      // }
      // $csv = Storage::get('Bless_Contacts_Master.csv');
      // $rows = explode(",,\r\n", $csv);
      // foreach ($rows as $key => $row) {
      //   if ($row == '') {
      //     continue;
      //   }
      //   $check = OfferEmailNew::where('email', $row)->first();
      //   if (!$check) {
      //     OfferEmailNew::create([
      //       'email' => $row,
      //       'confirmed' => 0,
      //     ]);
      //   }
      // }
      $csv = Storage::get('DataTable.csv');
      $rows = explode("\r\n", $csv);
      foreach ($rows as $key => $row) {
        if ($row == '') {
          continue;
        }
        $elements = explode(",", $row);
        OfferEmailNew::create([
          'email' => $elements[1],
          'confirmed' => 0,
        ]);
      }
    }
}
