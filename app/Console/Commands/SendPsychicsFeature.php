<?php
//01/08/2020 12:24
namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Services\WhiteLabel;
use Illuminate\Console\Command;
use App\Models\EmailAdminConfig;

class SendPsychicsFeature extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send_psychics_feature';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send top six psychics to user';

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
        $date = Carbon::now()->subDays(30);
        if(!($config = EmailAdminConfig::where('type', 'featured')->where('updated_at', ">", $date)->first()))
         if(!($psychic = $this->getUser())) return false;

        //if ($config->date) {

        //$date = new Carbon('now', $config->timezone);

        //$date2 = new Carbon($config->date, $config->timezone);

        // if ( $date2->format('YmdHi') == $date->format('YmdHi') ) {

        if (!$psychic = \collect($config->users)->filter(function ($item) {return !isset($item['used']);})->first()) {

            if(!($psychic = $this->getUser())) return false;

        }

        foreach (User::where('email_validated', 1)
            ->where('test_user', 0)
            ->where('role_id', '=', WhiteLabel::roleId('User'))
            //->where('email', 'km@collide.com')
            ->get() as $user) {
            $this->line($user->email);
            EmailUtils::send_email_to_user_features_psychics($user, $config->subject, $psychic);
        }

    }


    public function getUser(){
        if (
            $user = User::select('user.*')->join('review', 'review.psychic_id', '=', 'user.id')
            ->join('user_profile', 'user_profile.user_id', '=', 'user.id')
            ->whereNotNull('user_profile.cover_path')->whereNotNull('user_profile.haedshot_path')
            ->whereNotNull('user_profile.description')->where('user.account_status', 'ACTIVE')
            ->where('user.fraud', 0)->where('user.test_user', 0)->where('user.email_validated', 1)
            ->groupBy('user.id')->inRandomOrder()->orderBy('user.top_rating', 'DESC')->first()
        ) {
            return ['id' => $user->id, 'description' => substr($user->userprofile->description, 0, 100) . '...'];
        } else {
            return false;
        }
    }
}
