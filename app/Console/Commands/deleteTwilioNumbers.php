<?php
//01/08/2020 12:24
namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Services\EmailUtils;
use App\Services\TwilioUtils;
use App\Services\WhiteLabel;
use Illuminate\Console\Command;
use Twilio\Rest\Client;

class deleteTwilioNumbers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete_twilio_numbers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete_twilio_numbers';

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

        $user = env('TWILIO_USER');      
        $secret = env('TWILIO_PASSWORD');
        $account_sid = env('TWILIO_ACCOUNT_SID');
        
        $client = new Client($user, $secret, $account_sid); 
        
            $incomingPhoneNumbers = self::fetch_numbers($client);
            $this->line(count($incomingPhoneNumbers));
            foreach ($incomingPhoneNumbers as $record) {
                
            if($record->phoneNumber != '+19386668392' && $record->phoneNumber != '+12015946426' && $record->phoneNumber != '+12403926499')
                $this->line($record->phoneNumber);
                $this->line($record->sid);
                self::delete_number($client, $record->sid);
            }
    }


    private static function fetch_numbers($client) {
    	
        $incomingPhoneNumbers = $client->incomingPhoneNumbers->read([]);
        return $incomingPhoneNumbers;
        
    }


    private static function delete_number($client, $sid) {
    	
       $client->incomingPhoneNumbers($sid)->delete();
    }
}
