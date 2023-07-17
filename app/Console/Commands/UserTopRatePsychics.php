<?php
//01/08/2020 12:24
namespace App\Console\Commands;

use App\Models\EmailAdminConfig;
use App\Models\Review;
use App\Models\User;
use App\Services\EmailUtils;
use App\Services\WhiteLabel;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UserTopRatePsychics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send_psychics_top_rate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send top four psychics to user';

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
        // if(!($config = EmailAdminConfig::where('type', 'top-rated')->where('updated_at', ">", $date)->first()))
        //  if(!($users = $this->getUsers())) return false;

        //if ($config->date) {

        //$date = new Carbon('now', $config->timezone);

        //$date2 = new Carbon($config->date, $config->timezone);

        //if ( $date2->format('YmdHi') == $date->format('YmdHi') ) {

        // $users = User::selectRaw('user.*, review.id as review')->join('review', 'review.psychic_id', '=', 'user.id')
        //  ->whereIn('review.id', \collect($config->users)->map(function($item){return $item['review'];}))->get()->all();

        // if(empty($users))
        if (!($users = $this->getUsers())) {
            return false;
        }
        
        if (!($config = EmailAdminConfig::where('type', 'top-rated')->where('updated_at', ">", $date)->first())) {
            $subject = 'Top Rated & Reviewed Roundup';
        } else {
            $subject = $config->subject;
        }

        $reviews = Review::findMany($users->map(function ($item) {return $item->review;})->toArray());
        foreach (User::where('email_validated', 1)
            ->where('test_user', 0)
            //->where('email', 'km@collide.com')
            ->where('role_id', '=', WhiteLabel::roleId('User'))
            ->get() as $user) {
            $this->line($user->email);
            EmailUtils::send_email_to_user_top_rate_psychics($user, $subject, $users, $reviews);
        }

        //}
        //}

    }

    public function getUsers()
    {
        return User::selectRaw('user.*, review.id as review, (SUM(review.rating)/COUNT(review.id)) as ratingAVG')->join('review', 'review.psychic_id', '=', 'user.id')
            ->join('user_profile', 'user_profile.user_id', '=', 'user.id')
            ->whereNotNull('user_profile.cover_path')->whereNotNull('user_profile.haedshot_path')
            ->whereNotNull('user_profile.description')->where('user.account_status', 'ACTIVE')
            ->where('user.fraud', 0)->where('user.test_user', 0)->where('user.email_validated', 1)
            ->groupBy('user.id')->orderBy('ratingAVG', 'DESC')->inRandomOrder()->limit(3)->get();

            // return User::selectRaw('user.*, review.id as review')->join('review', 'review.psychic_id', '=', 'user.id')
            // ->join('user_profile', 'user_profile.user_id', '=', 'user.id')
            // ->whereNotNull('user_profile.cover_path')->whereNotNull('user_profile.haedshot_path')
            // ->whereNotNull('user_profile.description')->where('user.account_status', 'ACTIVE')
            // ->where('user.fraud', 0)->where('user.test_user', 0)->where('user.email_validated', 1)
            // ->groupBy('user.id')->inRandomOrder()->orderBy('user.top_rating', 'DESC')->limit(3)->get();
    }
}
