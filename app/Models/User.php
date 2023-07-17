<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 09 Aug 2019 17:18:03 +0000.
 */

namespace App\Models;

use Log as log;
use Carbon\Carbon;
use App\Services\EmailUtils;
use App\Services\WhiteLabel;
use App\Models\UserCreditLog;
use Symfony\Component\Mime\Email;

use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;
use App\Notifications\ResetPassword;
use Illuminate\Support\Facades\Auth;
use App\Models\user_1_1_chat_request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Services\NotificationsInAppUtils;
use Illuminate\Support\Facades\Log as FacadesLog;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Resources\v1\UserChatRequestResourceCollection;
use App\Http\Resources\v1\UserReferralBasicResourceCollection;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class User
 * 
 * @property int $id
 * @property int $site_id
 * @property int $role_id
 * @property string $email
 * @property string $name
 * @property string $last_name
 * @property string $display_name
 * @property string $country_code
 * @property int $email_validated
 * @property int $email_risky
 * @property string $password
 * @property string $account_status
 * @property int $credits
 * @property string $remember_token
 * @property int $test_user
 * @property \Carbon\Carbon $status_calls
 * @property \Carbon\Carbon $accepted_terms
 * @property string $content_level
 * @property \Carbon\Carbon $birth_date
 * @property \Carbon\Carbon $app_used_at
 * @property \Carbon\Carbon $last_log_in
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $created_at
 * 
 * @property \App\Models\Role $role
 * @property \Illuminate\Database\Eloquent\Collection $media
 * @property \Illuminate\Database\Eloquent\Collection $notify_in_apps
 * @property \Illuminate\Database\Eloquent\Collection $posts
 * @property \Illuminate\Database\Eloquent\Collection $rates
 * @property \Illuminate\Database\Eloquent\Collection $subscriptions
 * @property \Illuminate\Database\Eloquent\Collection $categories
 * @property \Illuminate\Database\Eloquent\Collection $specialties
 * @property \Illuminate\Database\Eloquent\Collection $user_credit_logs
 * @property \Illuminate\Database\Eloquent\Collection $user_message_logs
 * @property \Illuminate\Database\Eloquent\Collection $user_mobile_nums
 * @property \Illuminate\Database\Eloquent\Collection $user_subscriptions
 *
 * @package App\Models
 */
