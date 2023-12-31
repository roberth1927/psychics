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
use App\Models\HoroscopeZodiacSigns;
use App\Models\HoroscopeInfo;
use App\Models\Review;
use App\Http\Resources\v1\HoroscopeInfoResource;
use App\Models\UserHoroscope;
use Illuminate\Support\Facades\DB;


class WeeklyHoroscopeSignEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:weekly_horoscope_sign_email';

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

    
    public function handle()
    {
        //$config = HoroscopeAdminConfig::first();        

        //if ($config->date) {
            
            //$date = new Carbon('now', $config->timezone);

            //$date2 = new Carbon($config->date, $config->timezone);

            //if ( $date2->format('YmdHi') == $date->format('YmdHi') ) {

                $users = DB::select('SELECT us.email,us.name, us.birth_date, hz.id as sign, hz.name as zodiac
                FROM user_horoscope us,horoscope_zodiac_signs hz
                where DATE_FORMAT(us.birth_date,"%m/%d") BETWEEN hz.start_period and hz.end_period
                and us.email is not null
                ');

                
                $weeks = HoroscopeInfo::
                leftJoin('horoscope_zodiac_signs', 'horoscope_info.horoscope_zodiac_signs_id', '=', 'horoscope_zodiac_signs.id')
                ->get();


               $signs = array();
               foreach($weeks as $week){
                   
                $signs[$week->horoscope_zodiac_signs_id]['id'] = $week->horoscope_zodiac_signs_id;
                $signs[$week->horoscope_zodiac_signs_id]['name'] = $week->name;
                $signs[$week->horoscope_zodiac_signs_id]['url'] = strtolower($week->name);
                $signs[$week->horoscope_zodiac_signs_id]['text'] = $week->content;
                $signs[$week->horoscope_zodiac_signs_id]['date'] = $this->dateF($week->start_period,'M d','m/d')." - ".$this->dateF($week->end_period,'M d','m/d');

                 }


                $subject = " here is what's in the stars for you this week...";
                $psychics = $this->getPsychics();
                $reviews = Review::findMany($psychics->map(function ($item) {return $item->review;})->toArray());

                foreach ($users as $user) {
                    $info =  $this->information($user->sign);        
                    $this->line($user->email);
                    EmailUtils::weekly_horoscope_sign_email($user, $subject, $signs, $info, $psychics, $reviews);
                    
                }

            //}
        //} 
      
    }
     
    public function information($signs_id){

        $info = HoroscopeInfo::select('horoscope_info.*')
                                ->where('horoscope_info.horoscope_zodiac_signs_id',$signs_id)
                                ->whereDate('horoscope_info.start_week','<=', date('Y-m-d'))
                                ->whereDate('horoscope_info.end_week','>=', date('Y-m-d'))
                                ->get()->first();
                                
        if(!$info){
            $info = HoroscopeInfo::select('horoscope_info.*')
                                ->where('horoscope_info.horoscope_zodiac_signs_id',$signs_id)
                                ->get()->first();
            
        }

        $info = new HoroscopeInfoResource($info);

        return $info;     
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
}
