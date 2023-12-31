<?php
//01/08/2020 12:24
namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Services\EmailUtils;
use App\Services\WhiteLabel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Models\HoroscopeAdminConfig;
use App\Models\HoroscopeInfo;
use App\Models\HoroscopeZodiacSigns;
use App\Models\Review;

class WeeklyHoroscopeEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:weekly_hroscope_email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

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

    public function dateF($data,$format,$ini = 'Y-m-d'){
        $date = new \DateTime();
        $date = $date::createFromFormat($ini,trim($data));
        return $date->format($format);
        
    }
    public function getPsychics()
    {
        return User::selectRaw('user.*, review.id as review, (SUM(review.rating)/COUNT(review.id)) as ratingAVG')->join('review', 'review.psychic_id', '=', 'user.id')
        ->join('user_profile', 'user_profile.user_id', '=', 'user.id')
        ->whereNotNull('user_profile.cover_path')->whereNotNull('user_profile.haedshot_path')
        ->whereNotNull('user_profile.description')->where('user.account_status', 'ACTIVE')
        ->where('user.fraud', 0)->where('user.test_user', 0)->where('user.email_validated', 1)
        ->groupBy('user.id')->orderBy('ratingAVG', 'DESC')->inRandomOrder()->limit(3)->get();

    }
    public function handle()
    {
        $config = HoroscopeAdminConfig::first();        

        if ($config->date) {
            
            $date = new Carbon('now', $config->timezone);

            $date2 = new Carbon($config->date, $config->timezone);

            if ( $date2->format('YmdHi') == $date->format('YmdHi') ) {

                $users = User::where('email_validated', 1)
                    ->where('test_user', 0)
                    ->where('horoscope_subscribed', 1)
                    ->where('role_id', '=', WhiteLabel::roleId('User'))
                    ->get();

                $month = $date2->format('F');
                $day = $date2->format('d'); 
                //$subject = $config->subject ?? 'Your Weekly Horoscope' . " | Week of $month $day";   
                // $subject = $config->subject;   

                // $signs = HoroscopeZodiacSigns::get();


                $weeks = HoroscopeInfo::
                // ->where('horoscope_info.horoscope_zodiac_signs_id',1)
                 leftJoin('horoscope_zodiac_signs', 'horoscope_info.horoscope_zodiac_signs_id', '=', 'horoscope_zodiac_signs.id')
                ->whereDate('horoscope_info.start_week','<=', date('Y-m-d'))
                ->whereDate('horoscope_info.end_week','>=', date('Y-m-d'))
                ->orderBy('horoscope_info.horoscope_zodiac_signs_id')
                ->get();


                $signs = array();
                foreach($weeks as $week){
                
                    $index = ($week->horoscope_zodiac_signs_id-1);
                    $signs[$index]['id'] = $week->horoscope_zodiac_signs_id;
                    $signs[$index]['name'] = $week->name;
                    $signs[$index]['text'] = strlen($week->content) > 326 ? substr($week->content, 0, 326) . '...' : $week->content;
                    $signs[$index]['date'] = "(".$this->dateF($week->start_period,'M d','m/d')." - ".$this->dateF($week->end_period,'M d','m/d').")";
                }

                
                
                
                $subject = $signs ? 'Your Weekly Horoscope | '.$this->dateF($weeks[0]->start_week,'F d, Y') : 'Your Weekly Horoscope';
                $psychics = $this->getPsychics();
                $reviews = Review::findMany($psychics->map(function ($item) {return $item->review;})->toArray());



                foreach ($users as $user) {
                    $this->line($user->email);
                    EmailUtils::weekly_hroscope_email($user, $subject, $signs, $psychics, $reviews );
                }

            }
        } 
        // else {
        //     $users = User::where('email_validated', 1)
        //         ->where('test_user', 0)
        //         ->where('role_id', '=', WhiteLabel::roleId('User'))
        //         ->get();

        //     foreach ($users as $user) {
        //         EmailUtils::weekly_hroscope_email($user, $subject);
        //     }
        // }

    }
}