class User extends  Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $table = 'user';
    

	protected $casts = [
		'site_id' => 'int',
		'role_id' => 'int',
		'email_validated' => 'int',
		'email_risky' => 'int',
        'credits' => 'decimal:2',
		'test_user' => 'int',
        'chat_free' => 'boolean',
        'online' => 'boolean',
        'offline' => 'boolean',
	];

	protected $dates = [
		'status_calls',
		'accepted_terms',
		'birth_date',
		'app_used_at',
		'last_log_in'
	];

	protected $hidden = [
        'password',
        'pivot',
		'remember_token'
	];

	protected $fillable = [
		'site_id',
		'role_id',
		'email',
		'email_validated',
		'email_risky',
		'password',
		'account_status',
		'credits',
		'remember_token',
		'test_user',
		'status_calls',
		'accepted_terms',
		'content_level',
		'birth_date',
		'app_used_at',
		'last_log_in',
        'chat_free',
        'profile_percent',
        'featured',
        'priority',
        'top_rating',
        'fraud',
        'note',
        'referred_by',
        'lost_requests',
        'source_paula'
	];

    protected $appends = ['userProfile', 'userReferral', 'successUserReferral', 'userMobile', 'userChatRequests', 'modelChatRequests', 'userService', 'categories','userNotifications','buyCredits', 'browserSupported'];
    
    public function getUserProfileAttribute()
    {
        return $this->userProfile()->first();
    }


    public function getUserReferralAttribute()
    {
        return new UserReferralBasicResourceCollection($this->userReferral()->orderBy('id', 'DESC')->get());
    }

    public function getSuccessUserReferralAttribute()
    {
        return new UserReferralBasicResourceCollection($this->userReferral()
        ->select('user_referral.*')
        ->join('user_credit_log', 'user_credit_log.user_id', 'user_referral.referral_id')
        ->where([['user_credit_log.action', '=', 'BUY_CREDIT'], ['user_referral.action', '=', 'Invite Accepted']])
        ->orderBy('user_referral.id', 'DESC')->get());
    }

    public function getuserMobileAttribute()
    {
        return $this->user_mobile_nums()->first();
    }


    public function getBuyCreditsAttribute(){
        //$buyPromo =  $this->user_credit_logs()->get();
        $buyPromo =  $this->user_credit_logs()->where(function (Builder $query) {
            return $query->where([['action', '=', 'BUY_CREDIT'],['promo','<>',0]])
            ->orWhere([['action', '=', 'BUY_CREDIT'],['promo_code','PAULA']]);
        })->count() ? true : false;
       
        //$buyPromo = $this->user_credit_logs()->where([['action', '=', 'BUY_CREDIT'],['promo','<>',0]])->orWhere('promo_code','=','PAULA')->count() ? true : false;
        $opcion = -1;
        if(!$buyPromo){
          $opcion =  $applyPromo =  $this->user_credit_logs()->where([['action', '=', 'BUY_CREDIT'],['promo','=',0]])->count() ? 2 : 1;
        }      
        return [
            'times'=>$buyPromo,
            'promo'=>$this->referred_by_user ? 10 : 5,
            'buyCreditOpcion' => $opcion ]; 
    }
    public function promo(){
        $paulaPromo = $this->user_credit_logs()->where([['action', '=', 'BUY_CREDIT'],['promo_code','=','PAULA']])->count();
        return $this->buyCredits['times'] < 2 && $paulaPromo == 0 ? $this->buyCredits['promo'] : 0;
    }  

    public function getBrowserSupportedAttribute()
    {
        if($this->role_id == 1 || $this->role_id == 2)
        return ($this->device()->first()) ? $this->device()->first()->isBrowserSupported():false;
        return false;
    }


    public function getUserServiceAttribute()
    {
        return $this->userService()->get();
    }


    public function getUserChatRequestsAttribute()
    {
        $states = ['WAITING', 'ENQUEUED'];
        return new UserChatRequestResourceCollection($this->userChatRequests()->whereIn('state', $states)->get());
    }

    public function getModelChatRequestsAttribute()
    {

        return new UserChatRequestResourceCollection(user_1_1_chat_request::user_model_requests($this));
    }
    public function getUserNotificationsAttribute()
    {
        $result = [];
        if($this->role_id == 1){
            $appointments = Appointment::where([['status','=','Pending'],['psychic_notifiacion_view','=',0],['psychic_id','=',$this->id]])->get();

            foreach($appointments as $appointment){

                if(!$appointment->user_1_1_chat_request){
                      $data =  NotificationsInAppUtils::f_array_to_psychics_when_new_scheduled_appointment($appointment,'psychic');            
                      array_push($result,$data); 
                }
              
               }


               $user_1_1_chat_requests = $this->modelChatRequests()
               ->whereNotNull('canceled_by')
               ->where([['canceled_by','<>',$this->id],
                        ['canceled_notify_view','=',0],                                                 
                        ['state','=','INCOMPLETE']])->get();

                 foreach($user_1_1_chat_requests as $user_1_1_chat_request){

                $data =  NotificationsInAppUtils::f_array_to_psychic_when_user_canceled_request($user_1_1_chat_request,'psychic');            
                    array_push($result,$data); 
                    }

                    $appointments_canceled = $this->appointments()
                    ->whereNotNull('canceled_by')
                    ->where([['canceled_by','<>',$this->id],
                             ['canceled_notify_view','=',0],                                                 
                             ['status','=','Cancelled']])->get();
     
                     foreach($appointments_canceled as $appointment_canceled){
     
                       $data =   NotificationsInAppUtils::f_array_to_psychic_when_user_canceled_sheduled_appointment($appointment_canceled,'user');
                       array_push($result,$data); 
                     }
                     
                     $user_1_1_chat_requests = $this->modelChatRequests()
                     ->where([['expired','=',1],
                        ['psychic_view_expired','=',0]])->get();
      
                       foreach($user_1_1_chat_requests as $user_1_1_chat_request){
      
                      $data =  NotificationsInAppUtils::f_array_to_psychic_when_request_expired($user_1_1_chat_request,'psychic');            
                          array_push($result,$data); 
                          }

                     if(!$this->online_rules_view){
                        $data =  NotificationsInAppUtils::f_array_to_psychic_when_change_online_offline($this,'psychic'); 
                        array_push($result,$data);  
                     }    
                     
                     
                     if(!$this->online_announcement_view){
                        $data =  NotificationsInAppUtils::f_array_to_announcement_horoscope($this,'psychic'); 
                        array_push($result,$data);  
                     }    


                     if(!$this->online_announcement_cosmic){
                        $data =  NotificationsInAppUtils::f_array_to_announcement_cosmic($this,'psychic'); 
                        array_push($result,$data);  
                     }    

                     if(!$this->online_announcement_cosmic_refer){
                        $data =  NotificationsInAppUtils::f_array_to_announcement_cosmic_refer($this,'psychic'); 
                        array_push($result,$data);  
                     }    

                     
                     
                    $account = User::select('user.id')
                        ->join('user_biller_edata', 'user_biller_edata.user_id', '=', 'user.id')
                        ->where('user_biller_edata.type', 'DEPOSIT')->groupBy('user.id')
                        ->where('user.id',$this->id)
                        ->get()->count();
        
                     

                    if((!$this->online_payout_method)&&($account<1)){
                        $data =  NotificationsInAppUtils::f_array_to_update_payout_method($this,'psychic'); 
                        array_push($result,$data);  
                    }   

             
      
                    
        }
        if($this->role_id == 2){


               $user_1_1_chat_requests = $this->userChatRequests()
                                        ->whereNotNull('canceled_by')
                                        ->where([['canceled_by','<>',$this->id],
                                                 ['canceled_notify_view','=',0],                                                 
                                                 ['state','=','INCOMPLETE']])->get();

               foreach($user_1_1_chat_requests as $user_1_1_chat_request){

                  $data =  NotificationsInAppUtils::f_array_to_user_when_psychic_canceled_request_or_expired($user_1_1_chat_request,'user','canceled');            
                  array_push($result,$data); 
               }


               if(!$this->online_announcement_view){
                $data =  NotificationsInAppUtils::f_array_to_announcement_horoscope($this,'user'); 
                array_push($result,$data);  
             }    


             if(!$this->online_announcement_cosmic_client){
                $data =  NotificationsInAppUtils::f_array_to_announcement_cosmic_client($this,'psychic'); 
                array_push($result,$data);  
             }    


             


               $user_1_1_chat_request_expired = $this->userChatRequests()              
               ->where([['expired','=',1],
                        ['user_view_expired','=',0]])->get();

                    foreach($user_1_1_chat_request_expired as $user_1_1_chat_request_expired){

                    $data =  NotificationsInAppUtils::f_array_to_user_when_psychic_canceled_request_or_expired($user_1_1_chat_request_expired,'user','expired');            
                    array_push($result,$data); 
                    }

               $appointments_canceled = $this->user_appointments()
               ->whereNotNull('canceled_by')
               ->where([['canceled_by','<>',$this->id],
                        ['canceled_notify_view','=',0],                                                 
                        ['status','=','Cancelled']])->get();

                foreach($appointments_canceled as $appointment_canceled){

                  $data =   NotificationsInAppUtils::f_array_to_user_when_psychic_canceled_sheduled_appointment($appointment_canceled,'user');
                  array_push($result,$data); 
                }


                $appointments = Appointment::where([['status','=','Pending'],['user_id','=',$this->id]])->get();

                foreach($appointments as $appointment){
    
                    if(!$appointment->user_1_1_chat_request){
                          $data =  NotificationsInAppUtils::f_array_to_user_when_new_scheduled_appointment_pending($appointment,'user');            
                          array_push($result,$data); 
                    }
                  
                   }

                   $appointments = $this->user_appointments()
                   ->where([['status','=','Confirmed'],
                   ['confirmation_view','=',0]])->get();

                   foreach($appointments as $appointment){
       
                       if(!$appointment->user_1_1_chat_request){
                             $data =  NotificationsInAppUtils::f_array_to_user_when_psychic_confirm_appointment($appointment,'user');            
                             array_push($result,$data); 
                       }
                     
                      }   
                
                      



               
        }
        return $result; 
    }


    public function getCategoriesAttribute() {

        return $this->categories()->get();        

    }


	public function role()
	{
		return $this->belongsTo(\App\Models\Role::class);
    }
    public function biller_edata()
    {
        return $this->hasMany(\App\Models\UserBillerEdata::class);
    }
    public function transactions()
    {
        return $this->hasMany(\App\Models\Transaction::class);
    }
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class);
    }

    public function userProfile()
    {
        return $this->hasOne(\App\Models\UserProfile::class,'user_id');
    }

    public function userReferral()
    {
        return $this->hasMany(\App\Models\UserReferral::class,'user_id');
    }

    
	public function reviews()
	{
		return $this->hasMany(\App\Models\Review::class, 'psychic_id');
    }
    public function user_chat_room()
	{
		return $this->hasMany(\App\Models\fan_chat_room::class, 'user_id');
	}

    public function user_reviews()
    {
        return $this->hasMany(\App\Models\Review::class, 'user_id');
    }
    public function psychic_profile_views()
    {
        return $this->hasMany(\App\Models\ProfileViews::class, 'psychic_id');
    }

    public function appointments()
    {
        return $this->hasMany(\App\Models\Appointment::class, 'psychic_id');
    }
    public function chats_received()
    {
        return $this->hasMany(\App\Models\chat::class, 'receiver_id');
    }

    public function user_appointments()
    {
        return $this->hasMany(\App\Models\Appointment::class, 'user_id');
    }

    public function reviewReplies()
    {
        return $this->hasMany(\App\Models\ReviewReply::class, 'psychic_id');
    }

    public function favorites()
    {
        return $this->belongsToMany(\App\Models\User::class, 'user_favorite_psychics', 'user_id', 'psychic_id')->where('role_id','=',1);
    }

    public function helpfuls()
    {
        return $this->belongsToMany(\App\Models\User::class, 'user_helpfuls', 'user_id', 'review_id');
    }

    public function userService()
    {
        return $this->hasMany(\App\Models\UserService::class);
    }

    public function userChatRequests()
    {
        return $this->hasMany(\App\Models\user_1_1_chat_request::class);
    }


    public function modelChatRequests()
    {
        return $this->hasMany(\App\Models\user_1_1_chat_request::class,'model_id');
    }
    public function is_reading_in_progress(){
             
       
    //  if(Auth::guard('api')->user()){
        return $this->modelChatRequests()->whereIn('state', ['LIVE','WAITING'])->first() ? true :false;   
    //  } 
     return false;  
   
    }

    public function userSchedule()
    {
        return $this->hasMany(\App\Models\UserSchedule::class);
    }

    public function scheduleActiveNow()
    {
        $now = new Carbon('now', $this->timezone);
        $day = \strtolower($now->format('D'));
        $time = $now->format('H:i:s');
        return $this->userSchedule()->where('active', 1)->where('day', $day)->whereRaw("TIME(user_schedule.from) < TIME('$time') AND TIME(user_schedule.till) > TIME('$time')")->count();
    }


    public function favorited()
    {
        return $this->belongsToMany(\App\Models\User::class, 'user_favorite_psychics', 'psychic_id', 'user_id');
    }


    public function categories()
	{
        return $this->belongsToMany(\App\Models\Category::class, 'user_category');
					
    }
  
     public function specialties()
	{
		return $this->belongsToMany(\App\Models\Specialties::class, 'user_specialties');
					
    }

    public function tools()
	{
		return $this->belongsToMany(\App\Models\Tools::class, 'user_tools');
					
    }

    public function styles()
	{
		return $this->belongsToMany(\App\Models\Styles::class, 'user_styles');
					
    }
    
    public function languages()
	{
        
        return $this->hasMany(\App\Models\UserLanguages::class);
		
    }

        
    public function works()
	{
    
        return $this->hasMany(\App\Models\UserWorks::class);
					
    }

    public function credentials()
    {
        return $this->hasMany(\App\Models\UserCredentials::class);
    }


    public function user_credit_logs()
	{
		return $this->hasMany(\App\Models\UserCreditLog::class);
    }
    public function psychic_credit_logs()
	{
		return $this->hasMany(\App\Models\UserCreditLog::class,'psychic_id');
    }
    public function psychic_payout_logs()
	{
		return $this->hasMany(\App\Models\PayoutLog::class,'psychic_id');
	}

	public function user_message_logs()
	{
		return $this->hasMany(\App\Models\UserMessageLog::class);
	}

	public function user_mobile_nums()
	{
		return $this->hasMany(\App\Models\UserMobileNum::class);
	}

	public function user_subscriptions()
	{
		return $this->hasMany(\App\Models\UserSubscription::class);
	}

    public function verifyUser()
    {
        return $this->hasOne(\App\Models\VerifyUser::class);
    }

    public function isPsychic(){

        return ($this->role_id == 1)? true : false;

    }
    public function hasRole($id){
        return ($this->role_id == $id)? true : false;
    }
    public function chats()
    {
        return $this->hasMany(chat::class,'user_id');
    }
   

    public function isUser(){
        return ($this->role_id == 2)? true : false;
    }

    public function isSaved()
    {

        if(Auth::guard('api')->user() != null){
            if(Auth::guard('api')->user()->favorites()->get()->contains($this)){
                return true;
            }
        }

        return false;
    }

    public function hasVerifiedPhone()
    {
        $verified = $this->user_mobile_nums()->where('validated', 1)->count();
        return $verified > 0;
    }


    public function users_to_chat()
    {
      
        if($this->isPsychic()){
            return User::select('user.*')
                ->join('chat_in','chat_in.user_id','user.id')               
                ->with(['userProfile','chats'])
                ->where(['user.role_id'=>2, 'chat_in.receiver_id'=>$this->id,'chat_in.blocked'=>0])
                ->groupBy('chat_in.user_id');

        }else{
          
            return User::select('user.*')
                ->join('chat_in','chat_in.receiver_id','user.id')               
                ->with(['userProfile','chats'])
                ->where(['user.role_id'=>1, 'chat_in.user_id'=>$this->id,'chat_in.blocked'=>0])
                ->groupBy('chat_in.receiver_id');
              
        }
    }

    public function get_notifications($id){
        return chat::where([['view','=',0],['receiver_id','=',$id]])->count();
    }
    

    public static function getModelByIdOrDisplayName($id = null, $displayname = null)
    {

        return User::select('user.*')
            ->with(['userProfile'])
            ->join('user_profile', 'user_profile.user_id', '=', 'user.id')
            ->where(function($query) use ($id, $displayname){
                $query->where('role_id', '=', WhiteLabel::roleId('Psychic'));

                if(!is_null($id)){
                    $query->where('user.id', '=', $id);
                }elseif (!is_null($displayname)){
                    $query->where('user_profile.profile_link', '=', $displayname);
                }

            })->first();
    }

    public function check_credits($credits,$no_auto=false){

        if ($no_auto) {
            return ($this->credits-$credits) >= 0 ;
        }

        $ar = false; // $this->_get_auto_renew();

        if ($ar){
            $replenish = $ar->credits_to_add;
        } else {
            $replenish = 0;
        }

        return ($this->credits+$replenish-$credits) >= 0;
    }

    public function sendPasswordResetNotification($token)
    {
        EmailUtils::send_reset_password_email($token);
        // $this->notify(new ResetPassword($token));
    }


    /**
     * @param $credits
     * @param $action
     * @param null $star_id
     * @param null $twilio_log_id
     * @param bool $skip_check
     * @return bool
     */
    public function deduct_credits($credits, $action, $star_id = null, $twilio_log_id = null, $skip_check = false, $service_id = null, $user_1_1_chat_request_id = null) {

        /* See if user has an auto-renew account */
        $contract = false;
        log::info("User::deduct_credits() User ID:".$this->id);
        log::debug("in User::deduct_credits with \$action = ".print_r($action,true));
        //log::debug("in User::deduct_credits with \$contract = ".print_r($contract,true));
        log::debug("in User::deduct_credits with \$credits = ".print_r($credits,true));
        log::debug("in User::deduct_credits with \$twilio_log_id = ".print_r($twilio_log_id,true));
    
        if($contract && !in_array($action,['SUBSCRIPTION_RECUR'
                                           ,'MEDIA_PURCHASE_DONATE'
                                           ,'MEDIA_PURCHASE_BUY']))
        {

            log::debug("\$this->credits = " . $this->credits . ", \n\$credits = $credits , \n\$contract->credits_trigger = "
                       . $contract->credits_trigger);

            
            while (($this->credits - $credits) < ($contract->credits_trigger) )
            {
                /* Buy Credits */
                $res = $contract->recur();
                log::debug("in User::deduct_credits with \$res = " . print_r($res ,true));
            
                if (empty($res[0])) {
                    log::debug("in User::deduct_credits returning false");
                    return false;
                
                    // return [false, 'Could not purchase credits', !empty($res[1]) ? $res[1] : null];
                }
                break;
                
            }
        
            
        }
    
        if (!empty($credits)) {
            $sql = 'UPDATE user SET credits = credits - :credits WHERE id=:id';
            // First entry
            FacadesLog::info('From User deduct_credits() first entry  -- User credit old: $'.$this->credits. ' Amount: $'.$credits. ' User ID:'.$this->id);
          
            DB::update($sql, [
                'credits' => $credits,
                'id' => (integer)$this->id,
            ]);
            FacadesLog::info('From User deduct_credits() first entry -- User credit updated: $'.$this->credits. ' User ID:'.$this->id);

            //self::_reset_user_cache($this->id, $this);

            //check against race condition - 2 concurrent deduct requests
            //went under 0, reverse?
            if ($this->credits < 0) {
                if (!$skip_check) {
                    $sql = 'UPDATE user SET credits = credits + :credits WHERE id=:id';

                    // Second entry
                   FacadesLog::info('From User deduct_credits() second entry  -- User credit old: $'.$this->credits. ' Amount: $'.$credits. ' User ID:'.$this->id);
          
                    DB::update($sql, [
                        'credits' => $credits,
                        'id' => (integer)$this->id,
                    ]);
                    FacadesLog::info('From User deduct_credits() second entry -- User credit updated: $'.$this->credits. ' User ID:'.$this->id);

                    //self::_reset_user_cache($this->id, $this);

                    return false;
                }

                $sql = 'UPDATE user SET credits = 0 WHERE id=:id';

                //Third entry
                FacadesLog::info('From User deduct_credits() third entry  -- User credit old: $'.$this->credits. ' Amount: $'.$credits. ' User ID:'.$this->id);
          
                DB::update($sql, [
                    'id' => (integer)$this->id,
                ]);
                FacadesLog::info('From User deduct_credits() third entry -- User credit updated: $'.$this->credits. ' User ID:'.$this->id);

                //self::_reset_user_cache($this->id, $this);
            }
        }

       // $site_id = WhiteLabel::site_id_from_uri();

       /* if ($action == 'VCHAT_1_1_MINUTES') {
            // Make an attempt for vchat records ( should always succeed ) to find the chat room
            // request to get the origin, as calling site_id_from_uri by the time
            // deduct credits is called will always result in site id 3.
            $live_room = user_1_1_chat_request::where('model_id', $star_id)
                ->where('user_id', $this->id)
                ->orderBy('created_at', 'DESC')
                ->first();
            if ($live_room) {
                $site_id = $live_room->site_id;
            }
        }*/

        $mightFind=UserCreditLog::where('user_1_1_chat_request_id', '=', $user_1_1_chat_request_id)->first();

        if ($mightFind) {

            // update
            $mightFind->credits += $credits;

            $mightFind->save();

        }
        else {
        
            $in = [
                'user_id' => $this->id,
                'credits' => $credits,
                'action' => $action,
                'service_id' => $service_id,
                //'site_id' => $site_id 
            ];
            
            if (! empty($star_id)) {
                $in['psychic_id'] = $star_id;
            }

            if (! is_null($user_1_1_chat_request_id)) {

                $in['user_1_1_chat_request_id'] = $user_1_1_chat_request_id;

            }

            UserCreditLog::create($in);

        }

        return true;
    }

    public function serviceActiveCount()
    {
        return $this->hasMany(\App\Models\UserService::class)->where('active', 1)->count();
    }

    public function device()
    {
        return $this->hasOne(\App\Models\UserDevice::class);
    }

    /**
     * Required for the WebDevEtc\BlogEtc package.
     * Enter your own logic (e.g. if ($this->id === 1) to
     *   enable this user to be able to add/edit blog posts
     *
     * @return bool - true = they can edit / manage blog posts,
     *        false = they have no access to the blog admin panel
     */
    public function canManageBlogEtcPosts()
    {
        // Enter the logic needed for your app.
        // Maybe you can just hardcode in a user id that you
        //   know is always an admin ID?

        if ($this->role_id === 3 || $this->role_id === 4 || $this->role_id === 6
        ){

            // return true so this user CAN edit/post/delete
            // blog posts (and post any HTML/JS)

            return true;
        }

        // otherwise return false, so they have no access
        // to the admin panel (but can still view posts)

        return false;
    }
    public function chats_expired_online(){

        return  $this->chats_received()->whereNotNull('refund_id')->where('expired_online',1)->groupBy('refund_id');
       
    }
    public function request_expired_online(){

        return  $this->modelChatRequests()->where([['expired_online','=',1],['expired','=',1]]);
       
    }

    public function isFirstPurchase(){

        $logs = $this->user_credit_logs()->where('action', '=', 'BUY_CREDIT')->count();
       
        if($logs > 0){
            return false;
        }      
        return true;
    }
}
